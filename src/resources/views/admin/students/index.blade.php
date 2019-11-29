@extends('layouts.admin')
@section('content')
@can('student_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.students.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Student', 'route' => 'admin.students.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.student.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Student">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.student.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_last_name') }}
                        </th>

                        <th>
                            {{ trans('cruds.student.fields.student_branch') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_semester') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_alternate_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_alternate_phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_linkedin_profile') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.student_github_profile') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $key => $student)
                        <tr data-entry-id="{{ $student->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $student->id ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_first_name ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_last_name ?? '' }}
                            </td>


                            <td>
                                {{ $student->student_branch ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_year ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_semester ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_email ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_alternate_email ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_alternate_phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_address ?? '' }}
                            </td>
                            <td>
                                {{ $student->student_linkedin_profile ?? '' }}
                            </td>
                            <td>
                                <a target="_blank" href="{{ $student->student_github_profile ?? ''  }}">{{ $student->student_github_profile ?? '' }}</a>
                            </td>

                            <td>
                                <div class="card">
                                @can('student_show')
                                    <a class="btn btn-xs btn-outline-primary" href="{{ route('admin.students.show', $student->id) }}">
                                        {{ trans('global.view') }}
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan

                                @can('student_edit')
                                    <a class="btn btn-xs btn-outline-dark" href="{{ route('admin.students.edit', $student->id) }}">
                                        {{ trans('global.edit') }}
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan

                                @can('student_delete')

                                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <input type="submit" class="btn btn-xs btn-outline-danger" value="{{ trans('global.delete') }}">
                                        </form>


                                    @endcan

                            </td>
        </div>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.students.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  $('.datatable-Student:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
