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
    @php
        $mix = new \App\Models\Mix();
        $methods = $mix->whereIn("id", $api_advertiser->promotional_methods ?? [])->get()->pluck("name")->toArray();
        $restrictions = $mix->whereIn("id", $api_advertiser->program_restrictions ?? [])->get()->pluck("name")->toArray();
        $categories = $mix->whereIn("id", $api_advertiser->categories ?? [])->get()->pluck("name")->toArray();
    @endphp

    <div class="container-fluid">
        <h1 class="title">{{ trans('global.show') }} {{ trans('advertiser.api-advertiser.title_singular') }}</h1>
        <a href="{{ route("admin.advertiser-management.api-advertisers.index") }}"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>
        <!-- Main Content Card -->
        <div class="content-card">
            <!-- Card Header with Tabs -->
            <div class="card-header-modern">
                <h2 class="card-title-modern">
                    <i class="ri-user-3-line"></i>{{ $api_advertiser->name }}
                </h2>

                <div class="tab-nav-modern nav" role="tablist">
                    <a class="tab-btn-modern active" style="cursor:pointer;" id="overview_tab" data-bs-toggle="tab"
                        data-bs-target="#overview" role="tab" area-controls="intro" aria-selected="true">
                        <i class="ri-information-line"></i> Overview
                    </a>
                    <a class="tab-btn-modern" style="cursor:pointer;" id="commission_rates-tab" data-bs-toggle="tab"
                        data-bs-target="#commission_rates" role="tab" area-controls="commission_rates"
                        aria-selected="false">
                        <i class="ri-file-text-line"></i> Commission Rates
                    </a>
                    <a class="tab-btn-modern" style="cursor:pointer;" id="terms-tab" data-bs-toggle="tab"
                        data-bs-target="#terms" role="tab" area-controls="terms" aria-selected="false">
                        <i class="ri-folder-2-line"></i> Terms
                    </a>
                </div>

            </div>

            @include("partial.admin.alert")

            <div class="tab-content">
                <div class="tab-pane tab-pane-modern fade show active" id="overview" role="tabpanel" aria-labelledby="overview_tab">

                        <div class="table-responsive">
                            <table class="table table-borderless table-social">

                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.logo') }}
                                        </th>
                                        <td>
                                            <img src="{{ \App\Helper\Static\Methods::isImageShowable($api_advertiser->logo) }}"
                                                alt="{{ $api_advertiser->name }}" class="width-100">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.network_advertiser_id') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->advertiser_id ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.our_advertiser_id') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->sid ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->name ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.primary_region') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->primary_regions ? implode(" | ", $api_advertiser->primary_regions) : "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.country_full_name') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->country_full_name ? implode(" | ", $api_advertiser->country_full_name) : "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.currency_code') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->currency_code ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.average_payment_time') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->average_payment_time ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.validation_days') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->validation_days ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.goto_cookie_lifetime') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->goto_cookie_lifetime ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.epc') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->epc ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.source_type') }}
                                        </th>
                                        <td>
                                            {{ strtoupper($api_advertiser->type) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.deeplink_enabled') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->deeplink_enabled ? "true" : "false" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.exclusive') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->exclusive ? "true" : "false" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.status') }}
                                        </th>
                                        <td>
                                            @if($api_advertiser->status == 1)
                                                Active
                                            @elseif($api_advertiser->status == 2)
                                                Hold
                                            @else
                                                Not Active
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.commission') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->commission ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.commission_type') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->commission_type ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.url') }}
                                        </th>
                                        <td>
                                            @php
                                                $url = "-";
                                                $href = "-";
                                                if (isset($api_advertiser->url)):
                                                    $url = $api_advertiser->url;
                                                    $href = route("redirect.url") . "?url=" . urlencode($url);
                                                endif;
                                            @endphp
                                            <a href="{{ $href }}" target="_blank">{{ $url }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.click_through_url') }}
                                        </th>
                                        <td>
                                            <a href="{{ $api_advertiser->click_through_url ?? "-" }}"
                                                target="_blank">{{ $api_advertiser->click_through_url ?? "-" }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.tracking_url_short') }}
                                        </th>
                                        <td>
                                            <a href="{{ $api_advertiser->tracking_url_short ?? "-" }}"
                                                target="_blank">{{ $api_advertiser->tracking_url_short ?? "-" }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.valid_domains') }}
                                        </th>
                                        <td>
                                            {!! $api_advertiser->valid_domains ? "<ol><li>" . implode("</li><li>", $api_advertiser->valid_domains) . "</li></ol>" : "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.promotional_methods') }}
                                        </th>
                                        <td>
                                            {!! $methods ? "<ol><li>" . implode("</li><li>", $methods) . "</li></ol>" : "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.program_restrictions') }}
                                        </th>
                                        <td>
                                            {!! $restrictions ? "<ol><li>" . implode("</li><li>", $restrictions) . "</li></ol>" : "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.categories') }}
                                        </th>
                                        <td>
                                            {!! $categories ? "<ol><li>" . implode("</li><li>", $categories) . "</li></ol>" : "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.tags') }}
                                        </th>
                                        <td>
                                            {!! $api_advertiser->tags ? "<ol><li>" . implode("</li><li>", $api_advertiser->tags) . "</li></ol>" : "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.offer_type') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->offer_type ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.supported_regions') }}
                                        </th>
                                        <td>
                                            {!! $api_advertiser->supported_regions ? "<ol><li>" . implode("</li><li>", $api_advertiser->supported_regions) . "</li></ol>" : "-" !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.source') }}
                                        </th>
                                        <td>
                                            {{ $api_advertiser->source ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Description
                                        </th>
                                        <td>
                                            {{ $api_advertiser->description ?? "-" }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
                <div class="tab-pane tab-pane-modern fade" id="commission_rates" role="tabpanel" aria-labelledby="commission_rates-tab">

                        <div class="table-responsive">
                            <table class="table table-borderless table-social">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Condition</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Additional Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($api_advertiser->commissions as $commission)
                                        <tr>
                                            <td>
                                                {{ $commission->date ?? "-" }}
                                            </td>
                                            <td>
                                                {{ $commission->condition ?? "-" }}
                                            </td>
                                            <td>
                                                {{ $commission->rate ?? "-" }}
                                            </td>
                                            <td>
                                                {{ $commission->type ?? "-" }}
                                            </td>
                                            <td>
                                                {{ $commission->info ?? "-" }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                </div>
                <div class="tab-pane tab-pane-modern fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">

                        <div class="table-responsive">
                            <table class="table table-borderless table-social ">

                                <tbody>
                                    <tr>
                                        <th>
                                            Program Terms
                                        </th>
                                        <td>
                                            {!! $api_advertiser->program_policies ?? "-" !!}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection