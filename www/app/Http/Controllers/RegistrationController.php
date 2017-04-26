<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ])

        //create and save new user

        $user = User::create(request(['name', 'email', 'password']));

        //sign in the user

        auth()->login($user);

        //return something

        return auth()->check();
    }
}
