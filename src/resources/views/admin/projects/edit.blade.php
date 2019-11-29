@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.projects.update", [$project->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
                <label for="project_name">{{ trans('cruds.project.fields.project_name') }}*</label>
                <input type="text" id="project_name" name="project_name" class="form-control" value="{{ old('project_name', isset($project) ? $project->project_name : '') }}" required>
                @if($errors->has('project_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.project_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_description') ? 'has-error' : '' }}">
                <label for="project_description">{{ trans('cruds.project.fields.project_description') }}*</label>
                <textarea id="project_description" name="project_description" class="form-control ckeditor">{{ old('project_description', isset($project) ? $project->project_description : '') }}</textarea>
                @if($errors->has('project_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.project_description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_media') ? 'has-error' : '' }}">
                <label for="project_media">{{ trans('cruds.project.fields.project_media') }}</label>
                <div class="needsclick dropzone" id="project_media-dropzone">

                </div>
                @if($errors->has('project_media'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_media') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.project_media_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_dataset') ? 'has-error' : '' }}">
                <label for="project_dataset">{{ trans('cruds.project.fields.project_dataset') }}</label>
                <div class="needsclick dropzone" id="project_dataset-dropzone">

                </div>
                @if($errors->has('project_dataset'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_dataset') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.project_dataset_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_reference_url') ? 'has-error' : '' }}">
                <label for="project_reference_url">{{ trans('cruds.project.fields.project_reference_url') }}</label>
                <input type="text" id="project_reference_url" name="project_reference_url" class="form-control" value="{{ old('project_reference_url', isset($project) ? $project->project_reference_url : '') }}">
                @if($errors->has('project_reference_url'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_reference_url') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.project_reference_url_helper') }}
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
    var uploadedProjectMediaMap = {}
Dropzone.options.projectMediaDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 50, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="project_media[]" value="' + response.name + '">')
      uploadedProjectMediaMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedProjectMediaMap[file.name]
      }
      $('form').find('input[name="project_media[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->project_media)
          var files =
            {!! json_encode($project->project_media) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="project_media[]" value="' + file.file_name + '">')
            }
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
<script>
    var uploadedProjectDatasetMap = {}
Dropzone.options.projectDatasetDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 100, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="project_dataset[]" value="' + response.name + '">')
      uploadedProjectDatasetMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedProjectDatasetMap[file.name]
      }
      $('form').find('input[name="project_dataset[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->project_dataset)
          var files =
            {!! json_encode($project->project_dataset) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="project_dataset[]" value="' + file.file_name + '">')
            }
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