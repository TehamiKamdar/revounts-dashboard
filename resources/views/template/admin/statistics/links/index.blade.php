@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
<script type="text/javascript">
    $(function () {

        $('#datatableStatisticLink').dataTable({
            order: [[0, 'asc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "99.5%",
            ajax: {
                url: "{{ route('admin.statistics.links.index') }}",
                data: function (d) {

                }
            },
            columns: [
                { data: 'publisher_name', name: 'publisher_name' },
                { data: 'advertiser_name', name: 'advertiser_name' },
                { data: 'website_name', name: 'website_name' },
                { data: 'last_activity', name: 'last_activity' },
                { data: 'hits', name: 'hits' },
                { data: 'unique_visitor', name: 'unique_visitor' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
            ],
            columnDefs: [{
                // orderable: false,
                // className: '',
                // targets: 0
            }, {
            }],
            buttons: [{}]
        });

    });
</script>
@endpushonce

@section("content")


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">{{ trans('link.statistics.links.title') }} {{ trans('global.list') }}</h1>
            </div>
        </div>

        @include("partial.admin.alert")

        <table class="table table-borderless table-hover datatable" id="datatableStatisticLink">
            <thead>
                <tr>
                    <th>
                        {{ trans('link.statistics.links.fields.publisher_name') }}
                    </th>
                    <th>
                        {{ trans('link.statistics.links.fields.advertiser_name') }}
                    </th>
                    <th>
                        {{ trans('link.statistics.links.fields.website_name') }}
                    </th>
                    <th>
                        {{ trans('link.statistics.links.fields.last_activity') }}
                    </th>
                    <th>
                        {{ trans('link.statistics.links.fields.hits') }}
                    </th>
                    <th>
                        {{ trans('link.statistics.links.fields.unique_visitor') }}
                    </th>
                    <th>
                        {{ trans('global.action') }}
                    </th>
                </tr>
            </thead>
        </table>
    </div>
@endsection