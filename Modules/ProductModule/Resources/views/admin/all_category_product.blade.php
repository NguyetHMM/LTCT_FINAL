@extends('admin')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
            Liệt kê danh mục sản phẩm
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
                    
                    <th>Tên danh mục</th>
                    <th>Hiển thị/Ẩn</th>
                    <th>Sửa/Xóa</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($all_category_product as $key => $cate_pro)
                <tr>
                    <td>{{ $cate_pro->category_name }}</td>
                    <td><span class="text-ellipsis">
                        <?php
                        if($cate_pro->category_status==0){
                        ?>
                        <a href="{{URL::to('/productmodule/active-category-product/'.$cate_pro->category_id)}}">
                            <span class = "fa-thumb-styling fa fa-thumbs-down"></span></a>
                        
                        <?php
                        }else{
                        ?>
                        <a href="{{URL::to('/productmodule/unactive-category-product/'.$cate_pro->category_id)}}">
                            <span class = "fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php } ?>
                        
                    </span></td>
                    <td>
                    <a href="{{URL::to('/productmodule/edit-category-product/'.$cate_pro->category_id)}}" 
                        class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active" style="margin-right: 20px"></i></a>
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" 
                    href="{{URL::to('/productmodule/delete-category-product/'.$cate_pro->category_id)}}" 
                    class="active" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{$all_category_product->links()}}
        </div>
    </div>        


@endsection