<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Import namespace Http

class InfoController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Hello world', 'success' => true], 200);
    }

    public function home() 
    {
        $response = Http::get('https://reqres.in/api/users?page=2'); // Perbaiki URL yang tidak benar
        $data = $response->json('data'); // Mengambil data dari respons JSON
        return view('front.home.pages.home', compact('data'));
    }
}
