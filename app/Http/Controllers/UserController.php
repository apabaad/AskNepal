<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use App\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserProfile($id){
    	$user=User::find($id);
        $posts=Post::where('user_id','$id')->get();
        return view ('profile.userprofile',compact('user','posts'));
    }
  
    public function DeleteUser($id){
    	$user= User::find($id);
    	if($user->delete()){
    		return redirect('/');
    	}
    }

    public function UpdateAvatar(Request $avatar){
    	if($avatar->hasFile('avatar')){
    		$avatar=$avatar->file('avatar');
    		$filename=time() .  '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'. $filename));
    		
    		$user=Auth::user();
    		$user->avatar=$filename;
    		$user->save();

    		
    	}

    	return redirect()->back();

    }
}
