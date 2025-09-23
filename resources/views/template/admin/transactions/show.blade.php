@extends("layouts.admin.panel_app")

@pushonce('styles')

<style>
    /* Main Layout Structure */
    .page-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 20px 0;
    }

    .page-wrapper {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Breadcrumb Section */
    .breadcrumb-modern {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 1.5rem 2rem;
        margin-bottom: 24px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .breadcrumb-main {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .breadcrumb-title {
        color: var(--primary-dark-color);
        font-weight: 600;
        font-size: 1.75rem;
        margin: 0;
    }

    .breadcrumb-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .action-btn-modern {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(123, 54, 181, 0.2);
        border-radius: 10px;
        padding: 0.75rem 1.25rem;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .action-btn-modern:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(123, 54, 181, 0.2);
    }

    /* Main Content Card */
    .content-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 24px;
    }

    /* Card Header */
    .card-header-modern {
        background: linear-gradient(135deg, rgba(123, 54, 181, 0.1) 0%, rgba(123, 54, 181, 0.05) 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(123, 54, 181, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .card-title-modern {
        color: var(--primary-dark-color);
        font-weight: 600;
        font-size: 1.5rem;
        margin: 0;
    }

    /* Tab Navigation */
    .tab-nav-modern {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 12px;
        padding: 0.5rem;
        border: 1px solid rgba(123, 54, 181, 0.2);
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem;
    }

    .tab-btn-modern {
        padding: 0.75rem 1.25rem;
        border: none;
        background: transparent;
        color: var(--dark-color);
        font-weight: 500;
        font-size: 0.85rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .tab-btn-modern:hover,
    .tab-btn-modern.active {
        background: var(--primary-color);
        color: white;
        box-shadow: 0 4px 12px rgba(123, 54, 181, 0.2);
    }

    /* Tab Content */
    .tab-content-modern {
        padding: 0;
    }

    .tab-pane-modern {
        padding: 1rem;
        min-height: 130px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .page-wrapper {
            padding: 0 20px;
        }
    }

    @media (max-width: 768px) {
        .breadcrumb-main {
            flex-direction: column;
            align-items: flex-start;
        }

        .breadcrumb-actions {
            width: 100%;
            justify-content: flex-start;
        }

        .card-header-modern {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .tab-nav-modern {
            width: 100%;
            overflow-x: auto;
        }

        .tab-btn-modern {
            white-space: nowrap;
            font-size: 0.8rem;
            padding: 0.6rem 1rem;
        }

        .tab-pane-modern {
            padding: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .breadcrumb-modern {
            padding: 1rem;
        }

        .card-header-modern {
            padding: 1rem;
        }

        .tab-pane-modern {
            padding: 1rem;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .content-card {
        animation: fadeIn 0.5s ease-out;
    }
</style>

@endpushonce

@section("content")
    <div class="container-fluid">
        <h1 class="title">{{ trans('global.show') }} {{ trans('cruds.transaction.title_singular') }}</h1>
        <a href="{{ route("admin.transactions.index") }}"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>
        <!-- Main Content Card -->
        <div class="content-card">
            <!-- Card Header with Tabs -->
            <div class="card-header card-header-modern">
                <h2 class="card-title-modern">Transaction ID: {{ $transaction->transaction_id }}</h2>

                <div class="tab-nav-modern nav" role="tablist">
                    <a class="tab-btn-modern active" style="cursor:pointer;" id="overview_tab" data-bs-toggle="tab"
                        data-bs-target="#overview" role="tab" area-controls="intro" aria-selected="true">
                        <i class="ri-information-line"></i> Intro
                    </a>
                    <a class="tab-btn-modern" style="cursor:pointer;" id="commission_rates-tab" data-bs-toggle="tab"
                        data-bs-target="#commission_rates" role="tab" aria-controls="detail" aria-selected="false">
                        <i class="ri-file-text-line"></i> Tracking Detail
                    </a>
                    <a class="tab-btn-modern" id="terms-tab" data-bs-toggle="tab" data-bs-target="#terms"
                        role="tab" area-controls="terms" aria-selected="false">
                        <i class="ri-file-text-line"></i> Text</a>
                </div>
            </div>
            <div class="card-body p-0">

                @include("partial.admin.alert")

                <div class="tab-content">
                    <div class="tab-pane tab-pane-modern fade active show" id="overview" role="" aria-labelledby="overview_tab">
                        <div class="table-responsive">
                            <table class="table table-borderless table-social">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $transaction->transaction_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.advertiser_name') }}
                                        </th>
                                        <td>
                                            {{ $transaction->advertiser->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.campaign_name') }}
                                        </th>
                                        <td>
                                            {{ $transaction->campaign_name ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.site_name') }}
                                        </th>
                                        <td>
                                            {{ $transaction->site_name ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.url') }}
                                        </th>
                                        <td>
                                            {{ $transaction->url ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.publisher_url') }}
                                        </th>
                                        <td>
                                            {{ $transaction->publisher_url ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.publisher_id') }}
                                        </th>
                                        <td>
                                            {{ $transaction->publisher_id ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_sharing_publisher_id') }}
                                        </th>
                                        <td>
                                            {{ $transaction->commission_sharing_publisher_id ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_sharing_selected_rate_publisher_id') }}
                                        </th>
                                        <td>
                                            {{ $transaction->commission_sharing_selected_rate_publisher_id ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.payment_id') }}
                                        </th>
                                        <td>
                                            {{ $transaction->payment_id ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.transaction_query_id') }}
                                        </th>
                                        <td>
                                            {{ $transaction->transaction_query_id ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.customer_country') }}
                                        </th>
                                        <td>
                                            {{ $transaction->customer_country ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.click_refs') }}
                                        </th>
                                        <td>
                                            @if (!empty($transaction->click_refs))
                                                {{ is_array($transaction->click_refs) ? implode(" | ", $transaction->click_refs) : $transaction->click_refs }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.click_date') }}
                                        </th>
                                        <td>
                                            {{ $transaction->click_date ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.transaction_date') }}
                                        </th>
                                        <td>
                                            {{ $transaction->transaction_date ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.validation_date') }}
                                        </th>
                                        <td>
                                            {{ $transaction->validation_date ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.voucher_code') }}
                                        </th>
                                        <td>
                                            {{ $transaction->voucher_code ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.lapse_time') }}
                                        </th>
                                        <td>
                                            {{ $transaction->lapse_time ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.click_device') }}
                                        </th>
                                        <td>
                                            {{ $transaction->click_device ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.advertiser_country') }}
                                        </th>
                                        <td>
                                            {{ $transaction->advertiser_country ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.order_ref') }}
                                        </th>
                                        <td>
                                            {{ $transaction->order_ref ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.ip_hash') }}
                                        </th>
                                        <td>
                                            {{ $transaction->ip_hash ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.source') }}
                                        </th>
                                        <td>
                                            {{ $transaction->source ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.custom_parameters') }}
                                        </th>
                                        <td>
                                            @php
                                                $params = $transaction->custom_parameters;

                                                if (is_string($params)) {
                                                    $params = json_decode($params, true); // Convert JSON string to array
                                                }
                                            @endphp

                                            @if(is_array($params))
                                                <ol>
                                                    @foreach($params as $item)
                                                        @if(isset($item['value']))
                                                            <li>{{ $item['value'] }}</li>
                                                        @endif
                                                    @endforeach
                                                </ol>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane tab-pane-modern fade" id="commission_rates" role="" aria-labelledby="commission_rates-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless table-social">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_type') }}
                                        </th>
                                        <td>
                                            {{ $transaction->commission_type ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_status') }}
                                        </th>
                                        <td>
                                            {{ ucwords($transaction->commission_status) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.received_sale_amount') }}
                                        </th>
                                        <td>
                                            {{ $transaction->received_sale_amount ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.received_commission') }}
                                        </th>
                                        <td>
                                            {{ $transaction->received_commission_amount ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.received_commission_amount_currency') }}
                                        </th>
                                        <td>
                                            {{ $transaction->received_commission_amount_currency ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_amount') }}
                                        </th>
                                        <td>
                                            {{ $transaction->commission_amount ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_amount_currency') }}
                                        </th>
                                        <td>
                                            {{ $transaction->commission_amount_currency ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.sale_amount') }}
                                        </th>
                                        <td>
                                            {{ $transaction->sale_amount ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.sale_amount_currency') }}
                                        </th>
                                        <td>
                                            {{ $transaction->sale_amount_currency ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.old_sale_amount') }}
                                        </th>
                                        <td>
                                            {{ $transaction->old_sale_amount ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.old_commission_amount') }}
                                        </th>
                                        <td>
                                            {{ $transaction->old_commission_amount ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.tracked_currency_amount') }}
                                        </th>
                                        <td>
                                            {{ $transaction->tracked_currency_amount ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.tracked_currency_currency') }}
                                        </th>
                                        <td>
                                            {{ $transaction->tracked_currency_currency ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.paid_to_publisher') }}
                                        </th>
                                        <td>
                                            {{ $transaction->paid_to_publisher ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.original_sale_amount') }}
                                        </th>
                                        <td>
                                            {{ $transaction->original_sale_amount ?? "-" }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane tab-pane-modern fade" id="terms" role="" aria-labelledby="terms-tab">
                        <div class="table-responsive">
                            <table class="table table-borderless table-social">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.amended_reason') }}
                                        </th>
                                        <td>
                                            {!! $transaction->amended_reason ?? "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.decline_reason') }}
                                        </th>
                                        <td>
                                            {!! $transaction->decline_reason ?? "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.transaction.fields.customer_acquisition') }}
                                        </th>
                                        <td>
                                            {!! $transaction->customer_acquisition ?? "-" !!}
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
@endsection