<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;



Route::name(Str::lower(config('administrable.front_namespace') . '.'))->middleware('web')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | EXTENSIONS -> Testimonial
    |--------------------------------------------------------------------------
    */
    Route::get('testimonials', [config('administrable-testimonial.controllers.front.testimonial'), 'index'])->name('extensions.testimonial.testimonial.index');

});

