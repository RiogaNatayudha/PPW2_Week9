@extends('auth.layouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-dark">Create New Gallery</div>

                    <div class="card-body">
                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label for="title" class="col-md-4 col-form-label text-md-end text-start text-dark">Title</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="title" name="title">
                                    @error('title')
                                        <div class="alert alert-danger text-dark">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="description" class="col-md-4 col-form-label text-md-end text-start text-dark">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                                    @error('description')
                                        <div class="alert alert-danger text-dark">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="input-file" class="col-md-4 col-form-label text-md-end text-start text-dark">File input</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="input-file" name="picture">
                                            <label class="custom-file-label text-dark" for="input-file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
