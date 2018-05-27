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


Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/results', function(){
    $posts = App\models\Post::where('title','like',  '%' . request('query') . '%')->get();

    return view('results')->with('posts', $posts)
        ->with('title', 'Search results : ' . request('query'))
        ->with('settings', App\models\Setting::first())
        ->with('categories', App\models\Category::take(5)->get())
        ->with('query', request('query'));
});

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', ['as' => 'admin.index', 'uses' => 'admin\PagesController@getDashboard']);





//Users Routing .......................

route::get('/admin/user', ['as'=>'user.index','uses'=>'admin\AdminUsersController@index']);
route::get('/admin/user/create',['as'=>'user.create','uses'=>'admin\AdminUsersController@create']);
route::post('/admin/user/store', ['as'=>'user.store','uses'=>'admin\AdminUsersController@store']);
//route::get('/admin/user/{id}/edit/', ['as'=>'user.edit','uses'=>'admin\AdminUsersController@edit']);
//route::put('/admin/user/{id}/update', ['as'=>'user.update','uses'=>'admin\AdminUsersController@update']);


Route::get('user/delete/{id}', [
    'uses' => 'admin\AdminUsersController@destroy',
    'as' => 'user.delete'
]);


Route::get('user/admin/{id}', [
    'uses' => 'admin\AdminUsersController@admin',
    'as' => 'user.admin'
]);

Route::get('user/not-admin/{id}', [
    'uses' => 'admin\AdminUsersController@not_admin',
    'as' => 'user.not.admin'
]);

Route::get('admin/user/profile', [
    'uses' => 'admin\ProfilesController@edit',
    'as' => 'user.profile'
]);


Route::post('admin/user/profile/update', [
    'uses' => 'admin\ProfilesController@update',
    'as' => 'user.profile.update'
]);



//settings routing.................

Route::get('/admin/settings', [
    'uses' => 'SettingController@index',
    'as' => 'settings'
]);

Route::put('/admin/settings/update', [
    'uses' => 'SettingController@update',
    'as' => 'settings.update'
]);



//category routing................

route::get('/admin/category', ['as'=>'cat.index','uses'=>'admin\CategoryController@index']);
route::get('/admin/category/create',['as'=>'cat.create','uses'=>'admin\CategoryController@create']);
route::post('/admin/category/store', ['as'=>'cat.store','uses'=>'admin\CategoryController@store']);
route::get('/admin/category/{id}/edit/', ['as'=>'cat.edit','uses'=>'admin\CategoryController@edit']);
route::put('/admin/category/{id}/update', ['as'=>'cat.update','uses'=>'admin\CategoryController@update']);
route::DELETE('/admin/category/{id}/delete', ['as'=>'cat.delete','uses'=>'admin\CategoryController@destroy']);


//POSTS ROUTING..................................................

Route::get('/admin/post/create', [
    'uses' => 'admin\PostController@create',
    'as' => 'post.create'
]);

Route::put('/admin/post/store', [
    'uses' => 'admin\PostController@store',
    'as' => 'post.store'
]);

Route::get('/admin/post/delete/{id}', [
    'uses' => 'admin\PostController@destroy',
    'as' => 'post.delete'
]);

Route::get('/admin/post', [
    'uses' => 'admin\PostController@index',
    'as' => 'posts'
]);

Route::get('/admin/post/trashed', [
    'uses' => 'admin\PostController@trashed',
    'as' => 'posts.trashed'
]);

Route::get('/admin/post/kill/{id}', [
    'uses' => 'admin\PostController@kill',
    'as' => 'post.kill'
]);

Route::get('/admin/post/restore/{id}', [
    'uses' => 'admin\PostController@restore',
    'as' => 'post.restore'
]);

Route::get('/admin/post/edit/{id}', [
    'uses' => 'admin\PostController@edit',
    'as' => 'post.edit'
]);

Route::post('/admin/post/update/{id}', [
    'uses' => 'admin\PostController@update',
    'as' => 'post.update'
]);
//route::DELETE('/admin/post/{id}/delete', ['as'=>'post.delete','uses'=>'admin\PostController@destroy']);

//TAGS Routing.............................................................

route::get('/admin/tag', ['as'=>'tag.index','uses'=>'admin\TagController@index']);
route::get('/admin/tag/create',['as'=>'tag.create','uses'=>'admin\TagController@create']);
route::post('/admin/tag/store', ['as'=>'tag.store','uses'=>'admin\TagController@store']);
route::get('/admin/tag/{id}/edit/', ['as'=>'tag.edit','uses'=>'admin\TagController@edit']);
route::put('/admin/tag/{id}/update', ['as'=>'tag.update','uses'=>'admin\TagController@update']);
route::DELETE('/admin/tag/{id}/delete', ['as'=>'tag.delete','uses'=>'admin\TagController@destroy']);