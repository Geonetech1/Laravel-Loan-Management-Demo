@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.nda.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.ndas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nda') ? 'has-error' : '' }}">
                            <label for="nda">{{ trans('cruds.nda.fields.nda') }}</label>
                            <div class="needsclick dropzone" id="nda-dropzone">
                            </div>
                            @if($errors->has('nda'))
                                <span class="help-block" role="alert">{{ $errors->first('nda') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.nda.fields.nda_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_signed') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_signed" value="0">
                                <input type="checkbox" name="is_signed" id="is_signed" value="1" {{ old('is_signed', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_signed" style="font-weight: 400">{{ trans('cruds.nda.fields.is_signed') }}</label>
                            </div>
                            @if($errors->has('is_signed'))
                                <span class="help-block" role="alert">{{ $errors->first('is_signed') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.nda.fields.is_signed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.ndaDropzone = {
    url: '{{ route('admin.ndas.storeMedia') }}',
    maxFilesize: 25, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 25
    },
    success: function (file, response) {
      $('form').find('input[name="nda"]').remove()
      $('form').append('<input type="hidden" name="nda" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="nda"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($nda) && $nda->nda)
      var file = {!! json_encode($nda->nda) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="nda" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection