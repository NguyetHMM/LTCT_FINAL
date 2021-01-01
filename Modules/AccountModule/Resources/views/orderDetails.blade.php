@extends('main')
@section('product_name')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Order details</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

<div id="content">
    <div class="container">

        <div class="row">
            <div class="col-md-12 clearfix" id="customer-order" style="margin-bottom: 30px;">
                <div class="box">
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
                                        $countProduct = 0;
                                        $totalOrder = 0
                                    ?>
                                    @foreach ($products as $key => $value)
                                    <?php
                                        $countProduct+=1;
                                        $total = $value->product_price*$value->quantity;
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

                                        <?php $cost = ($value->quantity)*($value->product_price) ?>
                                        <td>
                                            <p>{{$value->quantity}}</p>
                                        </td>
                                        <td id="{{'product-price'.$key}}">{{$value->product_price}}</td>
                                        <td>$0.00</td>
                                        <td id="{{'cost-product'.$key}}">{{$cost}}</td>
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
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <a href="{{ route('orderHistory') }}">
                                    <button type="submit" class="btn btn-template-main"><i
                                        class="fa fa-chevron-left"></i>Back to order history
                                    </button> 
                                </a>
                            </div>
                        </div>
                </div>

            </div>
            <!-- /.col-md-9  end-->
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
@endsection