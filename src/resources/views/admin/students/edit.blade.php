@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.student.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.students.update", [$student->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('student_first_name') ? 'has-error' : '' }}">
                <label for="student_first_name">{{ trans('cruds.student.fields.student_first_name') }}*</label>
                <input type="text" id="student_first_name" name="student_first_name" class="form-control" value="{{ old('student_first_name', isset($student) ? $student->student_first_name : '') }}" required>
                @if($errors->has('student_first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_first_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_first_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_last_name') ? 'has-error' : '' }}">
                <label for="student_last_name">{{ trans('cruds.student.fields.student_last_name') }}*</label>
                <input type="text" id="student_last_name" name="student_last_name" class="form-control" value="{{ old('student_last_name', isset($student) ? $student->student_last_name : '') }}" required>
                @if($errors->has('student_last_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_last_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_last_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_age') ? 'has-error' : '' }}">
                <label for="student_age">{{ trans('cruds.student.fields.student_age') }}*</label>
                <input type="number" id="student_age" name="student_age" class="form-control" value="{{ old('student_age', isset($student) ? $student->student_age : '') }}" step="1" required>
                @if($errors->has('student_age'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_age') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_age_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_date_of_birth') ? 'has-error' : '' }}">
                <label for="student_date_of_birth">{{ trans('cruds.student.fields.student_date_of_birth') }}*</label>
                <input type="text" id="student_date_of_birth" name="student_date_of_birth" class="form-control date" value="{{ old('student_date_of_birth', isset($student) ? $student->student_date_of_birth : '') }}" required>
                @if($errors->has('student_date_of_birth'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_date_of_birth') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_date_of_birth_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_gender') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.student.fields.student_gender') }}*</label>
                @foreach(App\Student::STUDENT_GENDER_RADIO as $key => $label)
                    <div>
                        <input id="student_gender_{{ $key }}" name="student_gender" type="radio" value="{{ $key }}" {{ old('student_gender', $student->student_gender) === (string)$key ? 'checked' : '' }} required>
                        <label for="student_gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('student_gender'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_gender') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('student_profile_image') ? 'has-error' : '' }}">
                <label for="student_profile_image">{{ trans('cruds.student.fields.student_profile_image') }}*</label>
                <div class="needsclick dropzone" id="student_profile_image-dropzone">

                </div>
                @if($errors->has('student_profile_image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_profile_image') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_profile_image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_branch') ? 'has-error' : '' }}">
                <label for="student_branch">{{ trans('cruds.student.fields.student_branch') }}*</label>
                <input type="text" id="student_branch" name="student_branch" class="form-control" value="{{ old('student_branch', isset($student) ? $student->student_branch : '') }}" required>
                @if($errors->has('student_branch'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_branch') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_branch_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_year') ? 'has-error' : '' }}">
                <label for="student_year">{{ trans('cruds.student.fields.student_year') }}*</label>
                <input type="number" id="student_year" name="student_year" class="form-control" value="{{ old('student_year', isset($student) ? $student->student_year : '') }}" step="1" required>
                @if($errors->has('student_year'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_year') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_year_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_semester') ? 'has-error' : '' }}">
                <label for="student_semester">{{ trans('cruds.student.fields.student_semester') }}*</label>
                <input type="number" id="student_semester" name="student_semester" class="form-control" value="{{ old('student_semester', isset($student) ? $student->student_semester : '') }}" step="1" required>
                @if($errors->has('student_semester'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_semester') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_semester_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_email') ? 'has-error' : '' }}">
                <label for="student_email">{{ trans('cruds.student.fields.student_email') }}*</label>
                <input type="email" id="student_email" name="student_email" class="form-control" value="{{ old('student_email', isset($student) ? $student->student_email : '') }}" required>
                @if($errors->has('student_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_alternate_email') ? 'has-error' : '' }}">
                <label for="student_alternate_email">{{ trans('cruds.student.fields.student_alternate_email') }}</label>
                <input type="email" id="student_alternate_email" name="student_alternate_email" class="form-control" value="{{ old('student_alternate_email', isset($student) ? $student->student_alternate_email : '') }}">
                @if($errors->has('student_alternate_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_alternate_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_alternate_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_phone_number') ? 'has-error' : '' }}">
                <label for="student_phone_number">{{ trans('cruds.student.fields.student_phone_number') }}*</label>
                <input type="number" id="student_phone_number" name="student_phone_number" class="form-control" value="{{ old('student_phone_number', isset($student) ? $student->student_phone_number : '') }}" step="1" required>
                @if($errors->has('student_phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_alternate_phone_number') ? 'has-error' : '' }}">
                <label for="student_alternate_phone_number">{{ trans('cruds.student.fields.student_alternate_phone_number') }}</label>
                <input type="number" id="student_alternate_phone_number" name="student_alternate_phone_number" class="form-control" value="{{ old('student_alternate_phone_number', isset($student) ? $student->student_alternate_phone_number : '') }}" step="1">
                @if($errors->has('student_alternate_phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_alternate_phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_alternate_phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_address') ? 'has-error' : '' }}">
                <label for="student_address">{{ trans('cruds.student.fields.student_address') }}*</label>
                <input type="text" id="student_address" name="student_address" class="form-control" value="{{ old('student_address', isset($student) ? $student->student_address : '') }}" required>
                @if($errors->has('student_address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_password') ? 'has-error' : '' }}">
                <label for="student_password">{{ trans('cruds.student.fields.student_password') }}</label>
                <input type="password" id="student_password" name="student_password" class="form-control">
                @if($errors->has('student_password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_linkedin_profile') ? 'has-error' : '' }}">
                <label for="student_linkedin_profile">{{ trans('cruds.student.fields.student_linkedin_profile') }}</label>
                <input type="text" id="student_linkedin_profile" name="student_linkedin_profile" class="form-control" value="{{ old('student_linkedin_profile', isset($student) ? $student->student_linkedin_profile : '') }}">
                @if($errors->has('student_linkedin_profile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_linkedin_profile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_linkedin_profile_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_github_profile') ? 'has-error' : '' }}">
                <label for="student_github_profile">{{ trans('cruds.student.fields.student_github_profile') }}*</label>
                <input type="text" id="student_github_profile" name="student_github_profile" class="form-control" value="{{ old('student_github_profile', isset($student) ? $student->student_github_profile : '') }}" required>
                @if($errors->has('student_github_profile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_github_profile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_github_profile_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('student_aadhar_number') ? 'has-error' : '' }}">
                <label for="student_aadhar_number">{{ trans('cruds.student.fields.student_aadhar_number') }}</label>
                <input type="text" id="student_aadhar_number" name="student_aadhar_number" class="form-control" value="{{ old('student_aadhar_number', isset($student) ? $student->student_aadhar_number : '') }}">
                @if($errors->has('student_aadhar_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('student_aadhar_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.student_aadhar_number_helper') }}
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
    Dropzone.options.studentProfileImageDropzone = {
    url: '{{ route('admin.students.storeMedia') }}',
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
      $('form').find('input[name="student_profile_image"]').remove()
      $('form').append('<input type="hidden" name="student_profile_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="student_profile_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($student) && $student->student_profile_image)
      var file = {!! json_encode($student->student_profile_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $student->student_profile_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="student_profile_image" value="' + file.file_name + '">')
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