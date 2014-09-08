
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// $oTopic = Topic::find(1);

	// return $oTopic;


});

Route::get('topics/{id}',function($id){

	$oTopic = Topic::find($id); //using the model Topic 

	//binding into Laravel. 
	return View::make("topic")->with("topic",$oTopic);



});
Route::get('posts/{id}',function($id){

	$oPost = Post::find($id); //using the model Topic 

	//binding into Laravel. 
	return View::make("post")->with("post",$oPost);



});
