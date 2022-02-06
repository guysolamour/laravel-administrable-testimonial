{!! form_start($form) !!}

{!! form_row($form->name) !!}
{!! form_row($form->email) !!}
{!! form_row($form->job) !!}

@if(config('administrable-testimonial.dropzone'))
<x-administrable::dropzone :model='$form->getModel()' label='Photo' />
@elseif(config('administrable-testimonial.dropzone'))
@imagemanagerfront([
    'model'             =>  $form->getModel(),
    'label'             =>  "Photo",
    'button_label'      =>  "Autre l'image",
    'type'              =>  'image'
])
@endif

{!! form_rest($form) !!}


<div class="form-group">
    <button type="submit" class="btn btn-success">
      @if (isset($edit) && $edit)
        <i class="fa fa-edit"></i> {{ Lang::get('administrable-testimonial::translations.default.modify') }}
      @else
        <i class="fa fa-save"></i> {{ Lang::get('administrable-testimonial::translations.default.save') }}
      @endif
    </button>
</div>

{!! form_end($form) !!}

@if(config('administrable-testimonial.tinymce'))
<x-administrable::tinymce
  selector="textarea[data-tinymce]"
  :model="$form->getModel()"
/>
@endif
