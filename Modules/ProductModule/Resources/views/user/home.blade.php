@extends('main')

@section('product_name')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Website E-commerce</h1>
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

                <div class="col-sm-3">

                    <!-- *** MENUS AND FILTERS ***-->
                    <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Categories</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked category-menu">
                                    @foreach ($category as $key => $cate)
                                    <li>
                                        <a href="{{ URL::to('productmodule/filter-cate/' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Brands</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked category-menu">
                                    @foreach ($brand as $key => $brand)
                                    <li>
                                        <a href="{{ URL::to('productmodule/filter-brand/' . $brand->brand_id) }}">{{ $brand->brand_name }}</a>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="shop-category.html">
                            <img src="{{ asset('Order/img/banner.jpg') }}" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                    <!-- /.banner -->

                </div>
                <!-- /.col-md-3 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***-->

                <div class="col-sm-9">

                    <div class="row products">
                        @foreach ($all_product as $key => $pro)
                        
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="image"> <!-- da xoa class="image"-->
                                        <a href="{{ URL::to('ordermodule/productDetail/' . $pro->product_id) }}">
                                            <img src="{{ asset('storage/images/' . $pro->product_image) }}" alt=""
                                                class="img-responsive image1">
                                            
                                        </a>
                                    </div>
                                    <!-- /.image -->
                                    <div class="text">
                                        <h5><a
                                                href="{{ URL::to('ordermodule/productDetail/' . $pro->product_id) }}">{{ $pro->product_name }}</a>
                                        </h>
                                        <p>{{ $pro->product_content }}</p>
                                        <p class="price">{{ $pro->product_price }}đ</p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach
                        <!-- /.col-md-4 -->
                    </div>
                    <!-- /.products -->

                    <div class="row">

                        <div class="col-md-12 banner">
                            <a href="#">
                                <img src="img/banner2.jpg" alt="" class="img-responsive">
                            </a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            
                        </div>
                        <div class="col-md-4">
                            {{$all_product->links()}}
                        </div>
                    </div>
                    

                </div>
                <!-- /.col-md-9 -->

                <!-- *** RIGHT COLUMN END *** -->

            </div>

        </div>
        <!-- /.container -->
    </div>
@endsection
