<?php

use Illuminate\Http\Request;
 
function getControllerName(Request $req)
{
	$c_name = $req->route();
	return $c_name;
}