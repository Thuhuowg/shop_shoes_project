@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row card-header">
                    <h3 class="card-title">Danh sách sản phẩm</h3>
                    <a class="btn btn-primary ml-4" href="#">+</a>
                    <a class="btn btn-info ml-4" href="#" >
                        <i class="fa fa-trash"></i>
                    </a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã KH</th>
                            <th scope="col">Tên Khach Hang</th>
                            <th scope="col">Ngày thêm </th>
                            <th scope="col"></th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col"></th>
                            <th scope="col">Tình trạng </th>
                            <th scope="col"></th>
                            <th scope="col">Chỉnh sửa </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($clients as $p)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td><?php echo 'KH00' . $i ?></td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td></td>
                                <td>{{ $p->phone }}</td>
                                <td></td>
                                <td>Hoạt động</td>
                                <td></td>
                                <td>
                                    <a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sửa</button>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        <a href="#" class="text-white">Xoá</a></button>
                                </td>
                            </tr>
                                <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
@endsection
