<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
        * Returns Landing/Login page
        *
        * @return View
    */ 
    public function index() {
        return view('welcome');
    }

    /**
        * Login cumregistration functionality
        *
        * @param LoginRequest $request  User Email
        * 
        * @throws Throwable $err If something went wrong
        * @return Redirect
    */ 
    public function login(LoginRequest $request) {
        try {
            $data = $request->validated();
            $user = User::firstOrCreate(
                [
                    'email' => $data['email']
                ], $data
            );

            if(\Auth::loginUsingId($user->id)){
                return redirect()->route('mailLog.create');
            }else{
                return redirect()->back()->withErrors(['email' => $err->getMessage()]);
            }
        } catch (\Throwable $err) {
            return redirect()->back()->withErrors(['email' => $err->getMessage()]);
        }
        
    }

    /**
        * Logout functionality
        * 
        * @return Redirect
    */ 
    public function logout() {
        \Auth::logout();
        return redirect()->route('site.index');
    }
}
