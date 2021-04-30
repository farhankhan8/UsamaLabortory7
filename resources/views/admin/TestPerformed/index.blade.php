@extends('layouts.admin')
@section('content')
@can('event_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("create") }}">
            Performed New Test
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
    List of Performed Tests
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                        Id
                        </th>
                        <th>
                        Test Catagory
                        </th>
                        <th>
                        Test Name
                        </th>
                        <th>
                        Patient Name
                        </th>
                        <th>
                        Test Fee
                        </th>
                        <th>
                        Normal Range
                        </th>
                        <th>
                        Start Time
                        </th>
                        <th>
                        Status
                        </th>
                      
                      
                      
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testPerformeds as $key => $testPerformed)
                        <tr data-entry-id="{{ $testPerformed->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $testPerformed->id ?? '' }}
                            </td>
                            <td>
                                {{ $testPerformed->Cname }}
                            </td>
                            <td>
                                {{ $testPerformed->name }}
                            </td>
                            <td>
                            {{ $testPerformed->Pname }}

                            </td>
                            <td>
                            {{ $testPerformed->testFee }}

                            </td>
                            <td>
                            {{ $testPerformed->initialNormalValue }}{{ $testPerformed->units }}-{{ $testPerformed->finalNormalValue }}{{ $testPerformed->units }}



                            </td>
                            <td>
                            {{ $testPerformed->dob }}

                            </td>
                            <td>
                            @if ($testPerformed->state =='Progressing')
                            <button class="btn btn-xs btn-info">{{ $testPerformed->state ?? '' }}</button>
                               @elseif ($testPerformed->state =='Verified')
                               <button class="btn btn-xs btn-primary">{{ $testPerformed->state ?? '' }}</button>
                          
                               @elseif ($testPerformed->state =='Not Received')
                               <button class="btn btn-xs  btn-warning">{{ $testPerformed->state ?? '' }}</button>
                               @elseif ($testPerformed->state =='Cancelled')
                               <button class="btn btn-xs btn-danger">{{ $testPerformed->state ?? '' }}</button>
                             @else
                             I don't have any records!
                                 @endif
                            </td>
                       
                            <td>
                                @can('event_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('test-performed-show', $testPerformed->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('event_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('test-performed-edit', $testPerformed->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                            

                                @can('event_delete')
                                    <form  method="POST" action="{{ route("performed-test-delete", [$testPerformed->id]) }}" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"  style="display: inline-block;">
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
@can('event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.events.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Event:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection