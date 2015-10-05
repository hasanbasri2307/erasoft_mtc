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

//Login Route
Route::get('/',['uses'=>'LoginController@index','middleware'=>'guest']);
Route::post('app.login','LoginController@login');
Route::get('logout',['uses'=>'LoginController@logout','as'=>'logout']);


Route::group(['middleware'=>'auth'],function(){

   Route::get('dashboard',['uses'=>'DashboardController@index','as'=>'dashboard']);
   //user
   Route::get('user',['uses'=>'UserController@index','as'=>'user']);
   Route::get('user/profile/{id}',['uses'=>'UserController@profile','as'=>'user.profile']);
   Route::get('user/show/{id}',['uses'=>'UserController@show','as'=>'user.show']);
   Route::get('user/create',['uses'=>'UserController@create','as'=>'user.create']);
   Route::get('user/edit/{id}',['uses'=>'UserController@edit','as'=>'user.edit']);
   Route::post('user/store',['uses'=>'UserController@store','as'=>'user.store']);
   Route::post('user/update/{id}',['uses'=>'UserController@update','as'=>'user.update']);

});



Route::get('test','LoginController@test');

Route::get('create_pm',function(){
   $obj = DB::table('user')->insert(array('nama'=>'Project Manager','email'=>'pm@kompas.com','telepon'=>'0856565656',
                  'type'=>'pm','password'=>Hash::make('hasan'),'status' => 'active','alamat'=>'Rawamangun'));

   if($obj) {
      print "success create users";
   }
   else {
      print "something went wrong";
   }
});

Route::get('create_admin',function(){
   $obj = DB::table('user')->insert(array('nama'=>'Adminsitrator','email'=>'admin@kompas.com','telepon'=>'0856565656',
                  'type'=>'administrator','password'=>Hash::make('hasan'),'status' => 'active','alamat'=>'Rawamangun'));

   if($obj) {
      print "success create users";
   }
   else {
      print "something went wrong";
   }
});

Route::get('create_support',function(){
   $obj = DB::table('user')->insert(array('nama'=>'Tech Support','email'=>'support@kompas.com','telepon'=>'0856565656',
                  'type'=>'support','password'=>Hash::make('hasan'),'status' => 'active','alamat'=>'Rawamangun'));

   if($obj) {
      print "success create users";
   }
   else {
      print "something went wrong";
   }
});

Route::get('create_client',function(){
   $obj = DB::table('user')->insert(array('nama'=>'Client','email'=>'client@kompas.com','telepon'=>'0856565656',
                  'type'=>'client','password'=>Hash::make('hasan'),'status' => 'active','alamat'=>'Rawamangun'));

   if($obj) {
      print "success create users";
   }
   else {
      print "something went wrong";
   }
});

