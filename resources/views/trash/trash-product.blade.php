@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="row card-header">
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
                        <?php $i = 1; ?>
                        @foreach ($pro_trashs as $pro_trash)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>MaSP</td>
                                <td>{{ $pro_trash->name }}</td>
                                <td><img class="image-small-custom" src="uploads/{{ $pro_trash->image }}"></td>
                                <td>{{ $pro_trash->created_at }}</td>
                                <td>
                                    @foreach ($types as $type)
                                        @if ($pro_trash->type_id == $type->id)
                                            {{ $type->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($categories as $category)
                                        @if ($pro_trash->category_id == $category->id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ number_format($pro_trash->price_default) }}<small>đ</small></td>
                                <td class="text-danger">{{ number_format($pro_trash->price_sale) }}<small>đ</small></td>
                                <td></td>
                                <td>
                                    <a href="{{route('restore.product',$pro_trash->id)}}">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Phục hồi</button>
                                    </a>
                                </td>
                            </tr>
                                <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $pro_trashs->links() }}

                </div>
            </div>
@endsection
