@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách sản phẩm</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh đại diện</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Số lượng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>Ma SP</td>
                                <td>{{$product->name}}</td>
                                <td><img class="image-small-custom" src="uploads/{{$product->image}}"></td>
                                <td>{{$product->created_at}}</td>

                                <td>
                                    @foreach($sizes as $size)
                                    @foreach($finds as $find)
                                    @if($product->id==$find->product_id)
                                        @if($find->size_id == $size->id)
                                            <a href="#">{{$size->size_number}}:</a>  {{$find->quantity}}
                                        <br>
                                                @endif
                                    @endif
                                        @endforeach
                                        @endforeach

                                </td>

                            </tr>
                                <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection

