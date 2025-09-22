@extends("layouts.admin.panel_table")

@pushonce('styles')
<style>
</style>
@endpushonce

@pushonce('scripts')
<script type="text/javascript">

    function sendStatusData(ids, status) {
        $.ajax({
            url: "{{ route('admin.approval.statusUpdate') }}",
            type: 'POST',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data: { a_id: ids, status: status }
        }).done(function () { location.reload() });
    }

    $(function () {

        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        function statusChange(status, approveButtonTrans, color) {
            let approveButton = {
                text: approveButtonTrans,
                className: `btn-${color} btn-xs ml-3`,
                action: function (e, dt, node, config) {
                    let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).attr("id");
                    });
                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')
                        return
                    }
                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        sendStatusData(ids, status)
                    }
                }
            }
            dtButtons.push(approveButton)
        }

        @if($status->value == \App\Models\AdvertiserApply::STATUS_PENDING)

            statusChange("{{ \App\Models\AdvertiserApply::STATUS_ACTIVE }}", "Approve", "success")
            statusChange("{{ \App\Models\AdvertiserApply::STATUS_HOLD }}", "Hold", "info")
            statusChange("{{ \App\Models\AdvertiserApply::STATUS_REJECTED }}", "Reject", "danger")

        @elseif($status->value == \App\Models\AdvertiserApply::STATUS_REJECTED)

            statusChange("{{ \App\Models\AdvertiserApply::STATUS_ACTIVE }}", "Approve", "success")
            statusChange("{{ \App\Models\AdvertiserApply::STATUS_HOLD }}", "Hold", "info")

        @elseif($status->value == \App\Models\AdvertiserApply::STATUS_HOLD || $status->value == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD)

            statusChange("{{ \App\Models\AdvertiserApply::STATUS_ACTIVE }}", "Approve", "success")
            statusChange("{{ \App\Models\AdvertiserApply::STATUS_REJECTED }}", "Reject", "danger")

        @elseif($status->value == \App\Models\AdvertiserApply::STATUS_ACTIVE)

            statusChange("{{ \App\Models\AdvertiserApply::STATUS_HOLD }}", "Hold", "info")
            statusChange("{{ \App\Models\AdvertiserApply::STATUS_REJECTED }}", "Reject", "danger")

        @endif

        $('#datatableApplyAdvertiser').dataTable({
            order: [[8, 'desc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            processing: true,
            serverSide: true,
            sScrollXInner: "99.5%",
            pageLength: 50,  // Set default pagination to 50 per page
            lengthMenu: [25, 50, 100, 200],  // Allow users to choose 25, 50, 100, or 200 per page
            ajax: {
                url: "{{ route('admin.approval.index', ['status' => $status->value]) }}",
                data: function (d) {
                    d.source = $('#source').val();
                    d.country = $('#country').val();
                    d.on_demand_status = $('#on_demand_status').val();
                }
            },
            columns: [
                { data: 'id', name: 'id', width: "1%" },
                { data: 'created_at', name: 'created_at' },
                { data: 'source', name: 'source' },
                { data: 'advertiser_sid', name: 'advertiser_sid' },
                { data: 'advertiser_name', name: 'advertiser_name' },
                { data: 'publisher_website', name: 'publisher_website', orderable: false, searchable: false },
                { data: 'primary_region', name: 'primary_region' },
                { data: 'type', name: 'type' },
                { data: 'on_demand_status', name: 'on_demand_status' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
            ],
            buttons: dtButtons
        });

        $('#on_demand_status').change(() => {
            $('#datatableApplyAdvertiser').DataTable().draw();
        });

        $('#source').change(() => {
            $('#datatableApplyAdvertiser').DataTable().draw();
            $(this).val();
        });

        $('#country').change(() => {
            $('#datatableApplyAdvertiser').DataTable().draw();
        });
    });
</script>
@endpushonce

@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1 class="title">{{ trans('advertiser.approval.title') }} {{ ucwords(str_replace("_", " ", $status->value)) }}
                {{ trans('global.list') }}</h1>
                <!-- Horizontal Filters -->
                <div class="horizontal-filters">
                    <div class="filter-header">
                        <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                    </div>

                    <div class="filter-grid">

                        <!-- Country Filter -->
                        <div class="filter-card">
                            <div class="filter-title">
                                <h6>Demand Status</h6>
                            </div>
                            <select class="js-example-basic-single js-states form-control" id="on_demand_status"
                                name="on_demand_status">
                                <option value="" disabled selected>Select On Demand Status</option>
                                <option value="active">Active</option>
                                <option value="not_active">Not Active</option>
                            </select>
                        </div>

                        <!-- Advertiser Type Filter -->
                        <div class="filter-card">
                            <div class="filter-title">
                                <h6>Source</h6>
                            </div>
                            <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                <option value="" disabled selected>Select Source</option>
                                @foreach(\App\Helper\Static\Vars::OPTION_LIST as $list)
                                    <option value="{{ $list }}">{{ ucwords($list) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Category Filter -->
                        <div class="filter-card">
                            <div class="filter-title">
                                <h6>Country</h6>
                            </div>
                            <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                <option value="" disabled selected>Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row mb-5">

            @include("partial.admin.alert")

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover datatable" id="datatableApplyAdvertiser">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    {{ trans('advertiser.approval.fields.created_at') }}
                                </th>
                                <th>
                                    {{ trans('advertiser.approval.fields.network_name') }}
                                </th>
                                <th>
                                    {{ trans('advertiser.approval.fields.advertiser_id') }}
                                </th>
                                <th>
                                    {{ trans('advertiser.approval.fields.advertiser_name') }}
                                </th>
                                <th>
                                    {{ trans('advertiser.approval.fields.publisher_website') }}
                                </th>
                                <th>
                                    {{ trans('advertiser.approval.fields.primary_region') }}
                                </th>
                                <th>
                                    {{ trans('advertiser.approval.fields.type') }}
                                </th>
                                <th>
                                    {{ trans('advertiser.approval.fields.on_demand_status') }}
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
    </div>


@endsection