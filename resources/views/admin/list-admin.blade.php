@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row card-header">
                    <h3 class="card-title">Danh sách Nhân viên</h3>
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
                            <th scope="col">Mã NV</th>
                            <th scope="col">Tên Nhân viên</th>
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
                        @foreach ($ad_list as $ad)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>NV00{{$i}}</td>
                                <td>{{ $ad->name }}</td>
                                <td>{{ $ad->created_at }}</td>
                                <td></td>
                                <td>{{ $ad->phone }}</td>
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
