@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.coach.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.id') }}
                        </th>
                        <td>
                            {{ $coach->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_first_name') }}
                        </th>
                        <td>
                            {{ $coach->coach_first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_last_name') }}
                        </th>
                        <td>
                            {{ $coach->coach_last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_date_of_birth') }}
                        </th>
                        <td>
                            {{ $coach->coach_date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_gender') }}
                        </th>
                        <td>
                            {{ App\Coach::COACH_GENDER_RADIO[$coach->coach_gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_profile_image') }}
                        </th>
                        <td>
                            @if($coach->coach_profile_image)
                                <a href="{{ $coach->coach_profile_image->getUrl() }}" target="_blank">
                                    <img src="{{ $coach->coach_profile_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_email') }}
                        </th>
                        <td>
                            {{ $coach->coach_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_alternate_email') }}
                        </th>
                        <td>
                            {{ $coach->coach_alternate_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_phone_number') }}
                        </th>
                        <td>
                            {{ $coach->coach_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_alternate_phone_number') }}
                        </th>
                        <td>
                            {{ $coach->coach_alternate_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_linkedin_profile') }}
                        </th>
                        <td>
                            {{ $coach->coach_linkedin_profile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coach.fields.coach_github_profile') }}
                        </th>
                        <td>
                            {{ $coach->coach_github_profile }}
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