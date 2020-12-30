@extends('main')
@section('product_name')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>My account</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div id="content" class="clearfix">

        <div class="container">

            <div class="row">

                <!-- *** LEFT COLUMN ***-->

                <div class="col-md-9 clearfix" id="customer-account">

                    <p class="lead">Change your personal details here.</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                        turpis egestas.</p>

                    <div class="box clearfix">
                        <div class="heading">
                            <h3 class="text-uppercase">Personal details</h3>
                        </div>

                        <form method="POST" action="{{ route('personalDetails') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Name</label>
                                        <input type="text" class="form-control" id="firstname" required name="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">E-Mail Address</label>
                                        <input type="text" class="form-control" id="company" required name="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">Phone Number</label>
                                        <input type="text" class="form-control" id="city" name="phonenumber"
                                            value="{{ Auth::user()->phonenumber }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Date Of Birth</label>
                                        <input type="date" class="form-control" id="phone" name="dateofbirth"
                                            value="{{ date("Y-m-d", strtotime(Auth::user()->dateofbirth)) }}">
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Save
                                        changes</button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***-->

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
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
@endsection
