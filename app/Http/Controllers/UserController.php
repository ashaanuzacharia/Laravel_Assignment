<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use Session;

class UserController extends Controller
{
    public function userRegister(Request $request, $id=null)
    {
        if($request->isMethod('post')){

            $data = $request->all();

            $request->validate([
                'name'              =>      'required|string|max:20',
                'email'             =>      'required|email|unique:users,email',
                'phone'             =>      'required|numeric|min:10',
                'password'          =>      'required|string|min:8',
                'confirm_password'  =>      'required|same:password',
            
            ]);

            User::create([
                'name'  => $data['name'],
                'email' => $data['email'],
                'phone' =>$data['phone'],
                'company' =>$data['company'],
                'designation' =>$data['designation'],
                'password' => Hash::make($data['password']),
            ]);
            //return redirect()->route('user.register')->with(Session::flash('success','Thank you for registration!.'));session()->put('success','Thank you for registration!.');
            session()->set('success','Thank you for registration!.');
        }
        return view('auth.register');
    }
    
}
