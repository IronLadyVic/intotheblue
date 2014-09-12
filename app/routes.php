
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
// 1a. login get
// 1b. login post
// 1c. login get

// 2. register get
// 3. register post
// 4. register get
// 5. register put

// 6. posts get
// 7. comment post
// 8. comment put	
// |--------------------------------------------------------------------------
// | Composer
// |--------------------------------------------------------------------------
// {
//     "require": {
//         "monolog/monolog": "1.0.*"
//         As you can see, require takes an object that maps package names (e.g. monolog/monolog) to package versions (e.g. 1.0.*).
// 			The package name consists of a vendor name and the project's name. Often these will be identical - 
//the vendor name just exists to prevent naming clashes. It allows two different people to create a library named json, which would then just be named igorw/json and seldaek/json.

// Here we are requiring monolog/monolog, so the vendor name is the same as the project's name. 
//For projects with a unique name this is recommended. It also allows adding more related projects under the same namespace later on. If you are maintaining a library, this would make it really easy to split it up into smaller decoupled parts.
//     }
// } you can pass in composer events in a function\

// View::composer('hello', function(){

// 	$view['name']= 'Vic';

// });
//unit test this composer by making a class and passing in the function compose
// View::composer('hello', 'helloComposer');

// class helloComposer{
// 	public function compose($view){
// 		$view['name'] = 'Vic';
// 	}
// }

// screen will show 'hello Vic';


// Route::get('/',function(){

// 	return View::make('hello');

// });

//passing in a string filter, works for mail, events, view composers.

// Route::filter('foo'm 'FooFilter'); testibility, you can break this up into classes to test better

// class FooFilter{
// 	public function filter($route, $request){
// 		return 'filtered';
// 	}
// }
//closure call back. the screen will print out filtered










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

Route::get('login',function(){

	return View::make('loginForm');

});

Route::post('login',function(){

	$aLoginDetails = array(
		'username'=>Input::get('username'),
		'password'=>Input::get('password')

		);

	if(Auth::attempt($aLoginDetails)){
		return Redirect::intended("users/".Auth::user()->id);
	}else{
		return Redirect::to('login')->with("error","Incorrect please try again"); //error is the control name for error message
	}

});

Route::get('logout',function(){

	Auth::logout(); //user becomes logged out of the session

	return Redirect::to('topics/1');



});



//make form for new member

Route::get('users/new',function(){

	return View::make('newUserForm');

});

//check user input using validate method

Route::post('users',function(){

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
		//we need to tell the route when a user fills in their details that the colomns in the table need to be filled in SQl.
		//so go to User.php model and create a variable fillable and pass the colomns into the array.
		//in laravel we need to tell aDetails that it is a key to be filled into the database colomns under user.
		User::create($aDetails);
		//redirect back to home page, Topic no.1 Body surfing
		return Redirect::to("topics/1");

	}


});

// //make form with user id and put the concrete data into the controls
// //passing through the id of the user
Route::get('users/{id}', function($id){

	$oUser = User::find($id);

	return View::make('userDetails')->with("user",$oUser);

});


//edit user details then validate

Route::get('users/{id}/edit', function($id){

	$oUser = User::find($id);

	return View::make('editUserForm')->with("user",$oUser);

});



//update user details then validate

Route::put('users/{id}', function($id){


	$aRules = array(
		'firstname'=>'required',
		'lastname'=>'required',
		'email'=>'required|email|unique:users,email,'.$id
		
		);

	$oValidator = Validator::make(Input::all(), $aRules);
	

	if($oValidator->passes()){
		$oUser = User::find($id);
		$oUser->fill(Input::all());
		$oUser->save();
		// User::find($id)->fill(Input::all())->save();
		//redirect to users page

		return Redirect::to("users/".$id);

	}else{
		return Redirect::to("users/".$id."/edit")->withErrors($oValidator)->withInput();
	}
	

})->before("auth");

//
//posts
// 1a. posts get
// 1b. posts post
// 1c. posts get
// 1d. posts put

Route::get('posts/{id}',function($id){

	$oPost = Post::find($id); //using the model Topic 

	//binding into Laravel. 
	return View::make("post")->with("post",$oPost);

})->where('id', '[0-9]+');



//make form for a new post

Route::get('posts/create',function(){
	$aTopics = Topic::lists("name","id");


	return View::make('newPostForm')->with("topics",$aTopics);
	//return $aTopics;

})->before("auth|admin");




//User Inputs into form then form is validated and photo is renamed and placed into 'blog-photos'

Route::post('posts',function(){

	//validate input in the compose a blog form

	$aRules = array(

		'topic_id'=>'required',
		'title'=>'required',
		'photo_path'=>'required',
		'content'=>'required'

		);

	$oValidator = Validator::make(Input::all(),$aRules);

	//if validation is all good then...
	if($oValidator->passes()){
		//upload photo//Retrieving The Extension Of An Uploaded File
		$sNewPhotoName = Input::get("title").".".Input::file('photo_path')->getClientOriginalExtension();
		Input::file("photo_path")->move("blog-photos",$sNewPhotoName);


		$aDetails = Input::all();
		$aDetails["photo_path"] = $sNewPhotoName;

		$oPost = Post::create($aDetails);
		//once all validated the post will be placed into the topic_id that it matches to in the system
		//got to the model and create the fillable variable to tell laravel what inputs it needs to fill
		//protected $fillable = array('title', 'topic_id', 'content', 'photo_path');
		return Redirect::to('topics/'.$oPost->topic_id);

	}else{
		return Redirect::to('posts/create')->withErrors($oValidator)->withInput();
	}


})->before("auth|admin");



//make a post for the post for a user to comment.

//display a single post when user clicks on read more.
// 1a. a post get
// 1b. a post post
// 1c. a post get

Route::get('posts/{id}', function($id){

	$oPost = Post::find($id); //using the model Post 
	//binding into Laravel. 
	return View::make("readPost")->with("post",$oPost);



})->where('id', '[0-9]+');


Route::post('comments',function(){

	$aRules= array(

		"content"=>'required'

		);
	$oValidator = Validator::make(Input::all(), $aRules);

	if($oValidator->passes()){

		$aDetails = Input::all();
		$aDetails["user_id"] = Auth::user()->id;

		return Redirect::to("posts/".$oComment->post_id);
	}else{

		return Redirect::to("posts/".$user_id->withErrors());

	}

});

Route::get('comments{id}', function($id){

	$oComment = Comment::find($id); //using the model Post 
	//binding into Laravel. 
	return View::make("topics/1")->with("comment",$oComment);



});
	

	







// //post create because the id is in create. 
// Route::get('posts/{id}',function($id){

// 	$oPost = Post::find($id);

// 	return View::make("post")->with("post",$oPost);


// })->where('id', '[0-9]+'); //where is 

// //post create//use a controller to do the switching for you to find out which get to create
// Route::get('posts/create',function($id){



// });

//content is king. on a mobile form is not enough room for content. you have alot of content, you have to allow the person
//to gather the content at the right time. Taxonmies and thesauri facets come into place.

