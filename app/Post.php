<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{	
	use Sluggable;
	protected $table = 'posts';
	public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function replies(){
		return $this->hasMany('App\Reply');
	}
	
	public function user(){
		return $this->belongsTo('App\User');
	}

	public function category(){
		return $this->belongsTo('App\Category');
	}
	
	   
}
