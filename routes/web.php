<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//blogs Routes:

//All blogs:
Route::get('/', [BlogController::class, 'index']);

//Show Create Form
Route::get('/blogs/create',[BlogController::class, 'create'])->middleware('auth');

//Store blog Data
Route::post('/blogs',[BlogController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('/blogs/{blog}/edit',[BlogController::class,'edit'])->middleware('auth');

//Update blog
Route::put('/blogs/{blog}',[BlogController::class,'update'])->middleware('auth');

//Delete blog
Route::delete('/blogs/{blog}',[BlogController::class,'destroy'])->middleware('auth');

//Manage blogs
Route::get('/blogs/manage', [BlogController::class,'manage'])->middleware('auth');


//Single blog: Use Route Binding //It's affect above route if it push up that's why it give in below.
Route::get('/blogs/{blog}',[BlogController::class, 'show']);





//User Routes:

// // Show Register create form
// Route::get('/register', [UserController::class,'create'])->middleware('guest');

// // Create New user
// Route::post('/users', [UserController::class,'store']);

//User logout
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');


//Show login Form
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

//Login user
Route::post('/users/authenticate', [UserController::class,'authenticate']);




/*

Common Resource Routes:

// index - Show all blogs
// show - Show single blog
// create - Show form to create new blog
// store - Store new blog
// edit - Show form to edit blog
// update - Update blog
// destroy - Delete blog

*/



// Route::get('/hello',function(){
//     return response('<h1>hello world</h1>',200)
//     ->header('Contant-Type','text/plain');
// });

// Route::get('/posts/{id}',function($id){
//     return response('Post '.$id);
// })->where('id','[0-9]+');


// Route::get('/search',function(Request $request){
//   return $request->name . " ".$request->city;
// });