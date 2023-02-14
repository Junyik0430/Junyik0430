@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Category'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                    <form role="form" method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Create Category</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                <a class="btn btn-primary btn-sm ms-2"  href="{{ route('category.index') }}">Back</a>

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Category Information</p>
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Category Name</label>
                                        <input class="form-control" type="text" name="c_name"  value="{{ $category->c_name }}">
                                        @error('c_name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
            
        @include('layouts.footers.auth.footer')
    </div>
        @endsection