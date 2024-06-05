<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function createUser()
    {
        return view('admin.createUser');
    }

    public function storeUser(Request $request)
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

        $user = new User();
        $user->fname = $data['fname'];
        $user->mname = $data['mname'];
        $user->lname = $data['lname'];
        $user->role = $data['role'];
        $user->unit = $data['unit'];
        $user->password = $data['password'];
        $user->email = $data['email'];
        $user->save();

        //User::create($data);

        return redirect()->route('admin.users');
    }
}
