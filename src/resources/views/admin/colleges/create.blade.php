@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.college.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.colleges.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('college_name') ? 'has-error' : '' }}">
                <label for="college_name">{{ trans('cruds.college.fields.college_name') }}*</label>
                <input type="text" id="college_name" name="college_name" class="form-control" value="{{ old('college_name', isset($college) ? $college->college_name : '') }}" required>
                @if($errors->has('college_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('college_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.college.fields.college_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('college_website') ? 'has-error' : '' }}">
                <label for="college_website">{{ trans('cruds.college.fields.college_website') }}*</label>
                <input type="text" id="college_website" name="college_website" class="form-control" value="{{ old('college_website', isset($college) ? $college->college_website : '') }}" required>
                @if($errors->has('college_website'))
                    <em class="invalid-feedback">
                        {{ $errors->first('college_website') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.college.fields.college_website_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('college_address') ? 'has-error' : '' }}">
                <label for="college_address">{{ trans('cruds.college.fields.college_address') }}*</label>
                <input type="text" id="college_address" name="college_address" class="form-control" value="{{ old('college_address', isset($college) ? $college->college_address : '') }}" required>
                @if($errors->has('college_address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('college_address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.college.fields.college_address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('college_phone_number') ? 'has-error' : '' }}">
                <label for="college_phone_number">{{ trans('cruds.college.fields.college_phone_number') }}*</label>
                <input type="text" id="college_phone_number" name="college_phone_number" class="form-control" value="{{ old('college_phone_number', isset($college) ? $college->college_phone_number : '') }}" required>
                @if($errors->has('college_phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('college_phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.college.fields.college_phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('college_email') ? 'has-error' : '' }}">
                <label for="college_email">{{ trans('cruds.college.fields.college_email') }}*</label>
                <input type="text" id="college_email" name="college_email" class="form-control" value="{{ old('college_email', isset($college) ? $college->college_email : '') }}" required>
                @if($errors->has('college_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('college_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.college.fields.college_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('college_university') ? 'has-error' : '' }}">
                <label for="college_university">{{ trans('cruds.college.fields.college_university') }}</label>
                <input type="text" id="college_university" name="college_university" class="form-control" value="{{ old('college_university', isset($college) ? $college->college_university : '') }}">
                @if($errors->has('college_university'))
                    <em class="invalid-feedback">
                        {{ $errors->first('college_university') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.college.fields.college_university_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection