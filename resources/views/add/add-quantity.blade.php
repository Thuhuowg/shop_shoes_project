@extends('admin.fe')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Thêm số lượng sản phẩm</h3>
        </div>
        <!-- /.card-header -->

        <form method="post" action="{{route('post-add.quantity')}}">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Lựa chọn sản phẩm</label>
                            <div>
                                <select name="product_id" class="form-control" >
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label >Số đo kích cỡ</label>
                            <div>
                                <select name="size_id" class="form-control" >
                                    @foreach($categories as $category)
                                        <optgroup label="{{$category->name}}"/>
                                        @if($category->sizes)
                                            @foreach($category->sizes as $size)
                                                <option value="{{$size->id}}">{{$size->size_number}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="quantity">Nhập số lượng</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-sm-2 float-right mb-3 mt-3 justify-content-center">
                    <div class="row d-flex" style="gap: 5px">
                        <button type="submit" class="col btn btn-block btn-outline-primary">Gửi </button>
                        <a href="{{route('admin')}}" class="col mt-0 btn btn-block btn-outline-secondary">Hủy</a>
                    </div>
                </div>
            </div>

        </form>
@endsection

