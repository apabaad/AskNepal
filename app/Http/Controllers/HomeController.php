<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Reply;
use Illuminate\Database\Eloquent\ModelNotFoundEception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user= User::all();
        // $reply=Reply::all();
        // $posts= Post::orderBy('created_at','desc')->get();
        // $posts= Post::orderBy('created_at','desc')->paginate(4);
        // return view('home',compact('posts','user','reply'));

        $search=\Request::get('search');
        $posts=Post::where('title', 'like', '%'.$search.'%')
                    ->orWhere('question', 'like', '%'.$search.'%')
                    ->orderBy('created_at','desc')->paginate(4);
        return view('home',compact('posts'));
    }

     public function check(){
        if (Auth::guest()){     
            $search=\Request::get('search');
            $posts=Post::where('title', 'like', '%'.$search.'%')
                    ->orWhere('question', 'like', '%'.$search.'%')
                    ->orderBy('created_at','desc')->paginate(4);
            return view('welcome',compact('posts'));
            }
            else{
                   return $this->index();      
            }  
        }

        public function discussion($slug){
           try{
                $post=Post::where('slug', '=', $slug)->first();
                return view ('pages.discussion', compact('post'));
           }
           catch(ModelNotFoundException $ex){
                return redirect('/');

           }
        }

        public function guestforum($slug){
            try{
                $post=Post::where('slug', '=', $slug)->first();
                return view ('pages.guestforum', compact('post'));
           }
           catch(ModelNotFoundException $ex){
                return redirect('/');

           }
        }
}
