@extends('admin')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
            Liệt kê sản phẩm
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert" style="color:green; border: 1px solid red">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hình ảnh </th>
                    <th>Danh mục </th>
                    <th>Thuong hiệu </th>
                    <th>Hiển thị/Ẩn</th>
                    <th>Sửa/Xóa</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key => $pro)
                <tr>
                    <td>{{ $pro->product_name }}</td>
                    <td>{{ $pro->product_price }}</td>
                    <td><img style="width: 200px" src = "{{ asset('storage/images/'.$pro->product_image) }}"></td>
                    <td>{{ $pro->category_name }}</td>
                    <td>{{ $pro->brand_name }}</td>
                    <td><span class="text-ellipsis">
                        <?php
                        if($pro->product_status==0){
                        ?>
                        <a href="{{URL::to('/productmodule/active-product/'.$pro->product_id)}}">
                            <span class = "fa-thumb-styling fa fa-thumbs-down"></span></a>
                        
                        <?php
                        }else{
                        ?>
                        <a href="{{URL::to('/productmodule/unactive-product/'.$pro->product_id)}}">
                            <span class = "fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php } ?>
                        
                    </span></td>
                    <td>
                    <a href="{{URL::to('/productmodule/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active" style="margin-right: 20px"></i></a>
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="{{URL::to('/productmodule/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{$all_product->links()}}
        </div>
    </div>        


@endsection