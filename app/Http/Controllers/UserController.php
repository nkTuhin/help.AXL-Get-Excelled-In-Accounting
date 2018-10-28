<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Image;
use App\Profile;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use App\Comment;
use App\PostAchievement;
use App\CommentAchievement;


class UserController extends Controller
{
    public function profile() {

    	return view('profile', array('user' => Auth::user()));
    }

    public function updateAvatar(Request $request) {

    	// profile avatar upload 
    	
    	if ($request->hasFile('avatar')) {
    			
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatar/' . $filename));

    		$user = Auth::user();

    		$user->avatar = $filename;
    		$user->save();	
            $Save=$user->save();


            if ($Save) {
            $notification = array(
            'message' => 'Profile picture updated.', 
            'alert-type' => 'success'
        );
            return redirect()->route('profile')->with($notification);
        }   

        else{
           return redirect()->route('home')->with(['error'=>'Unable to Save.']); 
        }

    	}

    	return view('profile', array('user' => Auth::user()));
    }

    // public function editUserInfo($id) {

    //     $profile = Profile::find($id);

    //     return view('profile', compact('profile'));


    // }

    public function addProfileInfo(Request $request) {

        $validator = Validator::make($request->all(), [
           
            'name' => 'required' ,
            'users_bio' => 'required' ,
            'nickName' => 'required',
            'sex' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['error'=>'All file are required!.']);
        }

        $profile = new Profile();
        $profile->name = $request['name'];
        $profile->users_bio = $request['users_bio'];
        $profile->nickName = $request['nickName'];
        $profile->sex = $request['sex'];
        $profile->city = $request['city'];
        $profile->phone = $request['phone'];
        $profile->email = $request['email'];
        $profile->user_id=Auth::user()->id;
        $Save=$profile->save();

        if ($Save) {
            $notification = array(
            'message' => 'Profile Info Added successfully!', 
            'alert-type' => 'success'
        );
            return redirect()->route('userprofile')->with($notification);

            }

        else{
            return redirect()->route('userprofile')->with(['error'=>'Fail to Save.']);
            }
    }

    public function getUpdateView($id) {
        $profile = Profile::find($id);
        return view('updateprofileinfo',compact('profile'));
    }

    public function updateProfileInfo(Request $request) {

         $validator = Validator::make($request->all(), [
           
            'name' => 'required' ,
            'id' => 'required' ,
            'users_bio' => 'required' ,
            'nickName' => 'required',
            'sex' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['error'=>'All file are required!.']);
        }
        $User_id = $request['id'];
        $profile = Profile::find($User_id);

        $profile->name = $request['name'];
        $profile->users_bio = $request['users_bio'];
        $profile->nickName = $request['nickName'];
        $profile->sex = $request['sex'];
        $profile->city = $request['city'];
        $profile->phone = $request['phone'];
        $profile->email = $request['email'];
        $profile->user_id=Auth::user()->id;
        $update=$profile->update();

        if ($update) {
            $notification = array(
            'message' => 'Profile Info updated successfully!', 
            'alert-type' => 'success'
        );
            return redirect()->route('userprofile')->with($notification);
        
            }
            
        else{
            return redirect()->route('userprofile')->with(['error'=>'Fail to Update.']);
            }
    }
    
    
    


}
