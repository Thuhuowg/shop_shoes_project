@extends('admin.fe')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bảng tồn kho</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Tên hàng</th>
                        <th>DVT</th>
                        <th>Nhập </th>
                        <th>Xuất </th>
                        <th>Tồn </th>
                    </tr>
                </thead>
                @php
                    $r = 0;
                @endphp
                <tbody>
                    @foreach ($products_pag as $item)
                        <tr>
                            <td>{{ ++$r }}</td>
                            <td>{{ $item->name }}</td>
                            <td>đôi</td>
                            {{-- @php
                                dd();
                            @endphp --}}
                            <td style="text-align:center">{{ $item->productSizes->sum('quantity') }}</td>
                            <td style="text-align:center">{{ $item->orders->sum('quantity') }}</td>
                            <td style="text-align:center">
                                {{ $item->productSizes->sum('quantity') - $item->orders->sum('quantity') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products_pag->links() }}
        </div>


    </div>
@endsection
