@extends('admin')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
            Liệt kê thương hiệu sản phẩm
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
                    
                    <th>Tên thương hiệu</th>
                    <th>Hiển thị/Ẩn</th>
                    <th>Sửa/Xóa</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($all_brand_product as $key => $cate_pro)
                <tr>
                   
                    <td>{{ $cate_pro->brand_name }}</td>
                    <td><span class="text-ellipsis">
                        <?php
                        if($cate_pro->brand_status==0){
                        ?>
                        <a href="{{URL::to('/productmodule/active-brand-product/'.$cate_pro->brand_id)}}">
                            <span class = "fa-thumb-styling fa fa-thumbs-down"></span></a>
                        
                        <?php
                        }else{
                        ?>
                        <a href="{{URL::to('/productmodule/unactive-brand-product/'.$cate_pro->brand_id)}}">
                            <span class = "fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php } ?>
                        
                    </span></td>
                    <td>
                    <a href="{{URL::to('/productmodule/edit-brand-product/'.$cate_pro->brand_id)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active" style="margin-right: 20px"></i></a>
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="{{URL::to('/productmodule/delete-brand-product/'.$cate_pro->brand_id)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            {{$all_brand_product->links()}}
            </div>
        </div>
    </div>        


@endsection