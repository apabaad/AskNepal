<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Post;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    public function create(){
    	$categories=Category::all();
    	// return view('pages.ask', array('records' => $categories));
		return view('pages.ask', compact('categories'));
    }

    public function store(CreatePostRequest $data){
    	$posts=new Post;
        $posts['user_id']=Auth::user()->id;
        $posts->category_id= $data->topic;
        $posts->title=$data->title;
        // $posts->slug=str_slug("$data->title");
        $posts->question=$data->question;
        if ($posts->save()) {
         notify()->flash ('<h3>Post saved successfully</h3>','success',['timer'=>1000]);
        }
        return redirect('home');
    }

    public function edit($id){
        $post=Post::find($id);
        $categories=Category::all();
        // $categories= Category::with('post', 'categories')->where('id', $id)->get();
        // print_r($post->categories['Cname']);
        // die();
        return view('pages.editpost',compact('post','categories'));
    }

    public function update(CreatePostRequest $data){
     $post=Post::find($data->id);
        $post['user_id']=Auth::user()->id;
        $post->category_id= $data->topic;
        $post->title=$data->title;
        $post->question=$data->question;
        notify()->flash ('<h3>Post saved edited</h3>','success',['timer'=>1000]);
        $post->save();
        // return view('pages.discussion',compact('post'));
        return redirect('home');
    }

    public function delete($id){
        $post=Post::find($id);
         if($post->delete()){
         notify()->flash ('<h3>Post deleted successfully</h3>','success',['timer'=>1000]);
            return redirect()->back();
        }
    }

    public function deleteDiscussionPost($id){
        $post=Post::find($id);
         if($post->delete()){
            notify()->flash ('<h3>Post deleted successfully</h3>','success',['timer'=>1000]);
            return redirect('home');
        }
    }
}