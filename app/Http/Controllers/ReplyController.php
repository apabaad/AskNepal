<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reply;
use App\Post;
use App\Notifications\RepliedNotification;

class ReplyController extends Controller
{

    public function savereply(Request $data) {
    	
        // $post=Post::where('slug','=', $data['postid'])->first(); Retrieve the first model matching the query constraints...

        $post=Post::find($data->postid);   //use 'find' to find by pk. 
    	$reply=new Reply;
    	$reply->user_id=Auth::user()->id;
		$reply->body=$data->reply;
    	$reply->post_id=$post->id;
		
    	if ($reply->save()){
            if(Auth::user()->id!==$post->user_id){
    	   $post->user->notify(new RepliedNotification($post));
        	return back();
        }
        else{
            return back();
        }
    	}

    }

     public function edit(Request $data){
        $post=Post::find($data->postid);
        $reply=Reply::find($data->replyid);
        return view('pages.editreply',compact('post','reply'));
        
         }

    public function updatereply(Request $data){
         $post=Post::find($data->postid);   //use 'find' to find by pk. 
         $reply=Reply::find($data->replyid);
        $reply->user_id=Auth::user()->id;
        $reply->body=$data->reply;
        $reply->post_id=$post->id;
        
        if ($reply->save()){
            return view('pages.discussion',compact('post'));
        }

        
    }

    public function deletereply($id){
        $reply=Reply::find($id);
        if($reply->delete()){
            return redirect()->back();
        }


    }
}