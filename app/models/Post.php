<?php


class Post extends Eloquent {

    public function topics()
    {
        return $this->belongsTo('Topic');
    }

    public function comments()
    {
        return $this->belongsToMany('Comment');
    }



}
