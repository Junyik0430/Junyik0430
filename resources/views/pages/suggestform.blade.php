@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Suggest Form'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <div class="card mb-4">
                    <form role="form" method="POST" action="{{ route('sendmail') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <p class="mb-0">Send Email</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact Owner</label>
                                        <!-- Owner Dropdown -->
                                        <select class="form-control select2"  id='email' name='email'>
                                        <option value='0'>-- Select Owner --</option>

                                        <!-- Read Owners -->
                                        @foreach($contactData['data'] as $contact)
                                            <option value='{{ $contact->c_email }}'>{{ $contact->c_email }}</option>
                                        @endforeach
                                    
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Header</label>
                                    <input type="text" class="form-control" id="title" name="title"  placeholder="Enter title">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Send</button>
                                    <a class="btn btn-primary btn-sm ms-2"  href="{{ route('category.index') }}">Back</a>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
            
        @include('layouts.footers.auth.footer')
    </div>
        @endsection