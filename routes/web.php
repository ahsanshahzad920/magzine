<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\UserController;

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

// Show the registration form
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
// Process the registration form
Route::post('/register', [UserController::class, 'register'])->name('create.user');
// Show the login form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
// Process the login form
Route::post('/login', [UserController::class, 'login'])->name('login.user');

//Logout Route
Route::get('/logout', function () {
    Auth::logout();
    session()->flash('status', 'Task was successful!');
    return redirect()->route('login');
  })->name('logout');

Route::group(['middleware' => ['auth']], function () {

        // Admin routes
        Route::group(['middleware' => [CheckRole::class . ':Admin'], 'prefix' => 'admin'], function () {

            // Dashboard for Admin
            Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');

            Route::group(['prefix' => 'authors'], function () {

                //View articles
                Route::get('/', 'Admin\AuthorController@index')->name('admin.authors');

                //author articles
                Route::get('/{id}/articles', 'Admin\AuthorController@author_articles')->name('admin.author.articles');
          
            });

        });

        // Moderator/Editor routes
        Route::group(['middleware' => [CheckRole::class . ':Moderator/Editor'],['prefix' => 'moderator']], function () {
            // Dashboard for Moderator/Editor
            Route::get('/dashboard', 'Moderator\ModeratorController@dashboard')->name('moderator.dashboard');
        });

        // Author/Publisher routes
        Route::group(['middleware' => [CheckRole::class . ':Author/Publisher'], 'prefix' => 'author'], function () {
            // Dashboard for Author/Publisher
            Route::get('/dashboard', 'Author\AuthorController@dashboard')->name('author.dashboard');

            Route::group(['prefix' => 'articles'], function () {

                //View articles
                Route::get('/', 'Author\ArticleController@index')->name('author.articles');

                //View articles
                Route::get('/view/{slug}', 'Author\ArticleController@view')->middleware('track.article.views')->name('author.article.view');
              
                //Create article
                Route::get('/create-article', 'Author\ArticleController@create')->name('author.create.article');
              
                //Create article
                Route::post('/save-article', 'Author\ArticleController@store')->name('author.save.article');
              
                //Edit trainings
                Route::get('/edit-article/{slug}', 'Author\ArticleController@edit')->name('author.edit.article');
                
                Route::post('/update-article', 'Author\ArticleController@update')->name('author.update.article');
              
                //Delete trainings
                Route::get('/delete-article/{id}', 'Author\ArticleController@destroy')->name('author.delete.article');
          
                //Approve Or DisApprove Request Route (Change Status)
                Route::post('/article-change-status', 'Author\ArticleController@change_status')->name('author.change.article.status');
          
            });
        });

    });




