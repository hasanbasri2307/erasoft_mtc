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
    private static $_obj = array();
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
        self::$_obj['userdata'] = [
                'email' => $req->email,
                'password' => $req->password
        ];

        if(Auth::attempt(self::$_obj['userdata']))
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
    
}
