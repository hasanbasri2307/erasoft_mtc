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

Route::get('/', function () {
    return view('welcome');
});

Route::get('create_user',function(){
   $obj = DB::table('users')->insert(array('nama'=>'Hasan Basri','email'=>'hasan.basri@kompas.com','telp'=>'0856565656',
                  'bagian'=>'pm','password'=>Hash::make('hasan'),'status_active' => '1'));

   if($obj) {
      print "success create users";
   }
   else {
      print "something went wrong";
   }
});

Route::get('user/logins','WelcomeController@show_login');
Route::post('user/logins',['as'=>'user.logins','uses'=>'WelcomeController@login']);

Route::group(['prefix' => 'admin'],function(){
   Route::get('test','WelcomeController@test');
});
