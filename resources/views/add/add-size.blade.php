@extends('admin.fe')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Thêm kích thước</h3>
        </div>
        <!-- /.card-header -->

        <form method="post" action="{{route('post-add.size')}}">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Lựa chọn danh mục</label>
                            <div>
                                <select name="category_id" class="form-control" >
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="size_number">Số đo kích cỡ</label>
                            <input type="text" class="form-control" placeholder="nhập kích thước" name="size_number">
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

        <!-- /.card-body -->
@endsection
