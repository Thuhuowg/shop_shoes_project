@extends('admin.fe')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bảng doanh thu của tháng ... </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">STT</th>
                    <th>Tên hàng</th>
                    <th>Số lượng đã bán</th>
                    <th>Doanh thu </th>
                </tr>
                </thead>
                @php
                    $r = 0;
                @endphp
                <tbody>

                @foreach ($products_pag as $item)
                    @foreach($item->productSizes as $i)

                    <tr>

                        <td>{{ ++$r }}</td>
                        <td>{{ $item->name }}</td>
                        <td style="text-align:center">
                            {{ $item->orders->sum('quantity') }}
                        </td>
                        <td style="text-align:center">
                                <?php $a=$item->orders->sum('quantity');
                                $b =intval($item->price_sale);
                                $sum=$a * $b ?>
                            {{ number_format($sum) }}<small>đ</small>
                        </td>


                    </tr>
                    @break
                    @endforeach
                @endforeach

                </tbody>
            </table>
            {{ $products_pag->links() }}
        </div>

        <div class="card-footer">
            <h3 class="card-title">Tổng doanh thu của cửa hàng trong tháng:  </h3>
        </div>
    </div>
@endsection
