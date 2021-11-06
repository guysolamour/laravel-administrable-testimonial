{!! form_start($form) !!}

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

<x-administrable::tinymce
  selector="textarea[data-tinymce]"
  :model="$form->getModel()"
/>
