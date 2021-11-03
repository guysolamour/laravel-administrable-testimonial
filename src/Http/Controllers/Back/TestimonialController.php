<?php

namespace Guysolamour\Administrable\Extensions\Testimonial\Http\Controllers\Back;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Guysolamour\Administrable\Traits\FormBuilderTrait;
use Guysolamour\Administrable\Http\Controllers\BaseController;


class TestimonialController extends BaseController
{
    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = config('administrable-testimonial.models.testimonial')::last()->get();

        return view('administrable-testimonial::' . Str::lower(config('administrable.back_namespace')) . '.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new (config('administrable-testimonial.models.testimonial')), config('administrable-testimonial.forms.back.testimonial'));

        return view('administrable-testimonial::' . Str::lower(config('administrable.back_namespace')) . '.testimonials.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $this->getForm(new (config('administrable-testimonial.models.testimonial')), config('administrable-testimonial.forms.back.testimonial'));

        $form->redirectIfNotValid();

        config('administrable-testimonial.models.testimonial')::create($request->all());

        flashy(Lang::get('administrable-testimonial::translations.controller.create'));

        return redirect_backroute('extensions.testimonial.testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $testimonial = config('administrable-testimonial.models.testimonial')::where('slug', $slug)->firstOrFail();

        return view('administrable-testimonial::' . Str::lower(config('administrable.back_namespace')) . '.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        $testimonial = config('administrable-testimonial.models.testimonial')::where('slug', $slug)->firstOrFail();

        $form = $this->getForm($testimonial, config('administrable-testimonial.forms.back.testimonial'));

        return view('administrable-testimonial::' . Str::lower(config('administrable.back_namespace')) . '.testimonials.edit', compact('testimonial', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $slug)
    {
        $testimonial = config('administrable.extensions.testimonial.model')::where('slug', $slug)->firstOrFail();

        $form = $this->getForm($testimonial, config('administrable-testimonial.forms.back.testimonial'));

        $form->redirectIfNotValid();
        $testimonial->update($request->all());

        flashy(Lang::get('administrable-testimonial::translations.controller.update'));

        return redirect_backroute('extensions.testimonial.testimonial.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $slug)
    {
        $testimonial = config('administrable.extensions.testimonial.model')::where('slug', $slug)->firstOrFail();

        $testimonial->delete();

        flashy(Lang::get('administrable-testimonial::translations.controller.delete'));

        return redirect_backroute('extensions.testimonial.testimonial.index');
    }

}
