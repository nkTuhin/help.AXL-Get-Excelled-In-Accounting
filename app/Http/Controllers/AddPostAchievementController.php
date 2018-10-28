<?php

namespace App\Http\Controllers;

use App\AddPostAchievement;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Image;

class AddPostAchievementController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addpostachievement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $addpostachievement = new AddPostAchievement();

        $addpostachievement->title = $request['title'];
        $addpostachievement->detail = $request['detail'];
        $addpostachievement->post_reqr = $request['post_reqr'];
        $addpostachievement->achIcon = $request['achIcon'];

                        // icon upload 
        
        if ($request->hasFile('achIcon')) {

            $image = $request->file('achIcon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('achicon/' . $filename);

            Image::make($image)->save($location);

            $addpostachievement->achIcon = $filename;

        }

        $addpostachievement->save();

        return redirect()->back();
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
     * @param  \App\AddPostAchievement  $addPostAchievement
     * @return \Illuminate\Http\Response
     */
    public function show(AddPostAchievement $addPostAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddPostAchievement  $addPostAchievement
     * @return \Illuminate\Http\Response
     */
    public function edit(AddPostAchievement $addPostAchievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddPostAchievement  $addPostAchievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddPostAchievement $addPostAchievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddPostAchievement  $addPostAchievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddPostAchievement $addPostAchievement)
    {
        //
    }
}
