<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerMaintenance extends Model
{
    //
    protected $table = "server_maintenance";
    protected $primaryKey = "id_sm";

    public function detail_sm(){
    	return $this->hasMany('App\SmDetail','id_sm');
    }
}
