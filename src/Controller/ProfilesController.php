<?php

namespace Ddkits\Adminpanel\Controller;


use Ddkits\Adminpanel\Models\Profiles;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminsCont;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        $profileInfo = DB::table('profiles')->where('uid', $user->id)->first();
        if ($profileInfo) {
        } else {
            // create the user profile
            $prof = new Profiles;
            $prof->uid = $user->id;
            $prof->picture = 'img/profileM.png';
            $prof->save();
        }
        return view('adminpanel::profile.show')->with([
            'user' => $user,
            'profile' => $profileInfo,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $profile = Profiles::find($id = 0);
        if (!empty($profile->uid)) {
            $user = User::find($profile->uid);
            return view('adminpanel::profile.show')->with([
                'profile'=>$profile,
                'user'=>$user,
            ]);
        } else {
            return redirect('/ddk/profile');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profiles::find($id);
        return view('adminpanel::profile.edit')->withProfile($profile);
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
        // validate the data
        $this->validate($request, array(
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'phone' => 'string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ));

        // save user profile
        ProfilesController::updateUserProfile($request, $id);
        // save user info
        ProfilesController::updateUserInfo($request, $request->uid);


        return redirect()->route('profile.show', $request->uid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProfInfo($id)
    {
        $profileInfo = Profiles::where('uid', $id)->first();
        return $profileInfo;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUserInfo($id)
    {
        $userInfo = User::find($id);
        return $userInfo;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFriendsPosts($id)
    {
        $userInfo = User::find($id);
        return $userInfo;
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFriends($id)
    {
        $userInfo = User::find($id);
        return $userInfo;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function updateUserInfo($request, $id)
    {
                // $us = User::find($id)->first();
                // if (bcrypt($request->password) == $us->password) {
                $col = DB::getSchemaBuilder()->getColumnListing('users');
                    $data = [];
        foreach ($col as $key => $value) {
            if ($value !== 'id' and $value !== 'password' and $value !== 'new_password' and $value !== 'created_at' and $value !== 'updated_at' and $value !== 'tableIs') {
                if ($request->$value !== null) {
                    $data[$value] = $request->$value;
                }
            } elseif ($value == 'password' and $request->new_password !== null) {
                if (Hash::needsRehash($request->$value)) {
                      $hashed = Hash::make($request->$value);
                }
                           $data[$value] = $hashed;
            }
        }

                 $data['updated_at'] = date('Y-m-d H:i:s');

                 $user = DB::table('users')->where('id', $id)->update($data);
                 Session::flash('Success', 'Profile Saved successfully! ');

                 // } else{
                 //    Session::flash('Error', 'Password needed.<br>' . $us->password . ' test is = <br>'.  bcrypt($request->password) );
                 // }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function updateUserProfile($request, $id)
    {
        $profile = Profiles::find($id);
        $profile->uid = $request->uid;
        if (!empty($request->file('image'))) {
              $file = $request->file('image');
              //Move Uploaded File
              $destinationPath = 'uploads/profile/' . $id;
              $file->move($destinationPath, $id . '-' . $file->getClientOriginalName());
              $saveFile = $destinationPath . '/' . $id . '-' . $file->getClientOriginalName();
              $profile->picture = $saveFile;
        }
        $profile->description = $request->input('description');
        $profile->save();
    }
}
