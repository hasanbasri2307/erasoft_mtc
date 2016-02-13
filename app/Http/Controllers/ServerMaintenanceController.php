<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ServerMaintenance;
use App\SmDetail;
use App\Http\Requests\ServerMaintenanceRequest;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\ActionMain;
use App\ActionMainDetail;

class ServerMaintenanceController extends Controller
{
    //
	public function index(){
		parent::$_data['sm'] = ServerMaintenance::all();

		return view("server_maintenance.sm_list",parent::$_data);
	}

	public function create(){
		parent::$_data['client'] = $this->_client();
		parent::$_data['tahun'] = $this->_tahun();
		parent::$_data['bulan'] = $this->_bulan();
	
		return view("server_maintenance.sm_add",parent::$_data);
	}

	public function store(ServerMaintenanceRequest $req){

		$sm = new ServiceMaintenance();
		$sm->periode = $req->periode;
		$sm->tahun = $req->tahun;
		$sm->tgl_check = $req->tgl_check;
		$sm->id_support = Auth::user()->id_user;
		$sm->id_client = $req->client;
		$sm->save();

		foreach($req->sm_detail as $key => $item){
			$sm_d = new SmDetail();
			$sm_d->id_sm = $sm->id_sm;
			$sm_d->id_action = $item;
			$sm_d->keterangan = $req->keterangan[$key];
			$sm_d->save();
		}

		Session::flash("success","Success Add Server Maintenance");
		return redirect()->route('server.maintenance');
	}

	public function edit($id){
		parent::$_data['sm'] = ServerMaintenance::find($id);
		parent::$_data['sm_detail'] = SmDetail::where("id_sm","=",$id)->get();

		return view("server_maintenance.sm_edit",parent::$_data);
	}

	public function update($id){
		$sm = ServiceMaintenance::find($id);
		$sm->periode = $req->periode;
		$sm->tahun = $req->tahun;
		$sm->tgl_check = $req->tgl_check;
		$sm->id_client = $req->client;
		$sm->save();

		$delete = SmDetail::where("id_sm",'=',$id)->delete();

		foreach($req->sm_detail as $key => $item){
			$sm_d = new SmDetail();
			$sm_d->id_sm = $id;
			$sm_d->id_action = $item;
			$sm_d->keterangan = $req->keterangan[$key];
			$sm_d->save();
		}

		Session::flash("success","Success Edit Server Maintenance");
		return redirect()->route('server.maintenance');
	}

	public function destroy($id){

	}

	public function show($id){
		parent::$_data['sm'] = ServerMaintenance::find($id);
		parent::$_data['sm_d'] = SmDetail::where("id_sm",'=',$id)->get();

		return view("server_maintenance.sm_detail",parent::$_data);
	}

	private function _tahun (){
		$tahun=[];
		for($i=2016; $i<2020; $i++){
			$tahun[$i]=$i;
		}

		return $tahun;
	}

	private function _bulan(){
		$bulan = [];
		$bulan[1] = "Januari";
		$bulan[2] = "Februari";
		$bulan[3] = "Maret";
		$bulan[4] = "April";
		$bulan[5] = "Mei";
		$bulan[6] = "Juni";
		$bulan[7] = "Juli";
		$bulan[8] = "Agustus";
		$bulan[9] = "September";
		$bulan[10] = "Oktober";
		$bulan[11] = "November";
		$bulan[12] = "Desember";

		return $bulan;
	}

	private function _client(){
		$client = Client::all();
		$res = [];
		foreach ($client as $key => $value) {
			# code...
			$res[$value['id_client']] = $value['nama_pt'];
		}

		return $res;
	}

	private function _service(){
		$service = ActionMain::all();
		$res = [];
		
	}
}
