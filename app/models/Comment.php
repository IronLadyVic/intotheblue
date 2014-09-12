<?php


class Comment extends Eloquent {

	public function post(){
		return $this->belongsTo('Post');
	}


//we need to tell the route when a user fills in their details that the colomns in the table need to be filled in SQl.
protected $fillable = array('content', 'user_id', 'post_id');


}
