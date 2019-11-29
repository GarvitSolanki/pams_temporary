@extends('layouts.admin')
@section('content')
@can('coach_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.coaches.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.coach.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Coach', 'route' => 'admin.coaches.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.coach.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Coach">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_profile_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_alternate_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_alternate_phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_linkedin_profile') }}
                        </th>
                        <th>
                            {{ trans('cruds.coach.fields.coach_github_profile') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coaches as $key => $coach)
                        <tr data-entry-id="{{ $coach->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $coach->id ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_first_name ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_last_name ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ App\Coach::COACH_GENDER_RADIO[$coach->coach_gender] ?? '' }}
                            </td>
                            <td>
                                @if($coach->coach_profile_image)
                                    <a href="{{ $coach->coach_profile_image->getUrl() }}" target="_blank">
                                        <img src="{{ $coach->coach_profile_image->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $coach->coach_email ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_alternate_email ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_alternate_phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_linkedin_profile ?? '' }}
                            </td>
                            <td>
                                {{ $coach->coach_github_profile ?? '' }}
                            </td>
                            <td>
                                @can('coach_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.coaches.show', $coach->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('coach_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.coaches.edit', $coach->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('coach_delete')
                                    <form action="{{ route('admin.coaches.destroy', $coach->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

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
@can('coach_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.coaches.massDestroy') }}",
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
  $('.datatable-Coach:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection