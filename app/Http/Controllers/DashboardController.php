<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class DashboardController extends Controller
{
    private $auth;
    private static $_data = array();

    public function __construct(Guard $auth)
    {
       $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        if($this->auth->user()->type =="administrator")
        {
            return view('dashboard.admin_dashboard');
        }
        elseif($this->auth->user()->type =="support")
        {
            return view('dashboard.support_dashboard');
        }
        elseif($this->auth->user()->type =="pm")
        {
            return view('dashboard.pm_dashboard');
        }
        elseif($this->auth->user()->type =="client")
        {
            return view('dashboard.client_dashboard');
        }

    }

}
