@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Contact'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                    <form role="form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Create Contact</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto" href="{{ route('contact.store') }}">Save</button>
                                <a class="btn btn-primary btn-sm ms-2"  href="{{ route('products.index') }}">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Name</label>
                                        <input class="form-control" type="text" name="p_name">
                                        @error('p_name')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Price</label>
                                        <input class="form-control" type="text" name="p_price">
                                        @error('p_price')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Quantity</label>
                                        <input class="form-control" type="number" name="p_quantity">
                                        @error('c_email')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Owner</label>
                                        <!-- Owner Dropdown -->
                                        <select class="form-control select2"  id='p_owner' name='p_owner'>
                                        <option value='0'>-- Select Owner --</option>
                                        @foreach($users['data'] as $user)
                                            <option value='{{ $user->username }}'>{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Category</label>
                                        <input class="form-control" type="text" name="p_category">
                                        @error('p_category')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Manufacturer</label>
                                        <input class="form-control" type="text" name="manufacturer"}}">
                                        @error('manufacturer')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Vendor Name</label>
                                        <input class="form-control" type="text" name="v_name">
                                        @error('v_name')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <input class="form-control" type="number" name="p_status" value="1" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        @include('layouts.footers.auth.footer')
    </div>
        @endsection