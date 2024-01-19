<?php

namespace App\Http\Controllers\Auth;

use Support\SessionRegenerator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInFormRequest;


class SignInController extends Controller
{
    public function page(){

        return view('auth.login');
    }


    public function handle(SignInFormRequest $request){
       
        if(! auth()->attempt($request->validated())){
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        //SessionRegenerator::run();

        return redirect()->route('admin.dashboard');
    }

    public function logOut(){
         
        SessionRegenerator::run(fn()=>auth()->logout());
     
        return redirect()->route('home');
    }

}
 