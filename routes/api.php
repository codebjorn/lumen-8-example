<?php

use App\Actions\GetAllMemojies;
use App\Actions\GetMemojiByName;
use App\Actions\GetMemojiByPosture;
use App\Actions\GetMemojiBySkinTone;
use App\Actions\GetMemojiesByGender;
use App\Actions\GetStarted;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/', GetStarted::class);

Route::get('/all', [
    'as' => 'all',
    'uses' => GetAllMemojies::class,
]);

Route::group(['prefix' => '{gender}'], function () {
    Route::get('/', GetMemojiesByGender::class);

    Route::group(['prefix' => '{name}'], function () {
        Route::get('/', [
            'as' => 'memojiName',
            'uses' => GetMemojiByName::class,
        ]);

        Route::get('/{skinTone}', GetMemojiBySkinTone::class);

        Route::get('/{skinTone}/{posture}', [
            'as' => 'memojiPosture',
            'uses' => GetMemojiByPosture::class,
        ]);
    });
});
