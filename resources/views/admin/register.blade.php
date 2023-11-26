
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page (v2)</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">
    <script nonce="abdcfdb4-8b65-42cd-a198-d4b554c5b97a">(function(w,d){!function(j,k,l,m){j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const w of Object.entries(Object.entries(dataLayer).reduce(((x,y)=>({...x[1],...y[1]})),{})))zaraz.set(w[0],w[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const z=j.zaraz.q.shift();j[l].q.push(z)}r.defer=!0;for(const A of[localStorage,sessionStorage])Object.keys(A||{}).filter((C=>C.startsWith("_zaraz_"))).forEach((B=>{try{j[l]["z_"+B.slice(7)]=JSON.parse(A.getItem(B))}catch{j[l]["z_"+B.slice(7)]=A.getItem(B)}}));r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>
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

                </div>
            </form>
        </div>

    </div>
</div>


<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>
