<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function index()
    {
        $roles = Role::where('name', '!=', 'Administrator')->get();
        return view('pages.auth.main', compact('roles'));
    }
    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|max:255',
            'role_id' => 'required',
            'password' => 'required|min:8',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }elseif ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('role_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('role_id'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }

        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Registrasi Berhasil',
            'callback' => 'reload',
        ]);
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if ($user->status == 'approved'){
                if(Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
                    {
                        return response()->json([
                            'alert' => 'success',
                            'message' => 'Welcome back '. Auth::guard('web')->user()->name,
                            'redirect' => route('dashboard'),
                        ]);
                    }else{
                        return response()->json([
                            'alert' => 'error',
                            'message' => 'Maaf, password anda salah.',
                        ]);
                    }
            } elseif ($user->status == 'rejected') {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Maaf, akun anda ditolak.',
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Maaf, akun anda belum di verifikasi oleh admin.',
                ]);
            } 
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, Akun belum terdaftar.',
            ]);
        }
    }
    public function do_logout()
    {
        $user = Auth::guard('web')->user();
        Auth::logout($user);
        return redirect('/');
    }
}
