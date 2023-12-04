@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách sản phẩm</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã SP</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh </th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Loại </th>
                            <th scope="col">Danh mục </th>
                            <th scope="col">Giá mặc định</th>
                            <th scope="col">Giá sale</th>
                            <th scope="col">Đánh giá</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>MaSP</td>
                            <td>{{$product->name}}</td>
                            <td><img class="image-small-custom" src="uploads/{{$product->image}}"></td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                @foreach($types as $type )
                                    @if($product->type_id==$type->id)
                                        {{$type->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($categories as $category )
                                    @if($product->category_id==$category->id)
                                {{$category->name}}
                                        @endif
                                    @endforeach
                            </td>
                            <td>{{number_format($product->price_default)}}</td>
                            <td>{{number_format($product->price_sale)}}</td>
                            <td></td>
                            <td>
                                <a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chỉnh sửa</button>
                                </a>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Xoá</button>
                            </td>
                        </tr>
                            <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
    </div>
@endsection

