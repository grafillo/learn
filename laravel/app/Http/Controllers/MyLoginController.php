<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MyLoginController extends Controller
{

//    public function authenticate(Request $request)
//    {
//
//        $credentials = $request->validate([
//            'email' => ['required', 'email'],
//            'password' => ['required'],
//        ]);
//
//        if (Auth::attempt($credentials)) {
//
//            return Auth::user();
//        }
//
//        return 'error';
//    }

    public function checkToken(Request $request)
    {


        return Auth::user();

    }

}
