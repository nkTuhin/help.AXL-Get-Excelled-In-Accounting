<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Post;
use App\Comment;
use App\User;
use App\Tag;
use Purifier;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{
    public function index() {

        $tags = Tag::all();

    	return view('createpost')->withTags($tags);
    }

    public function createPost(Request $request) {


        $validator = Validator::make($request->all(), [
           
            'postTitle' => 'required' ,
            'postTag' => 'required' ,
            'postBody' => 'required',
            'postImage' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['error'=>'All file are required!.']);
        }

    	$post = new Post();

    	$post->postTitle = $request['postTitle'];
    	$post->postTag = $request['postTag'];
    	$post->postBody = $request['postBody'];
    	$post->postImage = $request['postImage'];


    	// image upload 
    	
    	if ($request->hasFile('postImage')) {
    		
    		$image = $request->file('postImage');
    		$filename = time() . '.' . $image->getClientOriginalExtension();
    		$location = public_path('postimage/' . $filename);

    		Image::make($image)->save($location);

    		$post->postImage = $filename;
            $post->user_id=Auth::user()->id;
            $Save=$post->save();



            if($Save){
                $notification = array(
                'message' => 'Post Successfully created!', 
                'alert-type' => 'success'
        );
                return redirect()->route('discusshome')->with($notification);

                
            }
            else{
                return redirect()->route('discusshome')->with(['error'=>'Fail to Save.']);
            }

    	}

    	// $request->user()->post()->save($post);

    	 // else{
      //         return redirect()->route('discusshome')->with(['error'=>'No image.']);
      //    }

    }

    public function editPost($id) {

        $post = Post::find($id);

        return view('edit', compact('post','tags'))->withPost($post);


    }

    public function showPost($id) {

        $post = Post::find($id);
        $user=User::orderBy('created_at', 'asc')->get();
        return view('singlepostshow',compact('post','user'));

    }

    public function updatePost(Request $request, $id ) {
        // $this->validate($request, [

        //     'postTitle' => 'required' ,
        //     'postTags' => 'required' ,
        //     'postBody' => 'required' ,
        //     'postImage' => 'required'

        // ]);

        $post = Post::find($id);

        $post->postTitle = $request['postTitle'];
        $post->postTag = $request['postTag'];
        $post->postBody = $request['postBody'];
        $post->postImage = Purifier::clean($request['postImage']);

        // image upload 
        
        if ($request->hasFile('postImage')) {
            
            $image = $request->file('postImage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('postimage/' . $filename);

            Image::make($image)->save($location);

            $post->postImage = $filename;
            $Save=$post->save();

             if($Save){
                $notification = array(
                'message' => 'Post Successfully Updated!', 
                'alert-type' => 'success'
        );
                return redirect()->route('post.show', $post->id)->with($notification);

            }

            else{

                return redirect()->route('discusshome')->with(['error'=>'Fail to Save.']);
            }

        }
        

        // $post->update();

        return redirect()->route('post.show', $post->id);


    }

    public function deletePost($id) {

        $post = Post::find($id);

        $post->delete();

        return redirect()->route('home');


    }

    // public function deleteComment($id) {

    //     $comment = Comment::find($id);

    //     $comment->delete();

    //     return redirect()->route('post.show');

    // }
}
