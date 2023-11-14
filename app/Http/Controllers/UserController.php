<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $data_user =  User::get();

        return view('users.users', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'photo' => 'image|nullable|max:1000000',
        ]);

        $user->name = $request->input('name');
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs($filenameSimpan);

        if ($user->photo) {
            $photoPath = public_path('photos/original/' . $user->photo);
            if (File::exists($photoPath)) {
                File::delete($photoPath); 

            }
        }

        $user->photo = $path;
        $user->save();
    } else{
    }

    return redirect()->route('users')
            ->with('success', 'User photo is updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) : RedirectResponse
    {
        if($user->photo){
            $Path_Photo = public_path('photos/' . $user->photo);
            if (File::exists($Path_Photo)){
                File::delete($Path_Photo);
            }
            $user->photo = null;
            $user->save();
        }

        return redirect()->route('users')->with('success', 'Yeay. User photo is deleted successfully.');
    }
    public function resizeForm($user)
    {
        // Logic for displaying the resize form
        return view('users.resize', compact('user'));
    }

    
    public function resizeImage(Request $request, $user){
    // Validate the form data
    $request->validate([
        'size' => 'required|in:square,thumbnail',
    ]);

    // Get the selected size from the form
    $selectedSize = $request->input('size');

    // Get the user's photo filename
    $photo = $user->photo;

    // Original image path
    $originalPath = storage_path("app/public/photos/original/{$photo}");

    // Resize and save the image based on the selected size
    switch ($selectedSize) {
        case 'square':
            $image = Image::make($originalPath)->fit(300, 300);
            $image->save(storage_path("app/public/photos/square/{$photo}"));
            break;

        case 'thumbnail':
            $image = Image::make($originalPath)->fit(480, 270);
            $image->save(storage_path("app/public/photos/thumbnail/{$photo}"));
            break;

        default:
            // If 'original' or an invalid size is selected, no need to resize
            break;
    }

    return redirect()->back()->with('success', 'Image resized successfully');
}
}