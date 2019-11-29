@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.coach.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.coaches.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('coach_first_name') ? 'has-error' : '' }}">
                <label for="coach_first_name">{{ trans('cruds.coach.fields.coach_first_name') }}*</label>
                <input type="text" id="coach_first_name" name="coach_first_name" class="form-control" value="{{ old('coach_first_name', isset($coach) ? $coach->coach_first_name : '') }}" required>
                @if($errors->has('coach_first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_first_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_first_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_last_name') ? 'has-error' : '' }}">
                <label for="coach_last_name">{{ trans('cruds.coach.fields.coach_last_name') }}*</label>
                <input type="text" id="coach_last_name" name="coach_last_name" class="form-control" value="{{ old('coach_last_name', isset($coach) ? $coach->coach_last_name : '') }}" required>
                @if($errors->has('coach_last_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_last_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_last_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_date_of_birth') ? 'has-error' : '' }}">
                <label for="coach_date_of_birth">{{ trans('cruds.coach.fields.coach_date_of_birth') }}*</label>
                <input type="text" id="coach_date_of_birth" name="coach_date_of_birth" class="form-control date" value="{{ old('coach_date_of_birth', isset($coach) ? $coach->coach_date_of_birth : '') }}" required>
                @if($errors->has('coach_date_of_birth'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_date_of_birth') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_date_of_birth_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_gender') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.coach.fields.coach_gender') }}*</label>
                @foreach(App\Coach::COACH_GENDER_RADIO as $key => $label)
                    <div>
                        <input id="coach_gender_{{ $key }}" name="coach_gender" type="radio" value="{{ $key }}" {{ old('coach_gender', null) === (string)$key ? 'checked' : '' }} required>
                        <label for="coach_gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('coach_gender'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_gender') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('coach_profile_image') ? 'has-error' : '' }}">
                <label for="coach_profile_image">{{ trans('cruds.coach.fields.coach_profile_image') }}*</label>
                <div class="needsclick dropzone" id="coach_profile_image-dropzone">

                </div>
                @if($errors->has('coach_profile_image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_profile_image') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_profile_image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_email') ? 'has-error' : '' }}">
                <label for="coach_email">{{ trans('cruds.coach.fields.coach_email') }}*</label>
                <input type="email" id="coach_email" name="coach_email" class="form-control" value="{{ old('coach_email', isset($coach) ? $coach->coach_email : '') }}" required>
                @if($errors->has('coach_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_alternate_email') ? 'has-error' : '' }}">
                <label for="coach_alternate_email">{{ trans('cruds.coach.fields.coach_alternate_email') }}</label>
                <input type="email" id="coach_alternate_email" name="coach_alternate_email" class="form-control" value="{{ old('coach_alternate_email', isset($coach) ? $coach->coach_alternate_email : '') }}">
                @if($errors->has('coach_alternate_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_alternate_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_alternate_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_phone_number') ? 'has-error' : '' }}">
                <label for="coach_phone_number">{{ trans('cruds.coach.fields.coach_phone_number') }}*</label>
                <input type="number" id="coach_phone_number" name="coach_phone_number" class="form-control" value="{{ old('coach_phone_number', isset($coach) ? $coach->coach_phone_number : '') }}" step="1" required>
                @if($errors->has('coach_phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_alternate_phone_number') ? 'has-error' : '' }}">
                <label for="coach_alternate_phone_number">{{ trans('cruds.coach.fields.coach_alternate_phone_number') }}</label>
                <input type="number" id="coach_alternate_phone_number" name="coach_alternate_phone_number" class="form-control" value="{{ old('coach_alternate_phone_number', isset($coach) ? $coach->coach_alternate_phone_number : '') }}" step="1">
                @if($errors->has('coach_alternate_phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_alternate_phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_alternate_phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_password') ? 'has-error' : '' }}">
                <label for="coach_password">{{ trans('cruds.coach.fields.coach_password') }}</label>
                <input type="password" id="coach_password" name="coach_password" class="form-control" required>
                @if($errors->has('coach_password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_linkedin_profile') ? 'has-error' : '' }}">
                <label for="coach_linkedin_profile">{{ trans('cruds.coach.fields.coach_linkedin_profile') }}*</label>
                <input type="text" id="coach_linkedin_profile" name="coach_linkedin_profile" class="form-control" value="{{ old('coach_linkedin_profile', isset($coach) ? $coach->coach_linkedin_profile : '') }}" required>
                @if($errors->has('coach_linkedin_profile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_linkedin_profile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_linkedin_profile_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('coach_github_profile') ? 'has-error' : '' }}">
                <label for="coach_github_profile">{{ trans('cruds.coach.fields.coach_github_profile') }}*</label>
                <input type="text" id="coach_github_profile" name="coach_github_profile" class="form-control" value="{{ old('coach_github_profile', isset($coach) ? $coach->coach_github_profile : '') }}" required>
                @if($errors->has('coach_github_profile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('coach_github_profile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coach.fields.coach_github_profile_helper') }}
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
    Dropzone.options.coachProfileImageDropzone = {
    url: '{{ route('admin.coaches.storeMedia') }}',
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
      $('form').find('input[name="coach_profile_image"]').remove()
      $('form').append('<input type="hidden" name="coach_profile_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="coach_profile_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($coach) && $coach->coach_profile_image)
      var file = {!! json_encode($coach->coach_profile_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $coach->coach_profile_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="coach_profile_image" value="' + file.file_name + '">')
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