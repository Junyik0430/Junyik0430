@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Contacts'])
    
    <div class="row mt-4 mx-4">
        <div class="col-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Sales</h6>  
                    <div class="float-left mb-2">
                        <a class="btn btn-success" href="{{ route('sales.import') }}"> Import Sales</a>
                        <a class="btn btn-success" href="{{ route('sales.create') }}"> Create Sales</a>
                    </div>
                </div>
               
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive px-3">
                        <table class="table align-items-center mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Month(Sold out)</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Year</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $sale->p_name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $sale->month}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $sale->year}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $sale->total}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $sale->quantity}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">@if( $sale->s_status==1)
                            Complete
                            @else
                              Cancel  
                            @endif</p>
                                    </td>
                                    @if(Auth::user()->role_as == "1")
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <form action="{{ route('sales.destroy',$sale->id) }}" method="POST"> 
                                            @if( $sale->s_status==1)
                                            <a class="btn btn-success btn-icon" href="{{ route('sales.cancelOrder', $sale->id) }}">Cancel Sales</a>
                                            @endif
                                                
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon">Delete</button>
                                            </form>
                                        </div>
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
