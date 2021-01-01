@extends('main')
@section('product_name')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Cart order</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

<div id="content">
    <div class="container">

        <div class="row">

            <!-- *** LEFT COLUMN ***
            _________________________________________________________ -->

            <div class="col-md-12 clearfix" id="customer-order" style="margin-bottom: 30px;">
                <div class="box">
                    <form method="post" action="{{route('checkout')}}">
                        {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Discount</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    $countProduct = 0;
                                    $totalOrder = 0
                                ?>
                                    @foreach ($products as $key => $value)
                                    <?php
                                    $countProduct+=1;
                                    $total += $value->price*$value->quantity;
                                    $totalOrder+=$total;
                                ?>
                                    <tr>
                                        <td>
                                            <a href="">
                                                <img src={{asset('Order/images/detailsquare.jpg')}}
                                                    alt="White Blouse Armani">
                                            </a>
                                        </td>
                                        <td><a href="">{{$value->product_name}}</a>
                                        </td>

                                        <?php $cost = ($value->quantity)*($value->price) ?>
                                        <td>
                                            <input id="quantity" name="quantity" .{{$key+1}} type="number"
                                                value="{{$value->quantity}}" class="{{" form-control
                                                number_select" . $key}}" min="0">
                                        </td>
                                        <td id="{{'product-price'.$key}}">{{$value->price}}</td>
                                        <td>$0.00</td>
                                        <td id="{{'cost-product'.$key}}">{{$cost}}</td>
                                        <td><a href=""><i class="fa fa-trash-o"></i></a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    <input type="hidden" value="{{$totalOrder}}" id="total" name="total">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5"><strong>Total</strong></th>
                                        <th colspan="2" id="totalOrder"><strong>{{$totalOrder}}</strong></th>
                                    </tr>
                                </tfoot>
                            </table>

                            {{-- <input style="margin-left: 83%;" type="submit" value="Pay Now"> --}}
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{URL::to('/productmodule/home')}}" class="btn btn-default"><i
                                        class="fa fa-chevron-left"></i> Continue shopping</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-template-main">Proceed to checkout <i
                                        class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.col-md-9  end-->
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>

<script>
    $(function() {
        $(':input[type="number"]').click(function () {
            
            var totalOrder= 0;
            var product_number = '<?php echo $countProduct; ?>';
            for(var i=0;i<product_number;i++){
                let price = parseInt($('.number_select'+i).val()) * parseInt($('#product-price'+i).html());
                $('#cost-product'+i).html(price);
                totalOrder+=price;
            }
            console.log(product_number);
            
            $('#totalOrder').html(totalOrder);
            
        });
    });
</script>
@endsection