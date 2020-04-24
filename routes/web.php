<?php

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
    return view('index');
})->name('index');

Route::get('about', function() {
    return view('about');
})->name('about');


Route::get('post/{id}', function ($id) {
 if ($id == 1){
    $post=[
        'title'=>'Nigerian food blog',
        'content'=>'Hausa, igbo and Yoruba dishes'
    ];
 }
 
else {
    $post=[
    'title'=>'something else',
    'content'=>'something else'
];
}
    return view('post', ['post'=>$post]);
})->name('post');


Route::get('food', function() {
    return view('food');
})->name('food');

Route::get('contact', function() {
    return view('contact');
})->name('contact');

Route::get('indexa', function() {
    return view('indexa');
})->name('indexa');

Route::get('edit/{id}',function($id) {
    if ($id == 1){
        $post=[
            'title'=>'Nigerian food blog',
            'content'=>'Hausa, igbo and Yoruba dishes'
        ];
     }
     
    else {
        $post=[
        'title'=>'something else',
        'content'=>'something else'
    ];
    }
    return view ('edit', ['post'=>$post]);
})->name ('edit');

Route::post('edit',function(Illuminate\Http\Request $request,Illuminate\Validation\Factory $validator) {
    $validation= $validator->make($request->all(), [
        'title'=>'required|min:5',
        'content'=>'required|min:10'
    ]);
    if ($validation->fails()){
        return redirect()->back()->withErrors($validation);
    }
    return redirect()
    ->route('indexa')
    ->with('info', 'Post edited, new title: ' .$request->input('title'));
})->name ('update');

Route::get('create',function(){
    return view ('create');
})->name ('create');

Route::post('create',function(Illuminate\Http\Request $request,Illuminate\Validation\Factory $validator){
    $validation= $validator->make($request->all(), [
        'title'=>'required|min:5',
        'content'=>'required|min:10'
    ]);
    if ($validation->fails()){
        return redirect()->back()->withErrors($validation);
    }
    return redirect()
    ->route('indexa')
    ->with('info', 'Created Post, Title:'. $request->input('title'));
})->name ('create');