@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.student.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.id') }}
                        </th>
                        <td>
                            {{ $student->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_first_name') }}
                        </th>
                        <td>
                            {{ $student->student_first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_last_name') }}
                        </th>
                        <td>
                            {{ $student->student_last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_age') }}
                        </th>
                        <td>
                            {{ $student->student_age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_date_of_birth') }}
                        </th>
                        <td>
                            {{ $student->student_date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_gender') }}
                        </th>
                        <td>
                            {{ App\Student::STUDENT_GENDER_RADIO[$student->student_gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_profile_image') }}
                        </th>
                        <td>
                            @if($student->student_profile_image)
                                <a href="{{ $student->student_profile_image->getUrl() }}" target="_blank">
                                    <img src="{{ $student->student_profile_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_branch') }}
                        </th>
                        <td>
                            {{ $student->student_branch }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_year') }}
                        </th>
                        <td>
                            {{ $student->student_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_semester') }}
                        </th>
                        <td>
                            {{ $student->student_semester }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_email') }}
                        </th>
                        <td>
                            {{ $student->student_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_alternate_email') }}
                        </th>
                        <td>
                            {{ $student->student_alternate_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_phone_number') }}
                        </th>
                        <td>
                            {{ $student->student_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_alternate_phone_number') }}
                        </th>
                        <td>
                            {{ $student->student_alternate_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_address') }}
                        </th>
                        <td>
                            {{ $student->student_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_linkedin_profile') }}
                        </th>
                        <td>
                            {{ $student->student_linkedin_profile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_github_profile') }}
                        </th>
                        <td>
                            {{ $student->student_github_profile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.student_aadhar_number') }}
                        </th>
                        <td>
                            {{ $student->student_aadhar_number }}
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