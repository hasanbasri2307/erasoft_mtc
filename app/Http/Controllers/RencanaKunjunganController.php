<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tiket;
use App\RencanaKunjungan;
use Illuminate\Support\Facades\Auth;

class RencanaKunjunganController extends Controller
{
    //

    public function index(){
    	parent::$_data['rk'] = RencanaKunjungan::where("id_support",'=',Auth::user()->id_user)->get();
    	return view("rencana_kunjungan.rencana_kunjungan_list",parent::$_data);
    	
    }

    public function create($id_tiket){
    	parent::$_data['id_tiket'] = $id_tiket;
    	return view("rencana_kunjungan.rencana_kunjungan_add",parent::$_data);
    }
}
