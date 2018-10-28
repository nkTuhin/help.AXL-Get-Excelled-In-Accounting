<?php

namespace App\Http\Controllers;

use App\DiscussionHome;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\Model;

class DiscussionHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Post = Post::orderBy('created_at', 'desc')->get();
        return view('discussionhome',compact('Post'));
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
     * @param  \App\DiscussionHome  $discussionHome
     * @return \Illuminate\Http\Response
     */
    public function show(DiscussionHome $discussionHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscussionHome  $discussionHome
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscussionHome $discussionHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscussionHome  $discussionHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscussionHome $discussionHome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscussionHome  $discussionHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscussionHome $discussionHome)
    {
        //
    }
}
