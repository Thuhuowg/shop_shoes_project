@extends('admin.fe')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Thêm banner</h3>
        </div>
        <!-- /.card-header -->

        <form method="post" action="{{route('post-add.banner')}}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Tên banner</label>
                            <input type="text" class="form-control" placeholder="Nhập tên " name="name">
                        </div>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <div>
                                <select name="status" class="form-control" >
                                    <option value="1">Hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group ">
                            <label>Tải ảnh </label>
                            <div class="input-group mb-3">
                                <input type="hidden" name="image" id="image" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-folder-open"></i>
                                </button>
                            </div>
                            <div>
                                <img src="" id="show_img" style="width: 100%;" >
                            </div>
                        </div>
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
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
    </div>
    <!-- /.card-body -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{url('http://127.0.0.1:8000/filemanager/dialog.php?field_id=image')}}" style="width: 100%; height:500px; overflow-y: auto; border: none"  ></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#exampleModal').on('hide.bs.modal',event =>{
            var _link = $('input#image').val();
            var _img = "{{url('/uploads')}}" + '/' + _link;
            $('img#show_img').attr('src',_img);
        });
    </script>
@endsection

