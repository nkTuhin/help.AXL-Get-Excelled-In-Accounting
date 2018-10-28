<?php

namespace App\Http\Controllers;

use App\AddAchievement;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Image;

class AddAchievementController extends Controller
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
        return view('addachievement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $addachievement = new AddAchievement();

        $addachievement->achTitle = $request['achTitle'];
        $addachievement->achIntro = $request['achIntro'];
        $addachievement->achDetails = $request['achDetails'];
        $addachievement->achPoint = $request['achPoint'];
        $addachievement->achNumber = $request['achNumber'];
        $addachievement->achIcon = $request['achIcon'];

        // icon upload 
        
        if ($request->hasFile('achIcon')) {

            $image = $request->file('achIcon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('achicon/' . $filename);

            Image::make($image)->save($location);

            $addachievement->achIcon = $filename;

        }

        $addachievement->save();

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
     * @param  \App\AddAchievement  $addAchievement
     * @return \Illuminate\Http\Response
     */
    public function show(AddAchievement $addAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddAchievement  $addAchievement
     * @return \Illuminate\Http\Response
     */
    public function edit(AddAchievement $addAchievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddAchievement  $addAchievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddAchievement $addAchievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddAchievement  $addAchievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddAchievement $addAchievement)
    {
        //
    }
}
