<?php

namespace Ddkits\Adminpanel\Controller;


use Ddkits\Adminpanel\Models\Msgs;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class MsgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Msgs  $msgs
     * @return \Illuminate\Http\Response
     */
    public function show(Msgs $msgs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Msgs  $msgs
     * @return \Illuminate\Http\Response
     */
    public function edit(Msgs $msgs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Msgs  $msgs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Msgs $msgs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Msgs  $msgs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Msgs $msgs)
    {
        //
    }
}
