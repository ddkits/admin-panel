<?php

namespace Ddkits\Adminpanel\Controller;


use Ddkits\Adminpanel\Models\Roles;
use Ddkits\Adminpanel\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $adminSettings = DB::table('settings')->get();
            return view('adminpanel::admin.settings.index')->with([
                'settings' => $adminSettings,
            ]);
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
        $settingsConfig = new Settings();
        $settingsConfig->field_name = $request->field_name;
        $settingsConfig->value = $request->value;
        $settingsConfig->uid = $request->uid;
        $settingsConfig->save();

        // add views record for this post
        DB::table('pro_views')->insert(
            ['nid' => $settingsConfig->id, 'views' => 0]
        );
        Session::flash('Success', 'Post Shared');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getConfig = Settings::find($id);
        return $getConfig;
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
        $settingsConfig = Settings::find($id);
        $settingsConfig->uid = $request->uid;
        $settingsConfig->body = $request->body;
        $settingsConfig->public = $request->public;
        $settingsConfig->save();

        Session::flash('Success', 'Post Shared');
        return redirect()->back();
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
