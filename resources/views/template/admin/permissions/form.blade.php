<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title">{{ trans('cruds.permission.fields.title') }} *</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}" required>
    @if($errors->has('title'))
        <em class="invalid-feedback">
            {{ $errors->first('title') }}
        </em>
    @endif
    <p class="helper-block">
        {{ trans('cruds.permission.fields.title_helper') }}
    </p>
</div>
<div>
    <input class="btn btn-primary btn-default btn-sm" type="submit" value="{{ trans('global.save') }}">
</div>
