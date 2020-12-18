<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//1. Posts all
//2. Single Post
//3. Update Post
//
//
//Route::get('/posts', function (){
//    $post = \App\Models\Post::create(['title'=>'myfirstpost','slug'=>'my first post']);
//    return $post;
//
//});
//
////create
//Route::post('/posts');
////update
//Route::put('/posts/{id}');
////delete
//Route::delete('/posts/{id}');


//short way to defining route resource controller

//Route::apiResource('/posts',PostController::class);

//This is long method of defining the route
//Route::get('/posts',[PostController::class, 'index'] );
//Route::put('/posts',[PostController::class, 'update'] );
//Route::post('/posts',[PostController::class, 'store'] );
//Route::delete('/posts',[PostController::class, 'destroy'] );



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//create a user route

Route::get('/user-create',function (Request $request){
    App\Models\User::create([
        'name'=>'Bikas chaudhary tharu',
        'email'=>'vcbikash123@gmail.com',
        'password'=>\Illuminate\Support\Facades\Hash::make('chaudharypassword'),
    ]);


});

Route::post('/login',function (Request $request){
//    $credentials =[
//
//        'email'=>'vcbikash123@gmail.com',
//        'password'=>'chaudharypassword'
//    ];
    $credentials = request()->only(['email','password']);
    $token = auth()->attempt($credentials);
    return $token;
});


Route::middleware('auth')->get('/me', function (){
   return auth()->user();
});

Route::middleware('auth')->apiResource('/posts',PostController::class);























