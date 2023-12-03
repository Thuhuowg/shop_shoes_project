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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i=1 ?>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$category->name}}</td>
                            <td><img class="image-small-custom" src="uploads/{{$category->image}}"></td>
                            <td>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chỉnh sửa</button>
                            </td>
                        </tr>
                            <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

@endsection


