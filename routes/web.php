<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public website (single-page terminal)
|--------------------------------------------------------------------------
| NOTE: This is the PUBLIC Flowsee site at https://DOMAIN/ .
| Flowsee Studio (internal) is a separate app at /studio — keep apart.
*/

Route::view('/', 'pages.home');