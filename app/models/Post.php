<?php


class Post extends Eloquent {

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

    public function comments()
    {
        return $this->belongsToMany('Comment');
    }

//we need to tell the route when a user fills in their details that the colomns in the table need to be filled in SQl.
protected $fillable = array('title', 'content', 'topic_id', 'photo_path');

}


