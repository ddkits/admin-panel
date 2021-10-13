<?php

namespace Ddkits\Adminpanel\Controller;


use Ddkits\Adminpanel\Models\Sitemaps;
use Illuminate\Http\Request;
use App\Models\User;
use Ddkits\Adminpanel\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminsCont;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SitemapsController extends Controller
{

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
     * @param  \App\Sitemaps  $sitemaps
     * @return \Illuminate\Http\Response
     */
    public function show(Sitemaps $sitemaps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sitemaps  $sitemaps
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitemaps $sitemaps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sitemaps  $sitemaps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sitemaps $sitemaps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sitemaps  $sitemaps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sitemaps $sitemaps)
    {
        //
    }
    public function index()
    {
        $post = Post::where('title','!=', null)->orderBy('id', 'DESC');
        return response()->view('adminpanel::sitemaps.index', [
            'post' => $post,
        ])->header('Content-Type', 'text/xml');
    }

    public function posts()
    {
        $posts = Post::all();
        return response()->view('adminpanel::sitemaps.post', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

}
