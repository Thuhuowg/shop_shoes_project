@extends('admin.fe')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        Chi tiết đơn hàng
                        <a href="{{ route('admin.order.list') }}" class=" float-right">Quay lại</a>



                    </div>
                </div>

                <div class="invoice p-3 m-auto" style="width:90%">

                    {{-- <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                                </h4>
                            </div>

                        </div> --}}

                    <div class="row invoice-info">


                        <div class="col-sm-4 invoice-col">
                            <p style="font-size: 30px">Receiver Info:</p>
                            <address>
                                -Họ và tên:<strong>{{ $transaction->name }}</strong><br>
                                -Địa chỉ : {{ $transaction->address }}<br>
                                -{{ $transaction->ward->name }},{{ $transaction->district->name }},Tỉnh
                                {{ $transaction->province->name }}.<br>
                                -Phone: {{ $transaction->phone }}<br>
                                -Email: {{ $transaction->email }}<br>
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #{{ $transaction->id }}</b><br>
                            <br>
                            <b>Trạng thái: @switch($transaction->status)
                                    @case(0)
                                        <span class="badge badge-warning">waiting for confirm</span>
                                    @break

                                    @case(1)
                                        <span class="badge badge-warning">Pending</span>
                                    @break

                                    @case(2)
                                        <span class="badge badge-primary">Processing</span>
                                    @break

                                    @case(3)
                                        <span class="badge badge-success">Success</span>
                                    @break

                                    @case(4)
                                        <span class="badge badge-danger">Canceled</span>
                                    @break
                                @endswitch
                            </b> <br>
                            <b>Date:</b>{{ $transaction->created_at }}<br>
                            {{-- <b>Account:</b> 968-34567 --}}
                        </div>

                    </div>

                    <p style="font-size: 30px">Order Info:</p>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Image</th>
                                        <th>Size</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cartTotal = 0;
                                    @endphp
                                    @foreach ($transaction->orders as $orderProduct)
                                        <tr>
                                            <td>{{ $orderProduct->product->name }}</td>
                                            <td><img src="/uploads/{{ $orderProduct->product->image }}" alt=""
                                                    style="width:40px;height:40px">
                                            </td>
                                            <td>{{ $orderProduct->size->size_number }}</td>
                                            <td>{{ number_format($orderProduct->product->price_sale, 0, ',', '.') }}Đ</td>
                                            <td>{{ $orderProduct->quantity }}</td>
                                            <td>{{ number_format($orderProduct->product->price_sale * $orderProduct->quantity, 0, ',', '.') }}Đ
                                            </td>
                                        </tr>
                                        @php
                                            $cartTotal += $orderProduct->product->price_sale * $orderProduct->quantity;
                                        @endphp
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="row">

                        {{-- <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="../../dist/img/credit/visa.png" alt="Visa">
                                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p>
                            </div> --}}

                        <div class="col-6">
                            <p class="lead"><span data-lemma="amount" data-pos="NOUN" data-genre="WyJHRU5FUkFMIl0="
                                    data-clicked="true" data-track="d7e48233-7f34-41b8-86a0-1a0ec50add89"
                                    class="elia_highlightedItem active activated" data-hover="Click to learn"
                                    style="      --elia-color:rgb(33, 37, 41);      --elia-color-back:rgba(33,37,41,0.1);      --elia-color-back-hover:rgba(33,37,41,0.15);    ">Amount
                                    <div class="highlightCircle"></div>
                                    <div class="elia-bg-highlight"></div>
                                    <div class="elia-hoverAction">
                                        <div class="elia-actions">
                                            <span class="elia-iknow" data-text="I know this"></span>
                                            <span class="elia-actionStart" data-text="Learn"></span>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>{{ number_format($cartTotal, 0, ',', '.') }}Đ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
