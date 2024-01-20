<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function index() {
        return view('welcome');
    }

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

    public function logout() {
        \Auth::logout();
        return redirect()->route('site.index');
    }
}
