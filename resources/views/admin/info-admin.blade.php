@extends('admin.fe')
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin tài khoản </h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tr>
                                <th>Mã NV</th>
                                <td>{{'NV0'.\Illuminate\Support\Facades\Auth::user()->id}}</td>
                            </tr>


                            <tr>
                                <th>Họ và tên</th>
                                <td>{{\Illuminate\Support\Facades\Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <th>SĐT</th>
                                <td>{{\Illuminate\Support\Facades\Auth::user()->phone}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{\Illuminate\Support\Facades\Auth::user()->email}}</td>
                            </tr>

                        </table>

                    </div>

                </div>
            </div>
        </div>
@endsection
