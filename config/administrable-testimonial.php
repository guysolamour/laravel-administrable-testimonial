<?php

return [
    /*
    |--------------------------------------------------------------------------
    | EXTENSIONS -> Testimonial
    |--------------------------------------------------------------------------
    |
    | The migrations folder in database directory
    */
    'migrations_path' => database_path('extensions/testimonial'),

    'models' => [
        'testimonial'     =>  \Guysolamour\Administrable\Extensions\Testimonial\Models\Testimonial::class,
    ],
    'forms' => [
        'back' => [
            'testimonial' => \Guysolamour\Administrable\Extensions\Testimonial\Forms\Back\TestimonialForm::class,
        ],
    ],
    'controllers' => [
        'back' => [
            'testimonial' => \Guysolamour\Administrable\Extensions\Testimonial\Http\Controllers\Back\TestimonialController::class,
        ],
        'front' => [
            'testimonial' => \Guysolamour\Administrable\Extensions\Testimonial\Http\Controllers\Front\TestimonialController::class,
        ]
    ],
    'filemanager' => false,
    'dropzone'    => true,
    'tinymce'     => false,
];
