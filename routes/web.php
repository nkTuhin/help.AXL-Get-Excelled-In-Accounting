<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('home')->group(function() {

	Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

   Route::get('/user-profile', 'UserProfilesController@index')->name('userprofile');

   Route::get('/update-profile-info/{id}', 'UserController@getUpdateView')->name('updateview');	
   Route::post('/updateprofileinfo', 'UserController@updateProfileInfo')->name('updateprofileinfo');
   Route::post('/add_profile_info', 'UserController@addProfileInfo')->name('add_profile_info');

   Route::get('/profile', 'UserController@profile')->name('profile')->middleware('auth');
   Route::post('/profile', 'UserController@updateAvatar')->name('updateavatar');

   // user request
   Route::get('/user-request', 'HomeController@userrequestpage')->name('user-request');

   Route::post('/user-request-submit', 'HomeController@userRequest')->name('userrequest.submit');
   // Document Download route
   Route::get('/download/file/{id}', 'HomeController@DownloadFile')->name('download.file');
   // Document view route
   Route::get('/view/document/{id}', 'HomeController@ViewDocument')->name('documentview');
   
   // Route::get('view_journal/{file}', 'HomeController@showJournal')->name('showjurnal');

});





// Route::post('/edituserinfo/{id}/edit' , 'UserController@editUserInfo');






Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@viewAdminLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::resource('document' , 'DocumentController');


	// Achievement Route 
	
	// Route::get('/addachievement', 'AddAchievementController@index')->name('addachievement');
	// Route::post('/addachievement', 'AddAchievementController@create')->name('addachievement.create');

	// add post achievement
	Route::get('/addpostachievement', 'AddPostAchievementController@index')->name('addpostachievement');
	Route::post('/addpostachievement', 'AddPostAchievementController@create')->name('addpostachievement.create');

// add comment achievement
	
	Route::get('/addcommentachievement', 'AddCommentAchievementController@index')->name('addcommentachievement');
	Route::post('/addcommentachievement', 'AddCommentAchievementController@create')->name('addcommentachievement.create');

	// Tags
    Route::resource('tags', 'TagController', ['except' => ['create']]);

    Route::get('/deleteuserrequest/{id}', 'AdminController@deleteUserRequest')->name('requestdelete');

   


});



Route::prefix('discuss')->group(function() {

	Route::get('/index', 'DiscussionHomeController@index')->name('discusshome');

	Route::get('/postsubmit', 'PostController@index')->name('createpostpage')->middleware('auth');

	Route::get('/createpost', 'PostController@createPost')->name('createpost');
	Route::post('/createpost', 'PostController@createPost')->name('createpost.create');

	// post view routes 
	
	Route::get('/post/{post}', 'PostController@showPost')->name('post.show');

	// comments
	
	Route::get('/comment/{post_id}', 'CommentController@createComment');
	Route::post('/comment/{post_id}', 'CommentController@createComment')->name('createcomment.create');
	// edit 
	Route::get('/post/{post}/edit', 'PostController@editPost');
	// update post 
	Route::put('/post/{post}', 'PostController@updatePost')->name('post.update');

	// delete post
	
	Route::get('/deletepost/{post}', 'PostController@deletePost')->name('post.delete')->middleware('auth');
	// delete comment
	Route::get('/deletecomment/{comment}', 'PostController@deleteComment')->name('comment.delete')->middleware('auth');

});



