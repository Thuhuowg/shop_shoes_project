@extends('admin.fe')
@section('content')
    <div class="row">
<div class="col-12 ">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Đăng ký thành viên mới</p>
            <form action="{{route('admin.post-register')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên" required autofocus autocomplete="name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('name') }}</small>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" required autofocus autocomplete="phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('phone') }}</small>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email"  required autofocus autocomplete="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>
                <small class="text-danger">{{ $errors->first('email') }}</small>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Xác nhận mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>

                </div>
                <input type="hidden" name="role" value="1">
                <div class="row">
                    <div class="col-5 justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block">Đăng kí</button>
                    </div>
                    <div class="col-5 justify-content-center">
                        <a class="btn btn-secondary btn-block">Huỷ</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
    </div>
@endsection

