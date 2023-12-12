@extends('admin.fe')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bảng danh sách hàng đã bán của tháng ... </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">STT</th>
                    <th>Tên hàng</th>
                    <th>Số lượng đã bán</th>
                    <th>So với tháng trước </th>
                </tr>
                </thead>
                @php
                    $r = 0;
                @endphp
                <tbody>
                @foreach ($pros as $item)
                    @foreach($item->productSizes as $i)
                    <tr>
                        <td>{{ ++$r }}</td>
                        <td>{{ $item->name }}</td>
                        <td style="text-align:center">
                            {{ $item->orders->sum('quantity') }}
                        </td>
                        <td style="text-align:center">

                        </td>

                    </tr>
                        @break
                    @endforeach
                @endforeach
                </tbody>
            </table>

        </div>


    </div>
@endsection
