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
                    Thông tin giao hàng
                </span>
            </div>
        </div>


        <!-- Shoping Cart -->
        <form class="bg0 p-t-30 p-b-85" method="post" action="{{ route('fe.order.doCheckout') }}">
            @csrf
            <div class="container">
                @auth
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                @endauth
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="flex-w p-l-25 p-r-15 p-b-20 p-lr-0-lg">
                            <h3>Thông tin giao hàng</h3>
                        </div>
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="col-11 mt-3">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" id="name" placeholder="Họ và tên"
                                        name="name">
                                </div>
                            </div>
                            <div class="col-11 mt-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email"
                                        name="email">
                                </div>
                            </div>

                            <div class="col-11">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Số điện thoại"
                                        name="phone">
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ"
                                        name="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group ">
                                        <label>Tỉnh/Thành</label>
                                        <div>
                                            <select name="province_id" id="province" class="form-control"
                                                data-url="{{ route('fe.order.filterDistrictByProvince') }}">
                                                <option value="">Vui lòng chọn </option>

                                                @foreach ($provinces as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group ">
                                        <label>Quận/Huyện</label>
                                        <div>
                                            <select name="district_id" id="district" class="form-control"
                                                data-url="{{ route('fe.order.filterDistrictByDistrict') }}">
                                                <option value="">Vui lòng chọn Tỉnh/Thành</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group ">
                                        <label>Phường/xã</label>
                                        <div>
                                            <select name="ward_id" id="ward" class="form-control">

                                                <option value="">Vui lòng chọn Quận/Huyện</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-w p-l-25 p-r-15 p-b-20 p-lr-0-lg p-t-50">
                            <h3>Phương thức vận chuyển</h3>
                        </div>
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="col-11 mt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" value="Freeship"
                                        readonly="1">
                                </div>
                            </div>

                        </div>
                        <div class="flex-w p-l-25 p-r-15 p-b-20 p-lr-0-lg p-t-20">
                            <h3>Phương thức thanh toán</h3>
                        </div>
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="col-11 mt-3">
                                <div class="row form-group">
                                    <input type="radio" id="option1" name="payment_method_id" value="0">
                                    <label for="option1" class="m-0 pl-3">Thanh toán khi nhận hàng (COD)</label><br>
                                </div>
                                <div class="row form-group">
                                    <input type="radio" id="option2" name="payment_method_id" value="1">
                                    <label for="option2" class="m-0 pl-3">Chuyển khoản qua ngân hàng</label><br>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-7 col-xl-5 m-lr-auto m-b-50 mt-20">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-lr-0-xl ">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Đơn hàng
                            </h4>
                            <table border="1px">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                @foreach (Cart::content() as $item)
                                    <tr>
                                        <td><img src="/uploads/{{ $item->options->image_path }}" alt=""
                                                style="width:50px;height:50px"></td>
                                        <td>{{ $item->options->size->size_number }}</td>
                                        <td>x{{ $item->qty }}</td>
                                        <td>{{ number_format($item->price, 0, '', '.') }}Đ</td>
                                    </tr>
                                @endforeach


                            </table>




                            <div class="flex-w flex-t bor12 p-b-13 pt-3">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Tổng:
                                    </span>
                                </div>

                                <div class="size-209 p-l-130 ">
                                    <span class="mtext-110 cl2 ">
                                        {{ number_format(Cart::subtotal(), 0, '', '.') }}Đ
                                    </span>
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                <div class="size-208 w-full-ssm">
                                    <span class="stext-110 cl2">
                                        Vận chuyển:
                                    </span>
                                </div>

                                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                    <p class="stext-111 cl6 p-t-2">
                                        0Đ
                                    </p>

                                </div>
                            </div>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Tổng:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{ number_format(Cart::total(), 0, '', '.') }}Đ
                                    </span>
                                </div>
                            </div>
                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                                type="submit">
                                Hoàn tất đơn hàng
                            </button>


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#province').change(function() {
                let provinceId = $(this).val();
                let url = $(this).attr('data-url');
                // alert(url);
                data = {
                    'provinceId': provinceId,
                };
                $.ajax({
                    type: 'get',
                    url: url,
                    data: data,
                    success: function(data) {
                        // alert('thanh công rồi');
                        let districts = data.districts;
                        let html = '<option value="">Vui lòng chọn</option>';
                        if (districts.length > 0) {
                            for (let i = 0; i < districts.length; i++) {
                                html +=
                                    '<option value="' + districts[i]["id"] + '">' + districts[i]
                                    ["name"] + '</option>'
                            }
                        }
                        $("#district").html(html);
                    }
                });
                $('#district').change(function() {
                    let districtId = $(this).val();
                    let url = $(this).attr('data-url');
                    // alert('haha');
                    data = {
                        'districtId': districtId,
                    };
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: data,
                        success: function(data) {
                            // alert('thanh công rồi');
                            let wards = data.wards;
                            let html = '<option value="">Vui lòng chọn</option>';
                            if (wards.length > 0) {
                                for (let i = 0; i < wards.length; i++) {
                                    html +=
                                        '<option value="' + wards[i]["id"] + '">' +
                                        wards[i]
                                        ["name"] + '</option>'
                                }
                            }
                            $("#ward").html(html);
                        }
                    });




                })
            })
        })
    </script>
@endsection
