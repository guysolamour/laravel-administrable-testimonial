@extends(back_view_path('layouts.base'))

@section('title', Lang::get('administrable-testimonial::translations.default.add'))

@section('content')

<div class="row mb-5">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{ route( config('administrable.guard') . '.dashboard') }}">{{ Lang::get('administrable-testimonial::translations.default.dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ back_route('extensions.testimonial.testimonial.index') }}">{{ Lang::get('administrable-testimonial::translations.label') }}</a></li>
                <li class="breadcrumb-item active">{{ Lang::get('administrable-testimonial::translations.default.add') }}</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h3 class="title-5 m-b-35">
            {{ Lang::get('administrable-testimonial::translations.default.add') }}
        </h3>
        <div class="row">
            <div class="col-md-12">
                @include('administrable-testimonial::' . Str::lower(config('administrable.back_namespace')) . '.testimonials._form')
            </div>
        </div>
    </div>
</div>

@endsection
