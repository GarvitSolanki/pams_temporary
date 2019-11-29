@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.spoc.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.id') }}
                        </th>
                        <td>
                            {{ $spoc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_first_name') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_last_name') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_age') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_date_of_birth') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_gender') }}
                        </th>
                        <td>
                            {{ App\Spoc::SPOC_GENDER_RADIO[$spoc->spoc_gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_email') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_alternate_email') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_alternate_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_phone_number') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_alternate_phone_number') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_alternate_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_profile_image') }}
                        </th>
                        <td>
                            @if($spoc->spoc_profile_image)
                                <a href="{{ $spoc->spoc_profile_image->getUrl() }}" target="_blank">
                                    <img src="{{ $spoc->spoc_profile_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_linkedin_profile') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_linkedin_profile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_github_profile') }}
                        </th>
                        <td>
                            {{ $spoc->spoc_github_profile }}
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