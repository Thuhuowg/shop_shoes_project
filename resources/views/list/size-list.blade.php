@extends('admin.fe')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách cỡ giày</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Kích thước</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i=1 ?>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$category->name}}</td>

                                <td>
                                    @foreach($sizes as $size)
                                        @if($category->id==$size->category_id)
                                     {{$size->size_number}} |
                                        @endif
                                    @endforeach
                                </td>

{{--                                <td>{{$category->name}}</td>--}}

{{--                                <td>--}}
{{--                                    @foreach($sizes as $size)--}}
{{--                                            {{$size->size_number}} |--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}

                            </tr>
                                <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            <a href="{{route('add.size')}}">
            <button type="button" class="btn btn-primary" data-dismiss="modal">+</button>
            </a>
@endsection
