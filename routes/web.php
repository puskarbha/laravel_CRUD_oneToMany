<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/create',function(){
 $user=User::findOrFail(1);
 $post=new Post(['title'=>'secomd post','body'=>'second body']);
 $user->posts()->save($post);
});

Route::get('/read',function(){
   $user=User::findOrFail(1);
   foreach ($user->posts as $post){
       echo $post->title."<br>";
   }
});

Route::get('/update',function(){
    $user=User::findOrFail(1);
    $user->posts()->whereId(2)->update(['title'=>'second title updated','body'=>'second body updated']);

});
