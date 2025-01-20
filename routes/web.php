<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('groceries.index');
});


use App\Http\Controllers\GroceryController;

Route::resource('groceries', GroceryController::class);

