@extends('layouts.admin.panel_table')

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">
        $(function() {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.user-management.users.massDestroy') }}",
                className: 'btn-danger btn-xs ml-3',
                action: function(e, dt, node, config) {
                    let ids = $.map(dt.rows({
                        selected: true
                    }).nodes(), function(entry) {
                        return $(entry).attr("id");
                    });
                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')
                        return
                    }
                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)

            $('#datatableUser').dataTable({
                order: [
                    [1, 'asc']
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                autoWidth: true,
                deferRender: true,
                sScrollXInner: "99.5%",
                ajax: "{{ route('admin.user-management.users.index') }}",
                columns: [{
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "0%"
                    },
                ],
                buttons: dtButtons,
                columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': false
                    }
                }],
            });

        });
    </script>
@endpushonce

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h1 class="title">{{ trans('cruds.user.title') }} {{ trans('global.list') }}</h1>
                    <div class="d-flex justify-content-end my-3">
                        <a href="{{ route('admin.user-management.users.create') }}" class="btn btn-sm btn-primary btn-add">
                            <i class="ri-add-line"></i> {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('partial.admin.alert')
        <table class="table table-borderless table-hover datatable" id="datatableUser">
            <thead>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.created_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.user_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.status') }}
                    </th>
                    <th>
                        {{ trans('global.action') }}
                    </th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
