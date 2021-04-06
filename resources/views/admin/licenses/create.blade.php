@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.license.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.licenses.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('license') ? 'has-error' : '' }}">
                            <label for="license">{{ trans('cruds.license.fields.license') }}</label>
                            <div class="needsclick dropzone" id="license-dropzone">
                            </div>
                            @if($errors->has('license'))
                                <span class="help-block" role="alert">{{ $errors->first('license') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.license.fields.license_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('verified') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="verified" value="0">
                                <input type="checkbox" name="verified" id="verified" value="1" {{ old('verified', 0) == 1 ? 'checked' : '' }}>
                                <label for="verified" style="font-weight: 400">{{ trans('cruds.license.fields.verified') }}</label>
                            </div>
                            @if($errors->has('verified'))
                                <span class="help-block" role="alert">{{ $errors->first('verified') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.license.fields.verified_helper') }}</span>
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
    Dropzone.options.licenseDropzone = {
    url: '{{ route('admin.licenses.storeMedia') }}',
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
      $('form').find('input[name="license"]').remove()
      $('form').append('<input type="hidden" name="license" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="license"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($license) && $license->license)
      var file = {!! json_encode($license->license) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="license" value="' + file.file_name + '">')
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