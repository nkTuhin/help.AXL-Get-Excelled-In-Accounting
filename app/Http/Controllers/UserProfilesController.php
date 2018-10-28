<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\PostAchievement;
use App\AddPostAchievement;
use App\AddCommentAchievement;
use App\CommentAchievement;
use Illuminate\Database\Eloquent\Model;

class UserProfilesController extends Controller
{
    public function __construct()
    {   

        $this->middleware('auth:web');
    }

    public function index()
    {
        $Profile = Profile::all();
        $authUserId=Auth::user()->id;
        $authUserEmail=Auth::user()->email;

        $ProfileCount = Profile::select('id')->where('user_id',$authUserId)->count();

        $countPost=Post::select('id')->where('user_id',$authUserId)->count();

        $countComment=Comment::select('id')->where('email',$authUserEmail)->count();

        $AddPostAchievement=AddPostAchievement::all();
        $AddCommentAchievement=AddCommentAchievement::all();
        return view('userprofile',compact('countPost','countComment','AddPostAchievement','AddCommentAchievement','Profile','ProfileCount'));
    }
}
