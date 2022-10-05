<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use Companycontact\Http\Controllers\Frontend\ContactController;

Route::get('/contact', [ContactController::class, 'sendContact']);

Route::post('/contact', [ContactController::class, 'contactStore'])->name('contact.store');

