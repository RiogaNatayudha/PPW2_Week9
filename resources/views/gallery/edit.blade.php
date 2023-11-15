@extends('auth.layouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Gallery</div>

                    <div class="card-body">
                        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 row">
                                <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="description" rows="5" name="description">{{ $gallery->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">File input</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="input-file" name="picture">
                                            <label class="custom-file-label" for="input-file">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($gallery->picture)
                                        <p>Existing Image:</p>
                                        <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" alt="Existing Image" style="max-width: 200px;">
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection