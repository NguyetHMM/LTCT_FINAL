@extends('main')
@section('product_name')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>My Orders</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div id="content">
        <div class="container">

            <div class="row">

                <!-- *** LEFT COLUMN ***-->

                <div class="col-md-9" id="customer-orders">

                    <p class="text-muted lead">If you have any questions, please feel free to <a href="contact.html">contact
                            us</a>, our customer service center is working for you 24/7.</p>

                    <div class="box">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th></th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (count($all_orders) > 0)
                                        @foreach ($all_orders as $key => $value)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td><a href="{{route('orderDetails', ['order_id' => $value->id])}}">Show Details</a></td>
                                                <td>{{$value->orderDate}}</td>
                                                <td>{{$value->state}}</td>
                                                <td>{{$value->total}}VND</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.box -->

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***-->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="">
                                    <a href="{{ route('orderHistory') }}"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="{{ route('personalDetails') }}"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <!-- *** RIGHT COLUMN END *** -->

            </div>


        </div>
        <!-- /.container -->
    </div>

@endsection
