<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
	protected $table = 'client';
	public $timestamp = true;
	protected $primaryKey = "id_client";

	public function support(){
		return $this->belongsToMany('App\User','client_support','id_client','id_support');
	}
}
