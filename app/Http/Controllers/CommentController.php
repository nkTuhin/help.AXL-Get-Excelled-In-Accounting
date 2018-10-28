<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\UserProfile;
use Session;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CommentController extends Controller
{
    public function createComment(Request $request, $post_id) {

    	$this->validate($request, array(

    		'comment' => 'required|min:5|max:2000' 

    	));

    	$post = Post::find($post_id);

    	$comment = new Comment();

    	$comment->name = $request['name'];
    	$comment->email = $request['email'];
    	$comment->comment = $request['comment'];


    	$comment->post()->associate($post);

    	$comment->save();

    	Session::flash('success', 'Comment was added');

    	return redirect()->back();


    }


}
