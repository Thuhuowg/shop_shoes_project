@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách danh mục</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên banner</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0 ?>
                        <tr>
                            @foreach($banners as $banner)
                                    <?php ++$i ?>
                                <th scope="row">{{$i}}</th>
                                <td>{{$banner->name}}</td>
                                <td><img class="image-small-custom" src="uploads/{{$banner->image}}"></td>
                                <td>
                                    @if($banner->status==1)
                                            <?php echo 'Hoạt động' ?>
                                    @else
                                            <?php echo 'Tạm dừng' ?>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chỉnh sửa
                                    </button>
                                </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            <a href="{{route('add.banner')}}">
                <button type="button" class="btn btn-primary" data-dismiss="modal">+</button>
            </a>
@endsection
