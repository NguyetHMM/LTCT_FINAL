@extends('main')
@section('product_name')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>PAYMENT MODULE</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @dd($infoOrder) --}}
@section('content')
    <div id="content">
            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Paid Success</h3>
                            </div>
                            <p class="text-muted">Your order have been paid. See your order below</p>
                            {{-- @dd($infoOrder) --}}
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <th>{{$infoOrder['name']}}</th>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <th>{{$infoOrder['address']}}</th>
                                        </tr>
                                        <tr class="Total">
                                            <td>Email</td>
                                            <th>{{$infoOrder['email']}}</th>
                                        </tr>
                                        <tr class="Total">
                                            <td>Phone Number</td>
                                            <th>{{$infoOrder['phonenumber']}}</th>
                                        </tr>
                                        {{-- <tr class="Total">
                                            <td>Email</td>
                                            <th>{{$infoOrder[1]->email}}</th>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
@endsection