<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id' // temp
    ];
    
    protected $dates = ['published_at'];

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }
    
    public function scopeUnpublished($query) {
        $query->where('published_at', '>', Carbon::now());
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    public function setPublishedAtAttribute($date) {
        $this->attributes['published_at'] = Carbon::parse($date);
    }
    
    public function getPublishedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d');
    }
    
    public function getPublishedAtFormatedAttribute($date) {
        return Carbon::parse($this->published_at)->format('F d, Y');
    }
    
    public function getTagListAttribute() {
        return $this->tags->lists('id')->toArray();
    }
    
    public function getArchivePublishedAtAttribute($date) {
        return Carbon::parse($date)->format('M Y');
    }
}
