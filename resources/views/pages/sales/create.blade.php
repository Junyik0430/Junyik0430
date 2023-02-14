@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Contact'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
            <form action="{{ route('sales.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                        <p class="text-uppercase text-sm">Sales</p>
                        </hr>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <label for="Date">Date</label>
                                <input id="Date" name="date"class="form-control" type="date" />
                            </div>
                        </div>
                    </div>         
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-white" id="tableEstimate">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-2">Item</th>
                                                <th class="col-md-6">Unit Price</th>
                                                <th style="width:100px;">Quantity</th>
                                                <th>Amount</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control selectProduct" style="min-width:150px" id='item' name='item[]'>
                                                    <option value='0'>-- Select Product --</option>
                                                        <!-- Read Owners -->
                                                        @foreach($products['data'] as $product)
                                                            <option value='{{ $product->p_name }}'>{{ $product->p_name }}</option>
                                                        @endforeach
                                        
                                                </select>
                                            </td>
                                            <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]" readonly></td>
                                            <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                                            <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0"></td>
                                            <td><input type='button' class='AddNew btn btn-success ' value='Add new' style="width:100%;"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>

                </div>
            </div>
            
        @include('layouts.footers.auth.footer')
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $('.AddNew').click(function(){
   var row = $(this).closest('tr').clone();
   row.find('input').val('');
   row.find('#amount').val('0');
   $(this).closest('tr').after(row);
   $('input[type="button"]', row).removeClass('AddNew').addClass('RemoveRow').val('Remove item');
});

$('table').on('click', '.RemoveRow', function(){
  $(this).closest('tr').remove();
});

$('table').on('change', '.selectProduct', function(){
    var productname=$(this).find(":selected").val();
    const data =[
                @foreach($products['data'] as $product)
                {
                    name: '{{$product->p_name}}',
                    price: '{{$product->p_price}}'
                },
                @endforeach
                ];
     var price=data.find(name => productname);

    $(this).closest('tr').find('#unit_cost').val(price['price']);
});

$('table').on('change', '.qty', function(){
     var qty=$(this).closest("#qty").val();
     var price=$(this).closest('tr').find("#unit_cost").val();
    var total=price * qty;
    $(this).closest('tr').find("#amount").val(total);
});

        </script>
        @endsection