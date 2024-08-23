<?php

use Majdi\SecureLoginSystem\Http\Controllers\SecureLoginController;

Route::get('secure-login', [SecureLoginController::class, 'showLoginForm']);
Route::post('secure-login', [SecureLoginController::class, 'login']);
