<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use Hash;
use Session;
use Validator;
use Illuminate\Routing\Route;
use Illuminate\Contracts\Auth\Guard;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        parent::$_data['user'] = User::all();
        return view("master.user.user_list",parent::$_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("master.user.user_add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        try {
            $user = new User();
            $user->nama = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->telepon = $request->phone;
            $user->alamat = $request->address;
            $user->type = $request->type;
            $user->status = "active";
            $user->save();

            Session::flash("success","Success Insert User");
            return redirect()->route('user');
        } catch (Exception $e) {
            print $e->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        parent::$_data['user'] = User::find($id);
        return view("master.user.user_profile",parent::$_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        parent::$_data['user'] = User::find($id);
        return view('master.user.user_edit',parent::$_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        try {
            $user = User::find($id);
            $user->nama = $request->name;
            $user->telepon = $request->phone;
            $user->alamat = $request->address;
            $user->save();

            Session::flash("success","Success Update User");
            return redirect()->route('user');            
            
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $user = User::find($id);
            $user->delete();

            Session::flash("success","Success Delete User");

        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function profile(Guard $auth)
    {
        $user = $auth->user();
        parent::$_data['user'] = $user;
        return view('_partials.profile',parent::$_data);
    }

    public function getuser(Guard $auth)
    {
         $user = $auth->user();
         return response()->json($user);
    }

    public function update_profile(Guard $auth,Request $req)
    {
        $results = [];

        
            if(empty($req->password))
            {
                $data = [
                    'name' => $req->name,
                    'address' => $req->address,
                    'phone' => $req->phone,
                ];

                $rules = [
                    'name'=>'required',
                    'address' =>'required',
                    'phone' =>'required|max:15'

                ];

                $validator = Validator::make($data,$rules);
                if($validator->fails())
                {
                    $results['error'] =  $validator->errors();
                    $results['status'] = false;

                    return response()->json($results);
                }
            }

    }

}
