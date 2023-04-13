@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Contact'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                    <form role="form" method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Create Contact</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto" href="{{ route('contact.store') }}">Save</button>
                                <a class="btn btn-primary btn-sm ms-2"  href="{{ route('contacts.index') }}">Back</a>

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact Owner</label>
                                        <!-- Owner Dropdown -->
                                        <select class="form-control select2"  id='c_owner' name='c_owner'>
                                        <option value='0'>-- Select Owner --</option>

                                        <!-- Read Owners -->
                                        @foreach($userData['data'] as $user)
                                            <option value='{{ $user->username }}'>{{ $user->username }}</option>
                                        @endforeach
                                    
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact Name</label>
                                        <input class="form-control" type="text" name="c_name">
                                        @error('c_name')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone Number</label>
                                        <input class="form-control" type="tel" name="c_phone">
                                        @error('c_phone')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Mobile Number</label>
                                        <input class="form-control" type="tel" name="c_mobile"}}">
                                        @error('c_mobile')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact Company</label>
                                        <input class="form-control" type="text" name="c_company">
                                        @error('c_company')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact Email</label>
                                        <input class="form-control" type="text" name="c_email">
                                        @error('c_email')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Secondary Email</label>
                                        <input class="form-control" type="text" name="c_secondaryemail">
                                        @error('c_secondaryemail')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Other Account</label>
                                        <input class="form-control" type="text" name="c_other_acc">
                                        @error('c_other_acc')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Status</label>
                                        <input class="form-control" type="tel" name="c_status" value="1">
                                        @error('c_status')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        @include('layouts.footers.auth.footer')
    </div>
        @endsection