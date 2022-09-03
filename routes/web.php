<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrewController;


Route::get('/', function () {
    return view('screens.crud');
});

Route::get('/result', function () {
    return view('screens.result');
});


Route::get('/update', function () {
    return view('screens.update');
}); 


Route::resource('crews', CrewController::class);
