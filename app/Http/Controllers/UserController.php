<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use App\Post;
use App\Reply;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function UserProfile($id){
    	$user=User::find($id);
        $post=Post::where('user_id', $id )->get();
        $reply=Reply::where('user_id', $id)->get();
        $username=$user->name;
        $firstname=explode(" ", $username );
        $firstname= $firstname[0];
        return view ('profile.userprofile',compact('user','post', 'reply','firstname'));
    }
  
    public function DeleteUser($id){
    	$user= User::find($id);
    	if($user->delete()){
    		return redirect('/');
    	}
    }

    public function UpdateAvatar(Request $avatar){
    //          $this->validate($avatar, [
    //     'avatar' => 'required|max:11000000',
    // ]);
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
