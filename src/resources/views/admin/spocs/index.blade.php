@extends('layouts.admin')
@section('content')
@can('spoc_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.spocs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.spoc.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Spoc', 'route' => 'admin.spocs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.spoc.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Spoc">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_age') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_alternate_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_alternate_phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_profile_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_linkedin_profile') }}
                        </th>
                        <th>
                            {{ trans('cruds.spoc.fields.spoc_github_profile') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($spocs as $key => $spoc)
                        <tr data-entry-id="{{ $spoc->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $spoc->id ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_first_name ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_last_name ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_age ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ App\Spoc::SPOC_GENDER_RADIO[$spoc->spoc_gender] ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_email ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_alternate_email ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_alternate_phone_number ?? '' }}
                            </td>
                            <td>
                                @if($spoc->spoc_profile_image)
                                    <a href="{{ $spoc->spoc_profile_image->getUrl() }}" target="_blank">
                                        <img src="{{ $spoc->spoc_profile_image->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $spoc->spoc_linkedin_profile ?? '' }}
                            </td>
                            <td>
                                {{ $spoc->spoc_github_profile ?? '' }}
                            </td>
                            <td>
                                @can('spoc_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.spocs.show', $spoc->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('spoc_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.spocs.edit', $spoc->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('spoc_delete')
                                    <form action="{{ route('admin.spocs.destroy', $spoc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('spoc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.spocs.massDestroy') }}",
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
  $('.datatable-Spoc:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection