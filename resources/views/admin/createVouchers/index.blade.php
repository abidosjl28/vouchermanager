@extends('layouts.admin')
@section('content')
<div class="content">
    @can('create_voucher_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.create-vouchers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.createVoucher.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.createVoucher.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CreateVoucher">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.agent') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.client') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.is_adult') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.arrivaldate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.departuredate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.have_children') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.hotel_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.room_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.number_of_room') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.night') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.room_price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.total_amount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.payment_mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.observation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.service') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.internal_note') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($clients as $key => $item)
                                                <option value="{{ $item->fullname }}">{{ $item->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\CreateVoucher::IS_ADULT_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\CreateVoucher::HAVE_CHILDREN_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($hotels as $key => $item)
                                                <option value="{{ $item->hotel_name }}">{{ $item->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\CreateVoucher::ROOM_TYPE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\CreateVoucher::PAYMENT_MODE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($createVouchers as $key => $createVoucher)
                                    <tr data-entry-id="{{ $createVoucher->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $createVoucher->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->agent->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->client->fullname ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\CreateVoucher::IS_ADULT_SELECT[$createVoucher->is_adult] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->arrivaldate ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->departuredate ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\CreateVoucher::HAVE_CHILDREN_SELECT[$createVoucher->have_children] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->hotel_name->hotel_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\CreateVoucher::ROOM_TYPE_SELECT[$createVoucher->room_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->number_of_room ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->night ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->room_price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->total_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\CreateVoucher::PAYMENT_MODE_SELECT[$createVoucher->payment_mode] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->observation ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->service ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createVoucher->internal_note ?? '' }}
                                        </td>
                                        <td>
                                            @can('create_voucher_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.create-vouchers.show', $createVoucher->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('create_voucher_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.create-vouchers.edit', $createVoucher->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('create_voucher_delete')
                                                <form action="{{ route('admin.create-vouchers.destroy', $createVoucher->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('create_voucher_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.create-vouchers.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CreateVoucher:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection