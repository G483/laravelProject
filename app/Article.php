<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
    
    'title',
    
    'body',

    'published_at',

    'user_id' //temporary
    
    ];


    // Set query not to display articles that will be published in the future

    public function scopePublished($query) {

    	$query->where('published_at', '<=', Carbon::now());

    }

    //Format the published at date

    public function setPublishedAtAttribute($date){
		
		$this->attributes['published_at'] = Carbon::parse($date);    	

    }

    public function user() {

        return $this->belongsTo('App\User');

    }

    public function tags() {

        return $this->belongsToMany('App\Tag')->withTimestamps();
    
    }

    public function getTagListAttribute() {

        return $this->tags->lists('id')->all(); 

    }

}
