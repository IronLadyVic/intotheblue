
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


//make form for new member

Route::get('users/new',function(){

	return View::make('newUserForm');

});


Route::post('users',function(){

	$aRules = array(
		"username"=>"required|unique:users",
		"password"=>"required|confirmed",
		"firstname"=>"required",
		"lastname"=>"required",
		"email"=>"required|email|unique:users",
		"avatar"=>"required"
		)
	$aUserInput = Input::all();
	$messages= array(
		"email"=>"email is invalid",
		"required"=>"please fill in"
		)

	$oValidator = Validator::make($aUserInput, $aRules, $messages);

	if($oValidator->fails){
		return Redirect::to("users/new")->withErrors($oValidator)->withInput();
	}else{
		$Details = Input::all();
		$aDetails["password"] = Hash::make($aDetails["password"]);
		User::create($aDetails);

		return Redirect::to("topics/1");

	}


})

//make form with user id and put the sticky data into the controls
Route::get('users/{id}',function(){

	$oUser = User::find($id);

	return View::make('userDetails')->with("user",$oUser);

});

Route::get('users/{id}',function(){

	$oUser = User::find($id);

	return View::make('userDetails')->with("user",$oUser);

});

//edit user details then validate

Route::put('users/{id}',function(){

	//validate user editing their details

});


//posts


Route::get('posts/create',function(){

	$aTopics = Topic::lists("title","id");

	return View::make('newComposeForm')->with('topics', $aTopics);


})->before("auth|admin");





//User Inputs into form then form is validated and photo is renamed and placed into 'blog-photos'

Route::post('posts',function(){

	//validate input in the compose a blog form

	$aRules = array(

		'topic_id'=>'required',
		'title'=>'required',
		'content'=>'required',
		'photo_path'=>'required'

		);

	$oValidator = Validator::make(Input::all(),$aRules);

	//if validation is all good then...
	if($oValidator->passes()){
		//upload photo
		$sNewPhotoName = Input::get("title").".".Input::file("photo_path")->getClientOriginalExtension();
		Input::file("photo_path")->move("blog-photos/",$sNewPhotoName);

		$aDetails = Input::all();
		$aDetails["photo_path"] = $sNewPhotoName;

		$oPost = Post::create('aDetails');
		//once all validated the post will be placed into the topic_id that it matches to in the system
		return Redirect::to('topics/'.$oTopic->topic_id);

	}else{
		Redirect::to('posts/create')->withErrors($oValidator)->withInput();
	}


});
