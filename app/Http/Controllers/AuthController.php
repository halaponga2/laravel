<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.registration');
    }

    public function customRegistration(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:App\Models\User,email',
            'password'=>'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // return redirect('/login')->withSuccess('Авторизация прошла успешно');
        return redirect()->route('login')->withSuccess('Авторизация прошла успешно');
    }

    public function login(){
        return view('auth.login');
    }

    public function customLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credentials= $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/articles')->withSuccess('Вход выполнен');
        }
        // return redirect('/login')->withSuccess('В доступе отказано, проверьте введенные данные');
        return redirect()->route('login')->withSuccess('В доступе отказано, проверьте введенные данные');
        
    }
    
    public function signOut(){
        Auth::logout();
        // return redirect('/login');
        return redirect()->route('login');
    }
}
