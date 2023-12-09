@extends('layoutClient.fe')
@section('content')
    <div class="container m-t-70">
        <div class="container">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
                    Trang chủ
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <span class="stext-109 cl4">
                    Giỏ hàng
                </span>
            </div>
        </div>


        <!-- Shoping Cart -->
        <div style="height:400px;display:flex;justify-content:center;align-items:center">
            <div style="text-align: center;">
                <h3>Bạn đã đặt hàng thành công!</h3>
                <h2>Vui lòng vào gmail của bạn để xác nhận đơn hàng</h2>
                <p><a href="http://gmail.com" class="btn btn-sm btn-primary" target="_blank">Email của bạn</a></p>


            </div>

        </div>

    </div>
@endsection
