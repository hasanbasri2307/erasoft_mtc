<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bugs extends Model
{
    //
	protected $table = 'bugs';
	protected $primaryKey = 'id_bugs';
	public $timestamps = false;

	public function software_detail(){
		return $this->belongsTo('App\SoftwareDetail','id_modul');
	}
}
