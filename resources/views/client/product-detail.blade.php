@extends('layoutClient.fe')
@section('content')
    <section class="bg-white m-t-100">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-7 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="/uploads/{{ $pro->image }}" alt="Card image cap"
                            id="product-detail">
                    </div>
                    <input type="hidden" id="idProduct" value="{{ $pro->id }}">



                    <div class="row ">
                        <!--Start Controls-->
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap img-custom" role="listbox">
                                <!--First slide-->
                                <div class="">
                                    <div class="row ">
                                        @foreach ($image_arr as $image)
                                            <div class="col-5 ml-3 p-0 image-gallery">
                                                <a href="/uploads/{{ $image }}">
                                                    <img class="card-img mt-3 img-list" src="/uploads/{{ $image }}"
                                                        alt="Product Image 1">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-5 mt-5 position-sticky fixed">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="">{{ $pro->name }} </h4>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Thương hiệu:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted active"><a href="{{ route('home') }}"><strong>Anta</strong></a>
                                    </p>
                                </li>
                            </ul>
                            <div class="row ml-2">
                                <p class="text-h3 py-2 text-danger">
                                    <strong>{{ number_format($pro->price_sale) }}</strong><small>đ</small>
                                </p>
                                <p class="ml-3 text-h3 py-2">
                                    <del>{{ number_format($pro->price_default) }}<small>đ</small></del>
                                </p>
                            </div>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 </span>
                            </p>
                            <div class="sale mb-3">
                                <span class="title "><i class="zmdi zmdi-card-giftcard mr-1"></i>Khuyến mãi </span>
                                <ul class="mt-2">
                                    <li>ƯU ĐÃI THÁNG 12: SALE UPTO 50%+++</li>
                                    <li>Siêu sale cuối năm với hàng loạt chương trình khuyến mại hấp dẫn!</li>
                                    <li>🔥 COMBO: ANTA10, MUA2GIAM15%, MUA3GIAM30%</li>
                                    <li>🔥 VOUCHER: 60K, 100K, 200K</li>
                                    <li>Áp dụng sản phẩm có mức giảm giá < 50%, Không áp dụng với sản phẩm mới</li>
                                </ul>
                            </div>

                            <form action="{{ route('fe.cart.addToCart') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $pro->id }}">
                                <div class="p-t-33">
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Số đo
                                        </div>
                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2" name="size_id" id="sizeId"
                                                    data-url={{ route('fe.product.filterQuantityBySize') }}>
                                                    <option value="0">Vui lòng chọn kích thước</option>
                                                    <?php $test='' ?>
                                                    @foreach ($sizes as $size)
                                                        @foreach($quantities as $i)
                                                            @if($size->id==$i->size_id)
                                                            <option  value="{{ $size->id }}">{{ $size->size_number }}</option>
                                                                <?php $test=$size->id ?>
                                                                @endif
                                                    @endforeach
                                                    @if($size->id!=$test)
                                                            <option disabled="1" value="{{ $size->id }}">{{ $size->size_number }}</option>
                                                            @endif
                                                    @endforeach

                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="col size-204 flex-w flex-m respon6-next">
                                            <div class="size-203 flex-c-m respon6">
                                                Số lượng
                                            </div>
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus" id="minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    id="quantity" name="quantity" value="1">


                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus" id="plus"></i>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <button id="addToCart" type="button"
                                                    data-url="{{ route('fe.cart.addToCart') }}"
                                                    class="flex-c-m stext-101 cl0 size-101 btn btn-warning bor1 hov-btn1 p-lr-15 ml-5 trans-04 js-addcart-detail">
                                                    Add to cart
                                                </button>
                                                <button id="buttonBuy" type="button"
                                                    data-url="{{ route('fe.cart.addToCart') }}"
                                                    class="flex-c-m stext-101 size-101 btn btn-outline-danger bor1 hov-btn1 p-lr-15 ml-5 trans-04 js-addcart-detail">
                                                    Mua ngay
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <p class="justify-content-center p-l-70">Gọi đặt mua /Zalo
                                <strong>034548pppp</strong>(8:00-22:00)
                            </p>
                            <div class="row mt-5 sale ml-1 mb-5">
                                <div class="col-sm">
                                    Giao hàng toàn quốc
                                </div>
                                <div class="col-sm">
                                    Đổi trả dễ dàng
                                </div>
                                <div class="col-sm">
                                    Quà tặng hấp dẫn
                                </div>
                                <div class="col-sm">
                                    Cam kết chính hãng
                                </div>
                            </div>
                            <h6>Mô tả:</h6>
                            <div>
                                {!! $pro->description !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
    <style>
        .img-list {
            width: 310px !important;
            height: 310px;
        }

        .img-custom {
            width: 700px;
        }

        .sale {
            margin-bottom: 2px;
            margin-top: 20px;
            background: white;
            padding: 10px;
            border-radius: 5px;
            border: 1px dashed #ef0b0b;
            font-size: 15px;
            width: 100%;
        }

        .sale .title {
            background: #e31616;
            padding: 2px 20px;
            margin-top: -24px;
            font-size: 15px;
            font-weight: 500;
            color: #ffffff;
            display: block;
            max-width: 207px;
            border-radius: 99px;
        }

        .sale ul {
            margin-bottom: 4px;
        }
    </style>
@endsection
@section('js')
    {{-- <script>
        $('.image-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            removalDelay: 300,
            gallery: {
                enabled: true,
            },
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
        !--End Slider Script-- >
    </script> --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sizeId').change(function() {
                let sizeId = $(this).val();
                let productId = $("#idProduct").val();
                let data = {
                    'sizeId': sizeId,
                    'productId': productId
                };
                let url = $(this).attr('data-url');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    success: function(data) {
                        // alert('Thành công rồi');
                        $("#quantity").attr('data-quantity', data.qtyInStock);
                        console.log(data.qtyInStock);
                    },

                })


            })


            $('#addToCart').click(function() {
                let idProduct = $("#idProduct").val();
                let quantity = $("#quantity").val();
                let sizeId = $("#sizeId").val();

                let url = $(this).attr('data-url');
                if (sizeId == 0) {
                    alert('Bạn cần chọn kích cỡ giày !');
                    return false;
                };

                let data = {
                    'product_id': idProduct,
                    'quantity': quantity,
                    'size_id': sizeId
                };
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(data) {
                        // window.location.href = "/cart/list";
                        // let cartCount = data.cartCount;
                        // $("#cart").attr('data-notify', data.cartCount);
                        alert("Thêm giỏ hàng thành công");

                        // console.log(data.imagePath);
                        // console.log(data.product);
                        // console.log(data.test);
                        // $("#count").text(cartCount);


                    }
                });
            })

            $('#buttonBuy').click(function() {
                let idProduct = $("#idProduct").val();
                let quantity = $("#quantity").val();
                let sizeId = $("#sizeId").val();
                let url = $(this).attr('data-url');
                if (sizeId == 0) {
                    alert('Bạn cần chọn kích cỡ giày !');
                    return false;
                };
                let data = {
                    'product_id': idProduct,
                    'quantity': quantity,
                    'size_id': sizeId,
                };
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(data) {
                        // window.location.href = "/cart/list";
                        // let cartCount = data.cartCount;
                        window.location.href = "/cart/list";


                        // console.log(data.imagePath);
                        // console.log(data.product);
                        // console.log(data.test);
                        // $("#count").text(cartCount);


                    }
                });
            })


            // $ajax({
            //     type: 'POST',
            //     url: url,
            //     data: d
            // })

        })
    </script>
@endsection
