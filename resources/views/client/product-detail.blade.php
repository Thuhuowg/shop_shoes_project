@extends('layoutClient.fe')
@section('content')
    <section class="bg-white m-t-100">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-7 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="/uploads/{{$pro->image}}" alt="Card image cap"
                             id="product-detail">
                    </div>
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
                                        @foreach($image_arr as $image)
                                            <div class="col-5 ml-3 p-0 image-gallery">
                                                <a href="/uploads/{{$image}}">
                                                    <img class="card-img mt-3 img-list"
                                                         src="/uploads/{{$image}}" alt="Product Image 1">
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
                <div class="col-lg-5 mt-5">
                    <div class="card">
                        <div class="card-body" >
                            <h1 class="h2">{{$pro->name}} </h1>
                            <p class="h3 py-2">{{($pro->price_default)}}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Easy Wear</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum
                                convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Avaliable Color :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>White / Black</strong></p>
                                </li>
                            </ul>

                            <h6> Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li> Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li> Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span>
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span>
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span>
                                            </li>
                                            <li class="list-inline-item"><span
                                                    class="btn btn-success btn-size">XL</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity"
                                                       value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                                               id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary"
                                                                               id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                                               id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">
                                            Buy
                                        </button>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit"
                                                value="addtocard">Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </form>

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
        .img-custom{
            width: 700px;
        }
    </style>
@endsection
@section('js')
    <script>
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
                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
        <!-- End Slider Script -->
    </script>
@endsection
