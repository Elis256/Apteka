<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginInController extends Controller
{
    public function __invoke(Request $request){

        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect()->route('main');
        }
        return back()->withErrors([
            'email' => 'Не удалось авторизоватся',
        ])->onlyInput('email');
    }
}
