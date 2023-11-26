<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'role'=>1]))
        {
            return redirect()->route('admin');
        }
        return redirect()->back()->with('error','Dữ liệu không trùng khớp');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function postRegister (Request $request)
    {
        $request->merge(['password'=>Hash::make($request->password)]);
        $request->merge(['password_confirmation'=>Hash::make($request->password)]);

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'required|max:13',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ],[
            'password_confirmation.required'=> 'Hãy nhập lại mật khẩu',
            'password.confirmed'=> 'Mật khẩu không khớp'
        ]);
        try
        {
            dd($request);
            User::create($request->all());
        }catch(\Throwable $th){
            dd($th);
        }
        return redirect()->route('admin.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
