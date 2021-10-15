<?php

namespace Ddkits\Adminpanel\Controller;

use Ddkits\Adminpanel\Models\Ipban;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class IpbanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blockIp(Request $request, $ip)
    {
        if (Auth::user()->id == 1) {
            $check = Ipban::blockIp($ip);
            if ($check) {
                Session::flash('Success', 'IP blocked successfully!');
            }else{
                Session::flash('Error', 'IP didn\'t get blocked please try again later!');
            }
        }
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unBlockIp(Request $request, $ip)
    {
        if (Auth::user()->id == 1) {
            $check = Ipban::unBlockIp($ip);
            if ($check) {
                Session::flash('Success', 'IP unblocked successfully!');
            }else{
                Session::flash('Error', 'IP didn\'t get unblocked please try again later!');
            }
        }
        return redirect()->back();
    }
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ipban  $ipban
     * @return \Illuminate\Http\Response
     */
    public function show(Ipban $ipban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ipban  $ipban
     * @return \Illuminate\Http\Response
     */
    public function edit(Ipban $ipban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ipban  $ipban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ipban $ipban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ipban  $ipban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ipban $ipban)
    {
        //
    }
}
