@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.comment.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.comments.update", [$comment->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                            <label for="comment">{{ trans('cruds.comment.fields.comment') }}</label>
                            <textarea class="form-control" name="comment" id="comment">{{ old('comment', $comment->comment) }}</textarea>
                            @if($errors->has('comment'))
                                <span class="help-block" role="alert">{{ $errors->first('comment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comment.fields.comment_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                            <label for="comments_id">{{ trans('cruds.comment.fields.comments') }}</label>
                            <select class="form-control select2" name="comments_id" id="comments_id">
                                @foreach($comments as $id => $comments)
                                    <option value="{{ $id }}" {{ (old('comments_id') ? old('comments_id') : $comment->comments->id ?? '') == $id ? 'selected' : '' }}>{{ $comments }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('comments'))
                                <span class="help-block" role="alert">{{ $errors->first('comments') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comment.fields.comments_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label for="user_id">{{ trans('cruds.comment.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $comment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.comment.fields.user_helper') }}</span>
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