<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//user has many comments
	public function comments(){
		return $this->hasMany('Comment');
	}
	protected $hidden = array('password', 'remember_token');

	//we need to tell the route when a user fills in their details that the colomns in the table need to be filled in SQl.
	protected $fillable = array('email', 'password', 'firstname', 'lastname', 'username', 'avatar');




}
