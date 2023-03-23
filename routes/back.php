<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

Route::prefix(config('administrable.auth_prefix_path') . "/extensions/") ->middleware(['web', Str::lower(config('administrable.guard')) . '.auth'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | EXTENSIONS -> Testimonial
    |--------------------------------------------------------------------------
    */
    Route::name(Str::lower(config('administrable.back_namespace')) . '.extensions.testimonial.testimonial.')->group(function () {
        Route::resource('testimonials', config('administrable-testimonial.controllers.back.testimonial'))->names([
            'index'    => 'index',
            'show'     => 'show',
            'create'   => 'create',
            'store'    => 'store',
            'edit'     => 'edit',
            'update'   => 'update',
            'destroy'  => 'destroy',
        ]);
    });

});
