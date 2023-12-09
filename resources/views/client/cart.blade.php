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
        @if (Cart::count() > 0)
            <form class="bg0 p-t-75 p-b-85">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                            <div class="m-l-25 m-r--38 m-lr-0-xl">
                                <div class="wrap-table-shopping-cart">
                                    <table class="table-shopping-cart">
                                        <tr class="table_head">
                                            <th class="column-1">Hình ảnh</th>
                                            <th class="column-2">Sản phẩm</th>
                                            <th class="column-3">Giá</th>
                                            <th class="column-3">Size</th>
                                            <th class="column-4">Số lượng</th>
                                            <th class="column-5">Tổng</th>
                                        </tr>
                                        @foreach (Cart::content() as $item)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1"
                                                        data-url="{{ route('fe.cart.delete', $item->rowId) }}">
                                                        <img src="/uploads/{{ $item->options->image_path }}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-2">{{ $item->name }}</td>
                                                <td class="column-3">{{ number_format($item->price, 0, '', '.') }}Đ</td>
                                                <td class="column-3">{{ $item->options->size->size_number }}</td>
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <div data-url="{{ route('fe.cart.update', $item->rowId) }}"
                                                            class="buttonMinus btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                            name="num-product2" value="{{ $item->qty }}">

                                                        <div class="buttonPlus btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                                            data-url="{{ route('fe.cart.update', $item->rowId) }}">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="column-5 total">
                                                    {{ number_format($item->qty * $item->price, 0, '', '.') }}Đ
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>

                                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                    <a href="{{ route('fe.cart.destroy') }}">
                                        <div
                                            class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">

                                            Xóa toàn bộ giỏ hàng
                                        </div>

                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                                <h4 class="mtext-109 cl2 p-b-30">
                                    Tổng giỏ hàng
                                </h4>

                                <div class="flex-w flex-t bor12 p-b-13">
                                    <div class="size-208">
                                        <span class="stext-110 cl2">
                                            Tổng cộng:
                                        </span>
                                    </div>

                                    <div class="size-209">
                                        <span class="mtext-110 cl2" id="total">
                                            {{ number_format(Cart::total(), 0, '', '.') }}Đ
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-w flex-t bor12 p-b-13">
                                    <div class="size-208">
                                        <span class="stext-110 cl2">
                                            Phí ship:
                                        </span>
                                    </div>

                                    <div class="size-209">
                                        <span class="mtext-110 cl2">
                                            0Đ
                                        </span>
                                    </div>
                                </div>

                                <a type="button"href="{{ route('fe.order.checkout') }}"
                                    class="flex-c-m stext-101 cl0 mt-3 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                    Thanh toán
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <div style="text-align: center">
                <h3>Bạn không có sản phẩm nào trong giỏ hàng</h3>

                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                    class="bi bi-basket" viewBox="0 0 16 16">
                    <path
                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
                </svg>
                <a href="{{ route('home') }}">
                    <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">

                        Tiếp tục mua hàng
                    </div>
                </a>

            </div>
        @endif

    </div>
@endsection
@section('js')
    <script>
        //format number
        function formatNumber(number) {
            let num2 = number + "";
            let dem = 0;
            let tmp = "";
            let ans = "";
            for (let i = num2.length - 1; i >= 0; i--) {
                tmp += num2[i];
                dem++;
                if (dem % 3 == 0) {
                    tmp += ".";
                }
            }
            for (let i = tmp.length - 1; i >= 0; i--) {
                ans += tmp[i];
            }
            if (ans[0] == '.') {
                ans = ans.replace('.', '');
            }
            return ans;
        }

        function formatNumber2(number) {
            let num2 = number + "";
            let ans = "";
            for (let i = 0; i < num2.length - 3; i++) {
                ans += num2[i];
            }
            return ans;
        }
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $(".buttonPlus").click(function() {
                let currentRow = $(this).closest("tr");
                let qty = currentRow.find("td:eq(4) input").val();
                let url = $(this).attr('data-url');
                // alert(qty);
                data = {
                    'qty': qty,
                }
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(data) {
                        // alert('thành công rồi');
                        // console.log(data.cart);
                        $("#total").text(formatNumber(formatNumber2(data.cartTotal)) + "Đ");
                        let qty = data.currentCart["qty"];
                        let price = data.currentCart["price"];
                        // alert(formatNumber(price));
                        currentRow.find("td:eq(5)").text(formatNumber(qty * price) + "Đ");
                        $("#cart").attr('data-notify', data.cartCount);
                    }

                });

            });
            $(".buttonMinus").click(function() {
                let currentRow = $(this).closest("tr");
                let qty = currentRow.find("td:eq(4) input").val();
                let url = $(this).attr('data-url');
                // alert(qty);
                data = {
                    'qty': qty,
                }
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(data) {
                        // alert('thành công rồi');
                        // console.log(data.cart);
                        $("#total").text(formatNumber(formatNumber2(data.cartTotal)) + "Đ");
                        let qty = data.currentCart["qty"];
                        let price = data.currentCart["price"];
                        // alert(formatNumber(price));
                        currentRow.find("td:eq(5)").text(formatNumber(qty * price) + "Đ");
                        $("#cart").attr('data-notify', data.cartCount);
                    }

                });

            });
            $('.how-itemcart1').click(function() {
                $(this).closest('tr').remove();
                let url = $(this).attr('data-url');
                $.ajax({
                    type: 'get',
                    url: url,
                    success: function(data) {
                        // alert('thành công rồi');
                        // console.log(data.cart);
                        $("#total").text(formatNumber(formatNumber2(data.cartTotal)) + "Đ");
                        $("#cart").attr('data-notify', data.cartCount);
                        alert('Xóa sản phẩm thành công');
                    }

                });
            });
        })
    </script>
@endsection
