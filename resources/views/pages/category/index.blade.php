@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Category'])
    
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Contacts</h6>  
                    <div class="float-right mb-2">
                        <a class="btn btn-success" href="{{ route('category.create') }}"> Create Category</a>
                    </div>
                </div>
               
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive px-3">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Status</th>
                                    @if(Auth::user()->role_as == "1")
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    @endif
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $category->c_name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($category->c_status=="1")
                                    <p class="text-sm font-weight-bold mb-0">Active</p>
                                        @else
                                        <p class="text-sm font-weight-bold mb-0">Inactive</p>
                                        @endif
                       
                                    </td>
                                        @if(Auth::user()->role_as == "1")
                                      <td class="align-middle text-end">
                                        <form action="{{ route('category.destroy',$category->id) }}" method="Post"  class="btn-group d-flex  justify-content-center ">
                                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}"><i class="tim-icons icon-pencil"></i> Edit</a>
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="tim-icons icon-trash-simple"></i> Delete</button>
                                            </form>                          
                                        </td>
                                        @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection