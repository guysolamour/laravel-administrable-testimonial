@extends(back_view_path('layouts.base'))

@section('title', $testimonial->name)


@section('content')
<div class="main-content">
    <div class="card ">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end" style="padding-top:10px;padding-right:20px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route(config('administrable.guard') . '.dashboard') }}">{{ Lang::get('administrable-testimonial::translations.default.dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ back_route('extensions.testimonial.testimonial.index') }}">{{ Lang::get('administrable-testimonial::translations.label') }}</a></li>
                <li class="breadcrumb-item active">{{ $testimonial->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        {{-- <h4 class="card-title">
               {{ Lang::get('administrable-testimonial::translations.label') }}
            </h4> --}}

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <section style="margin-bottom: 2rem;">

                        <div class="btn-group-horizontal">
                            <a href="{{ back_route('extensions.testimonial.testimonial.edit', $testimonial) }}" class="btn btn-info" data-toggle="tooltip"
                                data-placement="top" title="{{ Lang::get('administrable-testimonial::translations.default.edit') }}"><i class="fas fa-edit"></i>{{ Lang::get('administrable-testimonial::translations.default.edit') }}</a>
                            <a href="{{ back_route('extensions.testimonial.testimonial.destroy', $testimonial) }}" data-method="delete" data-toggle="tooltip"
                                data-placement="top" title="{{ Lang::get('administrable-testimonial::translations.default.delete') }}"
                                data-confirm="{{ Lang::get('administrable-testimonial::translations.view.destroy') }}" class="btn btn-danger"><i
                                    class="fa fa-trash"></i> {{ Lang::get('administrable-testimonial::translations.default.delete') }}</a>
                        </div>
                    </section>
                    {{-- add fields here --}}
                    <div>
                        <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.name') }}:</span></p>
                        <p>
                            {{ $testimonial->name }}
                        </p>
                    </div>

                    <div>
                        <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.email') }}:</span></p>
                        <p>
                            {{ $testimonial->email }}
                        </p>
                    </div>

                    <div>
                        <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.job') }}:</span></p>
                        <p>
                            {{ $testimonial->job }}
                        </p>
                    </div>
                    <div>
                        <p><span class="font-weight-bold">{{ Lang::get('administrable-testimonial::translations.view.content') }}:</span></p>
                        <p>
                            {!! $testimonial->content !!}
                        </p>
                    </div>
                    <div>
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

<div class="fab fab-fixed">
    <button class="btn btn-float btn-primary" data-toggle="button">
        <i class="fab-icon-default ti-plus"></i>
        <i class="fab-icon-active ti-close"></i>
    </button>

    <ul class="fab-buttons">
    <li><a class="btn btn-float btn-sm btn-info" href="{{ back_route('extensions.testimonial.testimonial.edit', $testimonial) }}" title="{{ Lang::get('administrable-testimonial::translations.default.edit') }}"
                data-provide="tooltip" data-placement="left" ><i class="ti-pencil"></i> </a></li>
        <li><a class="btn btn-float btn-sm btn-danger" href="{{ back_route('extensions.testimonial.testimonial.destroy', $testimonial) }}"
                data-method="delete" data-confirm="{{ Lang::get('administrable-testimonial::translations.view.destroy') }}" title="{{ Lang::get('administrable-testimonial::translations.default.delete') }}"
                data-provide="tooltip" data-placement="left"><i class="ti-trash"></i> </a></li>
    </ul>
</div>
</div>

@endsection
