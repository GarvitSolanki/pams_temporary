@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_name') }}
                        </th>
                        <td>
                            {{ $project->project_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_description') }}
                        </th>
                        <td>
                            {!! $project->project_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_media') }}
                        </th>
                        <td>
                            @if($project->project_media)
                                @foreach($project->project_media as $key => $media)

                                    <a class="nav-link" href="{{ substr($media->getUrl() , 16 ) }}" target="_blank">
                                        {{ $media->name }}
                                    </a>

                                @endforeach
                            @endif
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_dataset') }}
                        </th>
                        <td>
                            @if($project->project_dataset)
                                @foreach($project->project_dataset as $key => $dataset)

                                    <a class="nav-link" href="{{ substr($media->getUrl() , 16 ) }}" target="_blank">
                                        {{ $media->name }}
                                    </a>

                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_reference_url') }}
                        </th>
                        <td>
                            {{ $project->project_reference_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
