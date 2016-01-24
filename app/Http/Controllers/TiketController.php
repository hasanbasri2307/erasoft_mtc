<?php

namespace App\Http\Controllers;

use App\Tiket;
use App\Http\Requests\TiketRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->type == "pm"){
            $tiket = Tiket::all();
            $view = "tiket.tiket_list_pm";
        }elseif(Auth::user()->type == "client"){
            $client_id = Auth::user()->client->id_client;
            $tiket = Tiket::where("id_client","=",$client_id)->get();
            $view = "tiket.tiket_list";
        }

        parent::$_data['tiket'] = $tiket;
        return view($view,parent::$_data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("tiket.tiket_add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiketRequest $request)
    {
        //
        $tiket = new Tiket();
        $tiket->masalah = $request->masalah;
        $tiket->status = 'open';
        $tiket->id_client = Auth::user()->client->id_client;
        $tiket->save();

        Session::flash("success","Success add tiket");
        return redirect()->route('tiket');
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
        parent::$_data['tiket'] = Tiket::find($id);
        return view("tiket.tiket_show",parent::$_data);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
