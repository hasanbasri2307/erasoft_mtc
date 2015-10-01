<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    private static $_data = array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master_login');
    }

    public function login(LoginFormRequest $req)
    {
        $remember = $req->remember;
        if($remember =='remember')
        {
            $remember= true;
        }
        else {
            $remember = false;
        }


        $params = [
                'email' => $req->email,
                'password' => $req->password
        ];

        if(Auth::attempt($params,$remember))
        {
            if(Auth::user()->type == 'pm')
            {
                return redirect('pm/dashboard');
            }
        }
        else
        {
            Session::flash('error','Username / Password is Wrong');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}
