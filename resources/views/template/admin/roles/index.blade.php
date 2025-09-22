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
                url: "{{ route('admin.user-management.roles.massDestroy') }}",
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

            $('#datatableRole').dataTable({
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
                ajax: "{{ route('admin.user-management.roles.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'permissions',
                        name: 'permissions'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "0%"
                    },
                ],
                buttons: dtButtons
            });

        });
    </script>
@endpushonce

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">{{ trans('cruds.role.title') }} {{ trans('global.list') }}</h1>
                <div class="d-flex justify-content-end my-3">
                    <a href="{{ route('admin.user-management.roles.create') }}" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                    </a>
                </div>
            </div>
        </div>
        @include('partial.admin.alert')

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableRole">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                {{ trans('cruds.role.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.permissions') }}
                            </th>
                            <th>
                                {{ trans('global.action') }}
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
