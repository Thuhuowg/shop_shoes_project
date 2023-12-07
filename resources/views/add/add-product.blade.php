@extends('admin.fe')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Thêm sản phẩm </h3>
        </div>
        <!-- /.card-header -->

        <form method="post" action="{{route('post-add.product')}}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <!-- /.col -->
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
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Lựa chọn loại giày</label>
                            <div>
                                <select name="type_id" id="type" class="form-control" >
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach


                                </select>
                            </div>
                        </div>
                        <!-- /.form-group -->

                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" placeholder="nhập tên sản phẩm" name="name">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="slug" name="slug">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-8">
{{--                        <div class="form-group">--}}
{{--                            <label for="description"> Mô tả </label>--}}
{{--                            <textarea id="textarea" name="description" class="form-control" placeholder="mô tả về sản phẩm"></textarea>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="description"> Mô tả </label>
                            <textarea id="summernote" name="description" class="form-control" placeholder="mô tả về loại phòng"></textarea>
                        </div>
                        <div class="form-group ">
                            <label>Tải nhiều ảnh </label>
                            <div class="input-group mb-3">
                                <input type="hidden" name="image_list" id="image_list" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalList">
                                    <i class="fas fa-folder-open"></i>
                                </button>
                            </div>
{{--                            <div>--}}
{{--                                <iframe src="{{url('http://127.0.0.1:8000/filemanager/dialog.php?field_id=image')}}" style="width: 100%; height:500px; overflow-y: auto; border: none"  ></iframe>--}}

{{--                            </div>--}}
                            <div class="row" id="show_image_list">

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Giá sản phẩm mặc định </label>
                            <input type="number" name="price_default" class="form-control price_default" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="voucher_sale">Discount (%) </label>
                            <input type="number" id="voucher_sale" name="voucher_sale" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group ">
                            <label>Tải ảnh đại diện sản phẩm </label>
                            <div class="input-group mb-3">
                                <input name="image" id="image" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-folder-open"></i>
                                </button>
                            </div>
                            <img src="" id="show_img" style="width: 100%;" >
                        </div>

                    </div>
                </div>
                <div class="col-sm-2 float-right mb-3 mt-3 justify-content-center">
                    <div class="row d-flex" style="gap: 5px">
                        <button type="submit" class="col btn btn-block btn-outline-primary">Gửi </button>
                        <a href="#" class="col mt-0 btn btn-block btn-outline-secondary">Huỷ</a>
                    </div>
                </div>
            </div>

        </form>

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
            <!-- model -->
        <div class="modal fade" id="modalList" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-custom" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="listModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="{{url('http://127.0.0.1:8000/filemanager/dialog.php?field_id=image_list')}}" style="width: 100%; height:500px; overflow-y: auto; border: none"  ></iframe>
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

            <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

            <script>
                $(function () {
                    // Summernote
                    $('#summernote').summernote({
                        height: 250,
                    })

                });
                $('#exampleModal').on('hide.bs.modal',event =>{
                    var _link = $('input#image').val();
                    var _img = "{{url('/uploads')}}" + '/' + _link;
                    $('img#show_img').attr('src',_img);
                });

                $('#modalList').on('hide.bs.modal',event =>{
                    var _links = $('input#image_list').val();
                    var _args = $.parseJSON(_links);
                    var _html = '';
                    for (let i = 0; i < _args.length; i++) {
                        let _url = "{{url('/uploads')}}" + '/' + _args[i];
                        _html += '<div class="col-md-4">';
                        _html += '<img src="'+_url+'" alt="" style="width: 100%;" >'
                        _html += '</div>';
                    }

                    $('#show_image_list').html(_html);
                });

            </script>
            <script src="{{url('tinymce/tinymce.min.js')}}"></script>
            <script>
                tinymce.init({
                    selector: '#textarea',  // change this value according to your HTML
                    plugins: 'a_tinymce_plugin',
                    a_plugin_option: true,
                    a_configuration_option: 400
                });
            </script>
            <script>
                $('input#name').keyup(function (event){
                    var title, slug;
                    //Lấy text từ thẻ input title
                    title = $(this).val();

                    //Đổi chữ hoa thành chữ thường
                    slug = title.toLowerCase();

                    //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                    $('input#slug').val(slug);
                });
            </script>
@endsection
