<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function get (){

        return User::get();

    }

    public function search (Request $request){


        $users = User::where('firstname', 'like', "%".$request->search."%")->orWhere('lastname', 'like',  "%".$request->search."%")->get();

        return $users;

    }

    public function edit (EditUserRequest $request){

        User::where('id', $request->id)
            ->update([
                'firstname' => $request->firstname,
                'lastname'=> $request->lastname,
                'email'=> $request->email,
            ]);

        return 'success';

    }


    public function delete ($id){

        User::where('id', $id)
            ->delete();

        return 'success';

    }





}
