<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'fname'=> 'required',
            'mname'=> 'required',
            'lname'=> 'required',
            'role'=> 'required',
            'unit'=> 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if(User::where('email', $data['email'])->exists()){
            return redirect(route('user.registration'))->withErrors([
                'formError'=> 'Ошибка такой пользователь уже существует',
            ]);
        }

        $user = new User();
        $user->fname = $data['fname'];
        $user->mname = $data['mname'];
        $user->lname = $data['lname'];
        $user->role = $data['role'];
        $user->unit = $data['unit'];
        $user->password = $data['password'];
        $user->email = $data['email'];
        $user->save();

        //$user = User::create($data);

        if($user)
        {
            Auth::login($user);
            return redirect()->route('main');
        }
        return redirect(route('user.registration'))->withErrors([
            'formError'=> 'Ошибка при сохранении пользователя', 'email'
        ]);
    }
}
