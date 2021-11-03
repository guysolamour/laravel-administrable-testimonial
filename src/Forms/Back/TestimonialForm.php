<?php

namespace Guysolamour\Administrable\Extensions\Testimonial\Forms\Back;

use Kris\LaravelFormBuilder\Form;
use Illuminate\Support\Facades\Lang;

class TestimonialForm extends Form
{
    public function buildForm()
    {

        if ($this->getModel() && $this->getModel()->getKey()) {
            $method = 'PUT';
            $url    = back_route('extensions.testimonial.testimonial.update', $this->getModel());
        } else {
            $method = 'POST';
            $url    = back_route('extensions.testimonial.testimonial.store');
        }

        $this->formOptions = [
            'method' => $method,
            'url'    => $url,
            'name'   => get_form_name($this->getModel()),
        ];

	    $this
        // add fields here

        ->add('name','text', [
            'label' => Lang::get('administrable-testimonial::translations.view.name'),
            'rules' => 'required',
        ])
        ->add('email','text', [
            'label' => Lang::get('administrable-testimonial::translations.view.email'),
            'rules' => 'nullable|email',
        ])
        ->add('job','text', [
            'label' => Lang::get('administrable-testimonial::translations.view.job'),
            'rules' => 'nullable',
        ])
        ->add('online', 'select', [
            'choices' => ['1' => Lang::get('administrable-testimonial::translations.default.yes'), '0' => Lang::get('administrable-testimonial::translations.default.no')],
            'rules' => 'required',
            'label' => Lang::get('administrable-testimonial::translations.view.online'),
            'attr'  => [
                'class' => 'custom-select'
            ]
        ])
        ->add('content','textarea', [
            'label' => Lang::get('administrable-testimonial::translations.view.content'),
            'rules' => 'required',
            'attr' => [
                'data-tinymce'
            ]
        ])
        ;
    }
}
