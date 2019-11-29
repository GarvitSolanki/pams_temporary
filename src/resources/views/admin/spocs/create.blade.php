@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.spoc.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.spocs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('spoc_first_name') ? 'has-error' : '' }}">
                <input type="text" id="id" name="id" class="form-control" value="{{uniqid('spoc')}}" required hidden>
                <label for="spoc_first_name">{{ trans('cruds.spoc.fields.spoc_first_name') }}*</label>
                <input type="text" id="spoc_first_name" name="spoc_first_name" class="form-control" value="{{ old('spoc_first_name', isset($spoc) ? $spoc->spoc_first_name : '') }}" required>
                @if($errors->has('spoc_first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_first_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_first_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_last_name') ? 'has-error' : '' }}">
                <label for="spoc_last_name">{{ trans('cruds.spoc.fields.spoc_last_name') }}*</label>
                <input type="text" id="spoc_last_name" name="spoc_last_name" class="form-control" value="{{ old('spoc_last_name', isset($spoc) ? $spoc->spoc_last_name : '') }}" required>
                @if($errors->has('spoc_last_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_last_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_last_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_age') ? 'has-error' : '' }}">
                <label for="spoc_age">{{ trans('cruds.spoc.fields.spoc_age') }}*</label>
                <input type="number" id="spoc_age" name="spoc_age" class="form-control" value="{{ old('spoc_age', isset($spoc) ? $spoc->spoc_age : '') }}" step="1" required>
                @if($errors->has('spoc_age'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_age') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_age_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_date_of_birth') ? 'has-error' : '' }}">
                <label for="spoc_date_of_birth">{{ trans('cruds.spoc.fields.spoc_date_of_birth') }}*</label>
                <input type="text" id="spoc_date_of_birth" name="spoc_date_of_birth" class="form-control date" value="{{ old('spoc_date_of_birth', isset($spoc) ? $spoc->spoc_date_of_birth : '') }}" required>
                @if($errors->has('spoc_date_of_birth'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_date_of_birth') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_date_of_birth_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_gender') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.spoc.fields.spoc_gender') }}*</label>
                @foreach(App\Spoc::SPOC_GENDER_RADIO as $key => $label)
                    <div>
                        <input id="spoc_gender_{{ $key }}" name="spoc_gender" type="radio" value="{{ $key }}" {{ old('spoc_gender', null) === (string)$key ? 'checked' : '' }} required>
                        <label for="spoc_gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('spoc_gender'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_gender') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('spoc_email') ? 'has-error' : '' }}">
                <label for="spoc_email">{{ trans('cruds.spoc.fields.spoc_email') }}*</label>
                <input type="email" id="spoc_email" name="spoc_email" class="form-control" value="{{ old('spoc_email', isset($spoc) ? $spoc->spoc_email : '') }}" required>
                @if($errors->has('spoc_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_alternate_email') ? 'has-error' : '' }}">
                <label for="spoc_alternate_email">{{ trans('cruds.spoc.fields.spoc_alternate_email') }}</label>
                <input type="email" id="spoc_alternate_email" name="spoc_alternate_email" class="form-control" value="{{ old('spoc_alternate_email', isset($spoc) ? $spoc->spoc_alternate_email : '') }}">
                @if($errors->has('spoc_alternate_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_alternate_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_alternate_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_phone_number') ? 'has-error' : '' }}">
                <label for="spoc_phone_number">{{ trans('cruds.spoc.fields.spoc_phone_number') }}*</label>
                <input type="number" id="spoc_phone_number" name="spoc_phone_number" class="form-control" value="{{ old('spoc_phone_number', isset($spoc) ? $spoc->spoc_phone_number : '') }}" step="1" required>
                @if($errors->has('spoc_phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_alternate_phone_number') ? 'has-error' : '' }}">
                <label for="spoc_alternate_phone_number">{{ trans('cruds.spoc.fields.spoc_alternate_phone_number') }}</label>
                <input type="number" id="spoc_alternate_phone_number" name="spoc_alternate_phone_number" class="form-control" value="{{ old('spoc_alternate_phone_number', isset($spoc) ? $spoc->spoc_alternate_phone_number : '') }}" step="1">
                @if($errors->has('spoc_alternate_phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_alternate_phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_alternate_phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_profile_image') ? 'has-error' : '' }}">
                <label for="spoc_profile_image">{{ trans('cruds.spoc.fields.spoc_profile_image') }}*</label>
                <div class="needsclick dropzone" id="spoc_profile_image-dropzone">

                </div>
                @if($errors->has('spoc_profile_image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_profile_image') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_profile_image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_password') ? 'has-error' : '' }}">
                <label for="spoc_password">{{ trans('cruds.spoc.fields.spoc_password') }}</label>
                <input type="password" id="spoc_password" name="spoc_password" class="form-control" required>
                @if($errors->has('spoc_password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_linkedin_profile') ? 'has-error' : '' }}">
                <label for="spoc_linkedin_profile">{{ trans('cruds.spoc.fields.spoc_linkedin_profile') }}*</label>
                <input type="text" id="spoc_linkedin_profile" name="spoc_linkedin_profile" class="form-control" value="{{ old('spoc_linkedin_profile', isset($spoc) ? $spoc->spoc_linkedin_profile : '') }}" required>
                @if($errors->has('spoc_linkedin_profile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_linkedin_profile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_linkedin_profile_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('spoc_github_profile') ? 'has-error' : '' }}">
                <label for="spoc_github_profile">{{ trans('cruds.spoc.fields.spoc_github_profile') }}*</label>
                <input type="text" id="spoc_github_profile" name="spoc_github_profile" class="form-control" value="{{ old('spoc_github_profile', isset($spoc) ? $spoc->spoc_github_profile : '') }}" required>
                @if($errors->has('spoc_github_profile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('spoc_github_profile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.spoc.fields.spoc_github_profile_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.spocProfileImageDropzone = {
    url: '{{ route('admin.spocs.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="spoc_profile_image"]').remove()
      $('form').append('<input type="hidden" name="spoc_profile_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="spoc_profile_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($spoc) && $spoc->spoc_profile_image)
      var file = {!! json_encode($spoc->spoc_profile_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $spoc->spoc_profile_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="spoc_profile_image" value="' + file.file_name + '">')
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
@stop