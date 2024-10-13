<?php

use App\Http\Controllers\AlbumsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\DashBoardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){

    return view("home");
});
Route::get("/all_bands",[BandController::class, "index"])->name("show.bands");
Route::get("/add_band",[BandController::class, "addingBand"])->name("adding.band")->middleware('auth');
Route::post("/add_band",[BandController::class, "addBand"])->name("add.band");
Route::get("/bands/delete/{id}",[BandController::class, "deleteBand"])->name("delete.band")->middleware('auth');
Route::get("/all_bands/search",[BandController::class, "searchBand"])->name("search.band");
Route::get("/registar", [UserController::class,"showForm"])->name("create.user");
Route::post("/registar",[UserController::class,"store"])->name("register.user");
Route::get("logout", [UserController::class,"logOut"])->name("logout.user");
Route::post("/login",[UserController::class,"login"])->name("login");
Route::get("/login", [UserController::class, "showLoginForm"])->name("login.form");
Route::get("/dashboard", [DashBoardController::class, "indexDashboard"])->name("show.dashboard")->middleware('auth');
Route::get("/show_albums", [AlbumsController::class, "showAlbums"])->name("show.albums");
Route::post("/add_album", [AlbumsController::class, "addAlbum"])->name("add.album");
Route::get('/albums/{album}/delete', [AlbumsController::class, 'deleteAlbum'])->name('albums.delete')->middleware('auth');
Route::get("/form_album", [AlbumsController::class, "albumform"])->name("form.albums")->middleware('auth');
Route::get('all_bands/{band}/albums',[BandController::class,'showAlbums'])->name('bands.albums');
Route::get('albums/{album}/edit',[AlbumsController::class,'getEditAlbum'])->name('edit.albumview')->middleware('auth');
Route::post('albums/{album}/edit',[AlbumsController::class,'editAlbum'])->name('edit.album');