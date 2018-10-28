<?php

namespace App\Http\Controllers;

use App\AddCommentAchievement;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Image;

class AddCommentAchievementController extends Controller
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
        return view('addcommentachievement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $addcommentachievement = new AddCommentAchievement();

        $addcommentachievement->title = $request['title'];
        $addcommentachievement->detail = $request['detail'];
        $addcommentachievement->comment_reqr = $request['comment_reqr'];
        $addcommentachievement->achIcon = $request['achIcon'];


                // icon upload 
        
        if ($request->hasFile('achIcon')) {

            $image = $request->file('achIcon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('achicon/' . $filename);

            Image::make($image)->save($location);

            $addcommentachievement->achIcon = $filename;

        }

        $addcommentachievement->save();

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
     * @param  \App\AddCommentAchievement  $addCommentAchievement
     * @return \Illuminate\Http\Response
     */
    public function show(AddCommentAchievement $addCommentAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddCommentAchievement  $addCommentAchievement
     * @return \Illuminate\Http\Response
     */
    public function edit(AddCommentAchievement $addCommentAchievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddCommentAchievement  $addCommentAchievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddCommentAchievement $addCommentAchievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddCommentAchievement  $addCommentAchievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddCommentAchievement $addCommentAchievement)
    {
        //
    }
}
