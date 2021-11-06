@extends(back_view_path('layouts.base'))


@section('title', Lang::get('administrable-testimonial::translations.label'))


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <div class='float-sm-right'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route(config('administrable.guard') . '.dashboard') }}">{{ Lang::get('administrable-testimonial::translations.default.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ Lang::get('administrable-testimonial::translations.label') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class='row'>
            <div class="col-md-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">{{ Lang::get('administrable-testimonial::translations.label') }}</h3>
                                <div class="btn-group">
                                    <a href="{{ back_route('extensions.testimonial.testimonial.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus"></i>&nbsp; {{ Lang::get('administrable-testimonial::translations.default.add') }}
                                    </a>

                                    <a href="#" class="btn btn-danger d-none" data-model="{{ config('administrable-testimonial.models.testimonial') }}" id="delete-all">
                                        <i class="fa fa-trash"></i>
                                        {{ Lang::get("administrable-testimonial::translations.default.deleteall") }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" id="list">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="check-all">
                                                        <label class="custom-control-label"
                                                            for="check-all"></label>
                                                    </div>
                                                </th>
                                                <th></th>
                                                <th>{{ Lang::get('administrable-testimonial::translations.view.name') }}</th>
                                                <th>{{ Lang::get('administrable-testimonial::translations.view.email') }}</th>
                                                <th>{{ Lang::get('administrable-testimonial::translations.view.job') }}</th>
                                                <th>{{ Lang::get('administrable-testimonial::translations.view.status') }}</th>
                                                <th>{{ Lang::get('administrable-testimonial::translations.view.content') }}</th>
                                                <th>{{ Lang::get('administrable-testimonial::translations.view.createdat') }}</th>
                                                {{-- add fields here --}}
                                                <th>{{ Lang::get('administrable-testimonial::translations.view.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($testimonials as $testimonial)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" data-check
                                                            class="custom-control-input"
                                                            data-id="{{ $testimonial->getKey() }}"
                                                            id="check-{{ $testimonial->getKey() }}">
                                                        <label class="custom-control-label"
                                                            for="check-{{ $testimonial->getKey() }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ $testimonial->email }}</td>
                                                <td>{{ $testimonial->job }}</td>
                                                <td>
                                                    @if ($testimonial->isOnline())
                                                    <a data-toggle="tooltip" data-placement="top" title="{{ Lang::get('administrable-testimonial::translations.view.online') }}"><i
                                                            class="fas fa-circle text-success"></i></a>
                                                    @else
                                                    <a data-toggle="tooltip" data-placement="top" title="{{ Lang::get('administrable-testimonial::translations.view.offline') }}"><i
                                                            class="fas fa-circle text-secondary"></i></a>
                                                    @endif
                                                </td>
                                                 <td>{!! Str::limit(strip_tags($testimonial->content),50) !!}</td>

                                                <td>{{ $testimonial->created_at->format('d/m/Y h:i') }}</td>
                                                {{-- add values here --}}
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ back_route('extensions.testimonial.testimonial.show', $testimonial) }}" class="btn btn-primary"
                                                            data-toggle="tooltip" data-placement="top" title="{{ Lang::get('administrable-testimonial::translations.default.show') }}"><i
                                                                class="fas fa-eye"></i></a>

                                                            <a href="{{ back_route('model.clone', get_clone_model_params($testimonial)) }}" class="btn btn-secondary" data-toggle="tooltip"
                                                        data-placement="top" title="{{ Lang::get('administrable-testimonial::translations.default.clone') }}"><i class="fas fa-clone"></i></a>

                                                        <a href="{{ back_route('extensions.testimonial.testimonial.edit', $testimonial) }}" class="btn btn-info"
                                                            data-toggle="tooltip" data-placement="top" title="{{ Lang::get('administrable-testimonial::translations.default.edit') }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="{{ back_route('extensions.testimonial.testimonial.destroy', $testimonial) }}" data-method="delete"
                                                            data-confirm="{{ Lang::get('administrable-testimonial::translations.view.destroy') }}"
                                                            class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                                            title="{{ Lang::get('administrable-testimonial::translations.default.delete') }}"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>



<x-administrable::datatable />
@deleteall()
@endsection
