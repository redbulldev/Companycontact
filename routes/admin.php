<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use Companycontact\Http\Controllers\Admin\ContactController;


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'CheckLogedOut']], function(){
    Route::Resource('/contact', ContactController::class)->only('index', 'show', 'destroy');
});
