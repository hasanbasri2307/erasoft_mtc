<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','LoginController@index');
Route::post('app.login','LoginController@login');

Route::group(['prefix'=>'pm','middleware'=>'auth'],function(){
   Route::get('dashboard',function(){
         return "<a href='".url('logout')."'>Logout</a>";
   });

   
});


Route::get('logout','LoginController@logout');
Route::get('test','LoginController@test');

Route::get('create_user',function(){
   $obj = DB::table('user')->insert(array('nama'=>'Hasan Basri','email'=>'hasan.basri@kompas.com','telepon'=>'0856565656',
                  'type'=>'pm','password'=>Hash::make('hasan'),'status' => 'active','alamat'=>'Rawamangun'));

   if($obj) {
      print "success create users";
   }
   else {
      print "something went wrong";
   }
});

