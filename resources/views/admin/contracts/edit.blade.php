@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.contract.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.contracts.update", [$contract->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('owner') ? 'has-error' : '' }}">
                            <label for="owner_id">{{ trans('cruds.contract.fields.owner') }}</label>
                            <select class="form-control select2" name="owner_id" id="owner_id">
                                @foreach($owners as $id => $owner)
                                    <option value="{{ $id }}" {{ (old('owner_id') ? old('owner_id') : $contract->owner->id ?? '') == $id ? 'selected' : '' }}>{{ $owner }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('owner'))
                                <span class="help-block" role="alert">{{ $errors->first('owner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.owner_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status_id">{{ trans('cruds.contract.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id">
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $contract->status->id ?? '') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('expires_on') ? 'has-error' : '' }}">
                            <label for="expires_on">{{ trans('cruds.contract.fields.expires_on') }}</label>
                            <input class="form-control date" type="text" name="expires_on" id="expires_on" value="{{ old('expires_on', $contract->expires_on) }}">
                            @if($errors->has('expires_on'))
                                <span class="help-block" role="alert">{{ $errors->first('expires_on') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.expires_on_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contract') ? 'has-error' : '' }}">
                            <label for="contract">{{ trans('cruds.contract.fields.contract') }}</label>
                            <div class="needsclick dropzone" id="contract-dropzone">
                            </div>
                            @if($errors->has('contract'))
                                <span class="help-block" role="alert">{{ $errors->first('contract') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.contract_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                            <label for="value">{{ trans('cruds.contract.fields.value') }}</label>
                            <input class="form-control" type="number" name="value" id="value" value="{{ old('value', $contract->value) }}" step="0.01">
                            @if($errors->has('value'))
                                <span class="help-block" role="alert">{{ $errors->first('value') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.value_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.contract.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $contract->description) }}">
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                            <label for="start_date">{{ trans('cruds.contract.fields.start_date') }}</label>
                            <input class="form-control date" type="text" name="start_date" id="start_date" value="{{ old('start_date', $contract->start_date) }}">
                            @if($errors->has('start_date'))
                                <span class="help-block" role="alert">{{ $errors->first('start_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.start_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('department') ? 'has-error' : '' }}">
                            <label for="department">{{ trans('cruds.contract.fields.department') }}</label>
                            <input class="form-control" type="text" name="department" id="department" value="{{ old('department', $contract->department) }}">
                            @if($errors->has('department'))
                                <span class="help-block" role="alert">{{ $errors->first('department') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.department_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nda') ? 'has-error' : '' }}">
                            <label for="nda_id">{{ trans('cruds.contract.fields.nda') }}</label>
                            <select class="form-control select2" name="nda_id" id="nda_id">
                                @foreach($ndas as $id => $nda)
                                    <option value="{{ $id }}" {{ (old('nda_id') ? old('nda_id') : $contract->nda->id ?? '') == $id ? 'selected' : '' }}>{{ $nda }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nda'))
                                <span class="help-block" role="alert">{{ $errors->first('nda') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.nda_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('entity') ? 'has-error' : '' }}">
                            <label for="entity">{{ trans('cruds.contract.fields.entity') }}</label>
                            <input class="form-control" type="text" name="entity" id="entity" value="{{ old('entity', $contract->entity) }}">
                            @if($errors->has('entity'))
                                <span class="help-block" role="alert">{{ $errors->first('entity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.entity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                            <label for="comment_id">{{ trans('cruds.contract.fields.comment') }}</label>
                            <select class="form-control select2" name="comment_id" id="comment_id">
                                @foreach($comments as $id => $comment)
                                    <option value="{{ $id }}" {{ (old('comment_id') ? old('comment_id') : $contract->comment->id ?? '') == $id ? 'selected' : '' }}>{{ $comment }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('comment'))
                                <span class="help-block" role="alert">{{ $errors->first('comment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contract.fields.comment_helper') }}</span>
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
    Dropzone.options.contractDropzone = {
    url: '{{ route('admin.contracts.storeMedia') }}',
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
      $('form').find('input[name="contract"]').remove()
      $('form').append('<input type="hidden" name="contract" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="contract"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contract) && $contract->contract)
      var file = {!! json_encode($contract->contract) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="contract" value="' + file.file_name + '">')
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