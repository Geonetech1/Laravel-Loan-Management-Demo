@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.contract.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contract->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.owner') }}
                                    </th>
                                    <td>
                                        {{ $contract->owner->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $contract->status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.expires_on') }}
                                    </th>
                                    <td>
                                        {{ $contract->expires_on }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.contract') }}
                                    </th>
                                    <td>
                                        @if($contract->contract)
                                            <a href="{{ $contract->contract->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.value') }}
                                    </th>
                                    <td>
                                        {{ $contract->value }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $contract->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.start_date') }}
                                    </th>
                                    <td>
                                        {{ $contract->start_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.department') }}
                                    </th>
                                    <td>
                                        {{ $contract->department }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.nda') }}
                                    </th>
                                    <td>
                                        {{ $contract->nda->is_signed ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.entity') }}
                                    </th>
                                    <td>
                                        {{ $contract->entity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.comment') }}
                                    </th>
                                    <td>
                                        {{ $contract->comment->comment ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection