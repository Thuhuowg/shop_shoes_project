@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="row card-header">
                    <h3 class="card-title">Danh sách sản phẩm</h3>
                    <a class="btn btn-primary ml-4" href="{{route('add.product')}}">+</a>
                    <a class="btn btn-info ml-4" href="{{route('trash.product')}}" >
                        <i class="fa fa-trash"></i>
                    </a>
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
                            <?php $i = 1; ?>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>MaSP</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img class="image-small-custom" src="uploads/{{ $product->image }}"></td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        @foreach ($types as $type)
                                            @if ($product->type_id == $type->id)
                                                {{ $type->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($categories as $category)
                                            @if ($product->category_id == $category->id)
                                                {{ $category->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ number_format($product->price_default) }}<small>đ</small></td>
                                    <td class="text-danger">{{ number_format($product->price_sale) }}<small>đ</small></td>
                                    <td></td>
                                    <td>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            <a href="{{route('edit.product',['id'=>$product->id])}}" class="text-white">Sửa</a>
                                            </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <a href="{{route('delete.product',$product->id)}}" class="text-white">Xoá</a></button>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products_pag->links() }}

                </div>
            </div>
        @endsection
