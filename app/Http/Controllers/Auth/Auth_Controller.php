<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\AdminModel;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\GenerationModel;


class Auth_Controller extends BaseController
{
    public function login(){
        if(session('is_member')){
            return redirect('user/dashboard/1')->with('msg', 'Selamat datang '.session('name'));
        }

        return view('Auth/login');
    }

    public function admin(){
        if(session('is_admin')){
            return redirect('admin/dashboard')->with('msg', 'Selamat datang '.session('name'));
        }

        return view('Auth/login_admin');
    }

    public function register(){
        $generation = GenerationModel::all();

        $data['generation'] = $generation;
        return view('Auth/register',$data);
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('msg', 'Berhasil keluar!');
    }

    public function logout_admin(){
        Session::flush();
        return redirect('admin')->with('msg', 'Berhasil keluar!');
    }

    public function register_execute(Request $request){

        $nim = UserModel::where('nim', '=', $request->nim)->first();
        $email = UserModel::where('email', '=', $request->email)->first();

        if($nim || $email){
            return redirect('register')->with('msg', 'Gagal nim atau email sudah terdaftar!');
        }

        //get input
        $user =  new UserModel;
        $user->nim = $request->nim;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_handphone = $request->no_handphone;
        $user->address = $request->address;
        $user->program = $request->program;
        $user->generation = $request->generation;
        $user->password = sha1($request->password);
        $user->save();

        return redirect('login')->with('msg', 'Berhasil mendaftar silahkan masuk!');
    }

    public function login_execute(Request $request){
        $where = array(
            array('nim', '=', $request->nim),
            array('password', '=', sha1($request->password))
        );
        $user = UserModel::where($where)->get();

        if(count($user) <= 0){
            return redirect('login')->with('msg', 'Nim atau password salah!');
        }

        $user = $user[0];

        $data_session = array(
            'name' => $user->name,
            'nim' => $user->nim,
            'is_member' => true,
            'is_login' => true
        );

        session($data_session);

        $session = Session::all();

        return redirect('user/dashboard/1')->with('msg', 'Selamat datang '.$user->name);
    }

    public function login_admin_execute(Request $request){
        $where = array(
            array('email', '=', $request->email),
            array('password', '=', sha1($request->password))
        );
        $admin = AdminModel::where($where)->get();

        if(count($admin) <= 0){
            return redirect('admin')->with('msg', 'Email atau password salah!');
        }

        $admin = $admin[0];

        $data_session = array(
            'name' => $admin->name,
            'email' => $admin->email,
            'is_admin' => true,
            'is_login' => true
        );

        session($data_session);

        $session = Session::all();

        return redirect('admin/dashboard')->with('msg', 'Selamat datang '.$admin->name);
    }
}
