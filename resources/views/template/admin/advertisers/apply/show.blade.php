@extends("layouts.admin.panel_app")

@pushonce('styles')

<style>
    .width-100 {
        width: 100px;
    }

    .table-social tbody tr td:not(:first-child) {
        text-align: left !important;
    }

    .card-header {
        padding: 0.75rem 1rem !important;
    }

    .card .card-header {
        text-transform: none !important;
        min-height: 40px !important;
    }

    .changelog__according .card .card-header {
        min-height: 40px !important;
        height: 40px !important;
    }

    .changelog__accordingCollapsed {
        height: 40px !important;
    }

    .v-num {
        font-size: 14px !important;
    }

    .btn-xs {
        line-height: 1.7 !important;
        font-size: 10px !important;
    }

    .table,
    .changelog__according .card:not(:last-child) {
        margin-bottom: 0 !important;
    }

    .social-dash-wrap .card.card-overview {
        margin-bottom: 5%;
    }

    .social-dash-wrap .card-body {
        padding: 0 !important;
    }

    .changelog__according {
        margin-top: 0 !important;
    }

    .width-15 {
        width: 15%;
    }

    .min-height-zero {
        min-height: 0
    }
</style>

@endpushonce

@pushonce('scripts')
<script>
    function openModal(status) {
        $("#status").val(status)
        $("#programStatus").html(`STATUS: ${status.toUpperCase()}`)
    }
</script>
@endpushonce

@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h1 class="title">{{ trans('global.show') }} {{ trans('advertiser.approval.title_singular') }}</h1>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="approval-glass-card card">
                <div class="approval-header">
                    <div class="d-flex align-items-center gap-3">
                        <!-- Back button -->
                        <a href="{{ route("admin.approval.index", ['status' => $status->value]) }}"
                            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
                            style="width: 40px; height: 40px; cursor: pointer;">
                            <i class="ri-arrow-left-line text-white"></i>
                        </a>

                        <!-- Publisher name -->
                        <h4 class="mb-0">{{ $approval->publisher_name }}</h4>
                    </div>

                    <div class="card-tab btn-group nav nav-tabs">
                        <a class="btn btn-xs btn-white active border-light" id="overview_tab" data-toggle="tab" href="#overview" role="tab" area-controls="intro" aria-selected="true">
                            <i class="ri-information-line"></i> Info
                        </a>
                    </div>
                </div>

                <div class="approval-body">
                    @include("partial.admin.alert")
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-social">
                                <tbody>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.advertiser_name') }}</th>
                                        <td>{{ $approval->advertiser_name ?? "-" }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.publisher_name') }}</th>
                                        <td>{{ $approval->publisher_name ?? "-" }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.approver_name') }}</th>
                                        <td>{{ $approval->approver->name ?? "-" }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.website_url') }}</th>
                                        <td>
                                            <a href="{{ $approval->website->url ?? '#' }}" target="_blank" class="url-link">
                                                <i class="ri-external-link-line"></i>
                                                {{ $approval->website->url ?? "-" }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.status') }}</th>
                                        <td>
                                            @php
                                                $statusClass = 'status-pending';
                                                if ($approval->status === \App\Models\AdvertiserApply::STATUS_ACTIVE) {
                                                    $statusClass = 'status-active';
                                                } elseif ($approval->status === \App\Models\AdvertiserApply::STATUS_HOLD) {
                                                    $statusClass = 'status-hold';
                                                } elseif ($approval->status === \App\Models\AdvertiserApply::STATUS_REJECTED) {
                                                    $statusClass = 'status-rejected';
                                                }
                                            @endphp
                                            <span class="status-badge {{ $statusClass }}">
                                                {{ ucwords($approval->status ?? "-") }}
                                            </span>

                                            <div class="action-buttons">
                                                @if($approval->status != \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-basic"
                                                        onclick="openModal('{{ \App\Models\AdvertiserApply::STATUS_ACTIVE }}')"
                                                        class="btn-status btn-success">
                                                        <i class="ri-check-line"></i> Active
                                                    </a>
                                                @endif
                                                @if($approval->status != \App\Models\AdvertiserApply::STATUS_HOLD)
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-basic"
                                                        onclick="openModal('{{ \App\Models\AdvertiserApply::STATUS_HOLD }}')"
                                                        class="btn-status btn-info">
                                                        <i class="ri-time-line"></i> Hold
                                                    </a>
                                                @endif
                                                @if($approval->status != \App\Models\AdvertiserApply::STATUS_REJECTED)
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-basic"
                                                        onclick="openModal('{{ \App\Models\AdvertiserApply::STATUS_REJECTED }}')"
                                                        class="btn-status btn-danger">
                                                        <i class="ri-close-line"></i> Rejected
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.type') }}</th>
                                        <td>
                                            <span class="text-uppercase">{{ $approval->type ?? "-" }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.source') }}</th>
                                        <td>
                                            <span class="text-uppercase">{{ $approval->source ?? "-" }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.publisher_apply_message') }}</th>
                                        <td>
                                            <div class="message-content"
                                                style="background: rgba(123, 54, 181, 0.05); padding: 1rem; border-radius: 8px; border-left: 3px solid var(--primary-color);">
                                                {{ $approval->message ?? "-" }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('advertiser.approval.fields.reject_approve_reason') }}</th>
                                        <td>
                                            @if($approval->reject_approve_reason)
                                                <div class="reason-content"
                                                    style="background: rgba(220, 53, 69, 0.05); padding: 1rem; border-radius: 8px; border-left: 3px solid #dc3545;">
                                                    {{ $approval->reject_approve_reason }}
                                                </div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route("admin.approval.statusUpdate") }}" method="POST">
                @csrf
                <input type="hidden" id="a_id" name="a_id[]" value="{{ $approval->id }}">
                <input type="hidden" id="status" name="status">
                <input type="hidden" id="current_status" name="current_status" value="{{ $status->value }}">
                <div class="modal-content modal-bg-white ">
                    <div class="modal-header">
                        <h6 class="modal-title">Approve To Program</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span data-feather="x"></span></button>
                    </div>
                    <div class="modal-body">
                        <h6 class="ap-nameAddress__title text-black" id="programStatus"></h6>
                        <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0"
                            id="advertiserID"></h6>
                        <p class="font-weight-bold mt-3 text-black">Optional: Tell us about the reason of Approval /
                            Rejection / Hold.</p>
                        <textarea class="form-control" rows="4" cols="4" name="message"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection