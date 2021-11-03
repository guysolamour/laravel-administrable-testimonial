@extends(back_view_path('layouts.base'))

@section('title', $testimonial->name)


@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route(config('administrable.guard') . '.dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ back_route('extensions.testimonial.testimonial.index') }}">{{ Lang::get('administrable-testimonial::translations.label') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $testimonial->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ Lang::get('administrable-testimonial::translations.label') }}</h3>
                        <div class="btn-group float-right">
                            <a href="{{ back_route('extensions.testimonial.testimonial.edit', $testimonial) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> {{ Lang::get('administrable-testimonial::translations.default.edit') }}</a>
                            <a href="{{ back_route('extensions.testimonial.testimonial.destroy', $testimonial) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="{{ Lang::get('administrable-testimonial::translations.view.destroy') }}">
                                <i class="fas fa-trash"></i> {{ Lang::get('administrable-testimonial::translations.default.delete') }}</a>
                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col-md-8">
                            {{-- add fields here --}}
                            <div class="pb-2">
                                <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.name') }}:</span></p>
                                <p>
                                    {{ $testimonial->name }}
                                </p>
                            </div>

                            <div class="pb-2">
                                <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.email') }}:</span></p>
                                <p>
                                    {{ $testimonial->email }}
                                </p>
                            </div>

                            <div class="pb-2">
                                <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.job') }}:</span></p>
                                <p>
                                    {{ $testimonial->job }}
                                </p>
                            </div>
                            <div class="pb-2">
                                <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.content') }}:</span></p>
                                <p>
                                    {!! $testimonial->content !!}
                                </p>
                            </div>
                            <div class="pb-2">
                                <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.createdat') }}:</span></p>
                                <p>
                                    {{ $testimonial->created_at->format('d/m/Y h:i') }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @filemanagerShow([
                                'model'      =>  $testimonial,
                                'collection' =>  'front-image',
                            ])
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
