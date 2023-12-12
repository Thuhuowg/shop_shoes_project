<?php
use Carbon\Carbon;
?>
@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="float-left" style="display:flex;gap:10px">
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'all']) }}" class="status">Tất cả</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'waiting']) }}" class="status">Đợi để xác nhận</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'pending']) }}" class="status">Chưa xử lý</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'processing']) }}"
                            class="status">Đang xử lý</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'success']) }}" class="status">Thành công</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'canceled']) }}" class="status">Bị Huỷ</a>
                    </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- @if ($status)
                        <p>Status:{{ $status }}
                        </p>
                    @endif
                    @if (request()->month)
                        Tháng:{{ request()->month }}
                    @endif --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Điện thoại</th>
                                <th>Tình trạng</th>
                                <th>Thời gian</th>
                                {{-- <th>Số lượng:{{ $count }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $r = 0;
                            @endphp

                            @foreach ($transactions as $item)
                                <tr>
                                    <td>{{ ++$r }}</td>
                                    <td style="text-align:center">{{ $item->transaction_code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>

                                    {{-- <td>{{ number_format($item->quanity * $item->product->price_sale, 0, ',', '.') }}Đ</td> --}}
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <span class="badge badge-warning">Đợi xác nhận</span>
                                            @break

                                            @case(1)
                                                <span class="badge badge-warning">Chưa xử lý</span>
                                            @break

                                            @case(2)
                                                <span class="badge badge-primary">Đang xử lý</span>
                                            @break

                                            @case(3)
                                                <span class="badge badge-success">Thành công</span>
                                            @break

                                            @case(4)
                                                <span class="badge badge-danger">Bị Huỷ</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td style="width:100px">{{ Carbon::parse($item->created_at)->toDateString() }}</td>
                                    <td style="width:230px">

                                        <a class="btn btn-warning"
                                            href="{{ route('admin.order.detail', $item->id) }}">Chi tiết</a>
                                        @if($item->status == 2)
                                        <a class="btn btn-info"
                                           href="{{ route('admin.order.transport', $item->id) }}">Vận chuyển</a>
                                        @endif
                                        <div class="btn-group">
                                            <button type="button"
                                                class="bg-green-600 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">Thay đổi
                                                </button>
                                            <button type="button"
                                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 rounded-l dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu" style="">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.order.changeStatus', ['transaction_id' => $item->id, 'status' => 0]) }}">Đợi xác nhận</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.order.changeStatus', ['transaction_id' => $item->id, 'status' => 1]) }}">Chưa xử lý</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.order.changeStatus', ['transaction_id' => $item->id, 'status' => 2]) }}">Đang xử lý</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.order.changeStatus', ['transaction_id' => $item->id, 'status' => 3]) }}">Thành công</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.order.changeStatus', ['transaction_id' => $item->id, 'status' => 4]) }}">Bị Huỷ</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
