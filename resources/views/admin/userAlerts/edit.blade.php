@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.userAlert.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.user-alerts.update", [$userAlert->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="users">{{ trans('cruds.userAlert.fields.user') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="users[]" id="users" multiple>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $userAlert->users->contains($id)) ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.userAlert.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('expiring_contract') ? 'has-error' : '' }}">
                            <label for="expiring_contract_id">{{ trans('cruds.userAlert.fields.expiring_contract') }}</label>
                            <select class="form-control select2" name="expiring_contract_id" id="expiring_contract_id">
                                @foreach($expiring_contracts as $id => $expiring_contract)
                                    <option value="{{ $id }}" {{ (old('expiring_contract_id') ? old('expiring_contract_id') : $userAlert->expiring_contract->id ?? '') == $id ? 'selected' : '' }}>{{ $expiring_contract }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('expiring_contract'))
                                <span class="help-block" role="alert">{{ $errors->first('expiring_contract') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.userAlert.fields.expiring_contract_helper') }}</span>
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