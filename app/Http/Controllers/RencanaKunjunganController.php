<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tiket;
use App\RencanaKunjungan;
use App\RencanaKunjunganDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RencanaKunjunganRequest;

use Session;

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

    public function store(RencanaKunjunganRequest $req){
        $rk = new RencanaKunjungan();
        $rk->tgl_kunjungan = $req->tgl_kunjungan;
        $rk->jam_berangkat = $req->jam_berangkat;
        $rk->jam_pulang = $req->jam_pulang;
        $rk->aktifitas = $req->aktifitas;
        $rk->tipe = $req->tipe_kunjungan;
        $rk->id_support = Auth::user()->id_user;
        $rk->id_tiket = $req->id_tiket;
        $rk->save();

        foreach($req->bugs as $item){
            $rkd = new RencanaKunjunganDetail();
            $rkd->id_bugs = $item;
            $rkd->id_rk = $rk->id_rk;
            $rkd->save();
        }

        $tiket = Tiket::find($req->id_tiket);
        $tiket->status = "process";
        $tiket->save();

        Session::flash("success","Success add Rencana Kunjungan");
        return redirect()->route('rencana.kunjungan');

    }

    public function edit($id){
        parent::$_data['rk'] = RencanaKunjungan::find($id);
        parent::$_data['rk_detail'] = RencanaKunjunganDetail::where("id_rk","=",$id)->get();
        return view("rencana_kunjungan.rencana_kunjungan_edit",parent::$_data);
    }

    public function update(RencanaKunjunganRequest $req,$id){
        $rk = RencanaKunjungan::find($id);
        $rk->tgl_kunjungan = $req->tgl_kunjungan;
        $rk->jam_berangkat = $req->jam_berangkat;
        $rk->jam_pulang = $req->jam_pulang;
        $rk->aktifitas = $req->aktifitas;
        $rk->tipe = $req->tipe_kunjungan;
        $rk->save();

        $delete = RencanaKunjunganDetail::where("id_rk","=",$id);
        $delete->delete();

        foreach($req->bugs as $item){
            $rkd = new RencanaKunjunganDetail();
            $rkd->id_bugs = $item;
            $rkd->id_rk = $rk->id_rk;
            $rkd->save();
        }

        Session::flash("success","Success Edit Rencana Kunjungan");
        return redirect()->route('rencana.kunjungan');
    }

    public function show($id){
        parent::$_data['rk'] = RencanaKunjungan::find($id);
        parent::$_data['rk_detail'] = RencanaKunjunganDetail::where("id_rk","=",$id)->get();
        return view("rencana_kunjungan.rencana_kunjungan_detail",parent::$_data);
    }
}