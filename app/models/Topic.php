<?php


class Topic extends Eloquent {

	public function posts(){
		return $this->hasMany('Post');
	}

}
