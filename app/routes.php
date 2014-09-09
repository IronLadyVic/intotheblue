
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

//check user input using validate method

Route::post('users',function($id){

	$aRules = array(
		"username"=>"required|unique:users",
		"password"=>"required|confirmed",
		"password_confirmation"=>"required",
		"firstname"=>"required",
		"lastname"=>"required",
		"email"=>"required|email|unique:users",
		"avatar"=>"required"
		);

	$aUserInput = Input::all();

	$messages= array(
		"email"=>"email is invalid",
		"avatar"=>"please upload a jpg or png file",
		"required"=>"please fill in"
		);

	$oValidator = Validator::make(Input::all(), $aRules);

	if($oValidator->fails()){
		return Redirect::to("users/new")->withErrors($oValidator)->withInput();
	}else{
		$aDetails = Input::all();
		$aDetails["password"] = Hash::make($aDetails["password"]);
		User::create($aDetails);

		//redirect back to home page, Topic no.1 Body surfing
		return Redirect::to("topics/1");

	}


})

//make form with user id and put the sticky data into the controls
//passing through the user_id
Route::get('users/{id}', function($id){

	$oUser = User::find($id);

	return View::make('userDetails')->with("user",$oUser);

})->before("auth");


//edit user details then validate

Route::put('users/{id}/edit', function($id){

	$oUser = User::find($id);

	return View::make('editUserForm')->with("user",$oUser);

})->before("auth");



//update user details then validate

Route::post('users/{id}', function($id){


	$aRules = array(

		'username'=>'required';
		'firstname'=>'required';
		'lastname'=>'required';
		'email'=>'required|email|unique:users,email,'.$id;
		//no need to have an avatar for personal preference
		);
	$oValidator = Validator::make(Input::all(),$aRules);

	if($oValidator->passes){
		$oUser = User::find($id);
		$oUser->fill(Input::all());
		$oUser->save();

		//redirect to users page
		return Redirect::to("users/".$id);

	}else{
		return Redirect::to("users,".$id.'/edit')->withErrors($oValidator)->withInput();
	}
	

})->before("auth");


//posts


Route::get('posts/create', function(){

	$aTopics = Topic::lists("name","id"); //retrieving a list of colomn values This method will return an array of role titles. You may also specify a custom key column for the returned array:

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
		return Redirect::to('topics/'.$oPost->topic_id);

	}else{
		Redirect::to('posts/create')->withErrors($oValidator)->withInput();
	}


});
