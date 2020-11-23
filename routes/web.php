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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('templates.uikit/app');
});

Route::get('/note/{slug}', function ($slug) {
    $data = [
        'note_name'         => 'Minha Nota Bonita',
        'note_description'  => 'Minha Nota Bonita',
        'note_visibility'   => 'public',
        'note_content'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus repellendus corrupti explicabo porro expedita, iste pariatur dolor natus sit inventore id a nobis in, tenetur laboriosam repellat est magnam earum.'
    ];
    return view('templates.uikit.pages.note', compact('data'));
});
Route::post('/actions/update', function () {
    return response()->json(request()->all(), 200);
})->name('actions_update_post');
