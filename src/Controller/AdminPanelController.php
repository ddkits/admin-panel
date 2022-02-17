<?php

namespace Ddkits\Adminpanel\Controller;

use Ddkits\Adminpanel\Models\AdminPanel;
use Ddkits\Adminpanel\Models\Admins;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $tables = DB::table('rest_tables_conts')->count();
        $requests = DB::table('rest_requests')->count();
        $adminSettings = DB::table('settings')->get();

        return view('adminpanel::admin.index')->with([
            'settings' => $adminSettings,
            'users' => $users,
            'requests' => $requests,
            'tables' => $tables,
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
     * @param  \App\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPanel $adminPanel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminPanel $adminPanel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminPanel $adminPanel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminPanel $adminPanel)
    {
        //
    }

     /**
     * Admin or not resource.
     */
    public function getAdmin($id = false)
    {
        $userId = $id;
        // admin or not
        $admin = 0;
        $user = DB::table('admins')->where('uid', $userId)->first();
        if (!empty($user)) {
            $admin = 1;
        }

        return $admin;
    }

    /**
     * Admin or not resource.
     */
    public function getAdminLevel()
    {
        $userId = Auth::user()->id;
        // admin or not
        $level = 99;
        $user = DB::table('admins')->where('uid', $userId)->first();
        if ($user !== null) {
            $level = $user->level;
        }

        return $level;
    }

    /**
     * Admin or not resource.
     */
    public function adminInfo($id)
    {
        $info = DB::table('admins')->where('uid', $id)->first();

        return $info;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPostCategories()
    {
        $adminSettings = DB::table('settings')->get();
        $adminPostCategories = DB::table('post_Categories');

        return view('adminpanel::admin.index')->with([
            'settings' => $adminSettings,
            'adminPostCategories' => $adminPostCategories,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminComments()
    {
        $adminSettings = DB::table('settings')->get();
        $comments = DB::table('comments');

        return view('adminpanel::admin.index')->with([
            'settings' => $adminSettings,
            'adminComments' => $comments,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPostTags()
    {
        $adminSettings = DB::table('settings')->get();
        $adminPostTags = DB::table('post_tags');

        return view('adminpanel::admin.index')->with([
            'settings' => $adminSettings,
            'adminPostTags' => $adminPostTags,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminUsers()
    {
        $usersTables = [];
        $usersReq = [];
        $adminSettings = DB::table('settings')->get();
        $adminUsers = DB::table('users');
        $adminAdmins = DB::table('admins');

        foreach ($adminUsers->get() as $key) {
            $usersTables[$key->id] = DB::table('rest_tables_conts')
                ->where('uid', $key->id)
                ->get('table');
        }
        foreach ($adminUsers->get() as $key) {
            $usersReq[$key->id] = DB::table('rest_requests')
                ->where('uid', $key->id)
                ->count();
        }

        return view('adminpanel::admin.users')->with([
            'settings' => $adminSettings,
            'adminUsers' => $adminUsers,
            'adminAdmins' => $adminAdmins,
            'usersTables' => $usersTables,
            'usersReq' => $usersReq,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPosts()
    {
        $adminSettings = DB::table('settings')->get();
        $adminUsers = DB::table('users');
        $adminPosts = DB::table('posts');

        return view('adminpanel::admin.posts')->with([
            'settings' => $adminSettings,
            'adminUsers' => $adminUsers,
            'adminPosts' => $adminPosts,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminProPosts()
    {
        $adminSettings = DB::table('settings')->get();
        $adminUsers = DB::table('users');
        $adminProPosts = DB::table('pro_posts');

        return view('adminpanel::admin.proposts')->with([
            'settings' => $adminSettings,
            'adminUsers' => $adminUsers,
            'adminProPosts' => $adminProPosts,
        ]);
    }

    // Storing functions for admins below

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPostCategoriesStore(Request $request)
    {
        $adminSettings = DB::table('settings')->get();
        $adminPostCategories = DB::table('post_Categories');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCommentsStore(Request $request)
    {
        $adminSettings = DB::table('settings')->get();
        $comments = DB::table('comments');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPostTagsStore(Request $request)
    {
        $adminSettings = DB::table('settings')->get();
        $adminPostTags = DB::table('post_tags');

        return redirect()->back();
    }

    // test java page
    public function testJava()
    {
        return view('adminpanel::admin.testJava');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminUsersStore(Request $request)
    {
        if ($request) :
            $list = $request->user;
        foreach ($list as $user) {
            $saveUser = User::find($user['id']);

            // save users
            if ($saveUser) {
                $saveUser->email = $user['email'];
                $saveUser->blocked = $user['blocked'];
                $saveUser->role = $user['role'];
                $saveUser->save();

                // check admins
                if ($user['admin'] == 1) {
                    $admin = DB::table('admins')->where('uid', $user['id'])->first();
                    if (!$admin) {
                        $createAdmin = new Admins();
                        $createAdmin->uid = $user['id'];
                        $createAdmin->level = 1;
                        $createAdmin->save();
                        Session::flash('Success', 'New Admin created.');
                    }
                } else {
                    $admin = DB::table('admins')->where('uid', $user['id'])->first();

                    if ($admin) {
                        $deleteAdmin = DB::table('admins')->where([
                                'uid' => $user['id'],
                            ])->delete();
                    }
                }

                // end if User exist
            }
        }
        Session::flash('Success', 'Settings Saved Successfully!');
        endif;

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPostsStore(Request $request)
    {
        $posts = $request->homepage;
        foreach ($posts as $key => $value) {
            $post = Post::find($key);
            $post->homepage = $value;
            $post->save();
        }
        Session::flash('Success', 'Saved Successfully!');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminProPostsStore(Request $request)
    {
        $adminSettings = DB::table('settings')->get();
        $adminUsers = DB::table('users');
        $adminProPosts = DB::table('pro_posts');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getValue($field)
    {
        $adminSettings = DB::table('settings')->where('field_name', $field)->first();
        if ($adminSettings) {
            return  $adminSettings->value;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCaptcha()
    {
        $random = str_random(5);

        return  $random;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAppsName($id)
    {
        return  User::find($id)->firstname;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    protected function storeSettings(Request $request)
    {
        // sitename
        $table = 'settings';
        $col = DB::table($table)->get();
        $uid = Auth::user()->id;
        foreach ($col as $key) {
            $name = $key->field_name;
            if ($request->$name) {
                $field = $request->$name;
                DB::table($table)->where('field_name', $key->field_name)->update([
                    'value' => $field,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'uid' => $uid,
                ]);
            }
        }

        Session::flash('Success', 'Settings Saved Successfully!');

        return redirect()->back();
    }

     /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    protected function createSettings(Request $request)
    {
        $this->validate($request, [
            'field_name' => 'string|max:255',
        ]);

        $check = DB::table('settings')->where('field_name', 'like', $request->field_name)->first();
        if ($check) {
            Session::flash('Success', 'This field already exist.');

            return redirect()->back();
        }
        DB::table('settings')->insert([
            'field_name' => $request->field_name,
            'value' => $request->value,
            'type' => $request->type,
            'updated_at' => date('Y-m-d H:i:s'),
            'uid' => $request->uid,
        ]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function pathUpdate()
    {
        $posts = DB::table('posts')->where('path', null)->get();
        foreach ($posts as $key) {
            $slug = $this->create_slug($key->title);
            DB::table('posts')->where('title', $key->title)
                ->update([
                    'path' => $slug,
                ]);
        }

        Session::flash('Success', 'All paths updated.');

        return redirect()->back();
    }
}
