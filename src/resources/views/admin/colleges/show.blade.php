@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.college.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.id') }}
                        </th>
                        <td>
                            {{ $college->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.college_name') }}
                        </th>
                        <td>
                            {{ $college->college_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.college_website') }}
                        </th>
                        <td>
                            {{ $college->college_website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.college_address') }}
                        </th>
                        <td>
                            {{ $college->college_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.college_phone_number') }}
                        </th>
                        <td>
                            {{ $college->college_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.college_email') }}
                        </th>
                        <td>
                            {{ $college->college_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.college_university') }}
                        </th>
                        <td>
                            {{ $college->college_university }}
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