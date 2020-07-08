<?php

use App\User;
use App\Profile;
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
    return view('layout.main');
});

Route::get('/pertanyaan', 'PertanyaanController@index');
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/pertanyaan/{pertanyaan_id}', 'JawabanController@index');
Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
Route::post('/pertanyaan', 'PertanyaanController@store');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
Route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');

Route::get('/jawaban/{pertanyaan_id}', 'JawabanController@index');
Route::post('/jawaban/{pertanyaan_id}', 'JawabanController@store');

// Profile
Route::resource('user', 'UserController');

Route::get('/create/user/profile', function(){
    $user = User::find(2);

    $profile = new Profile([
        'full_name' => 'Abdul Jabbar',
        'description' => 'hallo nama saya Abdul',
        'image' => 'abdul.jpg'
    ]);

    $user->profile()->save($profile);
    return $user;
});

Route::get('/read/user', function(){
    $user = User::find(2);

    $data = [
        'nama' => $user->profile->full_name,
        'email' => $user->email,
        'deskripsi' => $user->profile->description
    ];

    dump($data);

});

Route::get('/read/profile', function(){
    $profile = profile::where('user_id', '1')->first();

    // return $profile->user->name;
    $data = [
        'nama' => $profile->full_name,
        'email' => $profile->user->email,
        'deskripsi' => $profile->description
    ];

    dump($data);

});

