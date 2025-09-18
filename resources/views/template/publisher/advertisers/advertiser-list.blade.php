@php
    $checkAdmin = auth()->user()->getRoleName() != \App\Models\Role::ADMIN_ROLE
@endphp
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th scope="col">
                        Advertiser
                    </th>
                    <th scope="col">
                        Commission
                    </th>
                    <th scope="col">
                        Region
                    </th>
                    <th scope="col">
                        APC
                    </th>
                    @if($checkAdmin)
                        <th>
                        </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(count($advertisers))
                    @foreach($advertisers as $advertiser)
                        <tr>
                            <td class="img-td">

            <a href="{{ route('publisher.view-advertiser', ['sid' => $advertiser->sid]) }}" class="text-primary-light fw-500 me-3">
                @php
                    $fetch = \App\Models\Advertiser::find($advertiser->id);
                @endphp
                @if (!empty($fetch->fetch_logo_url))
                    <img loading="lazy" class="rounded me-3" src="{{ $fetch->fetch_logo_url }}" alt="{{ $advertiser->name }}" style="width: 60px; height: 60px; object-fit: contain;">
                @else
                    <img loading="lazy" class="rounded me-3" src="{{ \App\Helper\Static\Methods::isImageShowable($advertiser->logo) }}" alt="{{ $advertiser->name }}" style="width: 60px; height: 60px; object-fit: contain;">
                @endif
            </a>
                            </td>
    <td>
                <a href="{{ route('publisher.view-advertiser', ['sid' => $advertiser->sid]) }}" class="text-primary-light fw-500 text-decoration-none">
                    <h6 class="mb-1">{{ $advertiser->name }}</h6>
                </a>
                <p class="mb-0 small">
                    <a href="{{ $advertiser->url }}" target="_blank" class="text-primary">
                        <i class="ri-external-link-line align-middle"></i> View website
                    </a>
                </p>
    </td>
    <td>
            <span class="text-primary-light">{{ $advertiser->commission }}
{{ $advertiser->commission_type == "percentage" && !Str::endsWith($advertiser->commission, '%') ? '%' : ($advertiser->commission_type != "percentage" ? $advertiser->commission_type : '') }}
</span>
    </td>
    <td>
            @php
                $regions = [];
                if(is_string($advertiser->primary_regions))
                {
                    $regions = json_decode($advertiser->primary_regions);
                }
                elseif (is_array($advertiser->primary_regions))
                {
                    $regions = $advertiser->primary_regions;
                }
                if(count($regions) > 1) {
                    $regions = "Multi";
                } elseif (count($regions) == 1 && $regions[0] == "00") {
                    $regions = "All";
                } elseif (count($regions) == 1) {
                    $regions = $regions[0];
                } else {
                    $regions = "-";
                }
            @endphp
            <span class="text-primary-light fw-semibold">{{ $regions && $regions != '-' ? $regions.' Region' : 'No Record' }}</span>

    </td>
    <td>
            @if($advertiser->average_payment_time)
                <span class="text-primary-light fw-semibold">{{ $advertiser->average_payment_time }} days</span>
            @else
                <span class="text-primary-light">-</span>
            @endif
    </td>
    <td>
        <div class="d-flex justify-content-center gap-2">
            @if($advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator )
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="window.location.href='{{ route("publisher.view-advertiser", ['sid' => $advertiser->sid]) }}'">
                    <i class="ri-eye-line"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary drawer-trigger" data-drawer="account" onclick="pushInfo('{{ $advertiser->sid }}', '{{ $advertiser->name }}')">
                    <i class="ri-mail-line"></i>
                </button>
            @endif
            @if($checkAdmin)
                @php
                    $status = null;
                    if(isset($advertiser->advertiser_applies->status))
                    {
                        $status = $advertiser->advertiser_applies->status;
                    }
                    elseif (isset($advertiser->advertiser_applies_status))
                    {
                        $status = $advertiser->advertiser_applies_status;
                    }
                @endphp
                @if($status && $status == \App\Models\AdvertiserApply::STATUS_PENDING)
                    <button type="button" class="btn btn-sm btn-warning text-capitalize" disabled>
                        <i class="ri-time-line"></i> Pending
                    </button>
                @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                    <button type="button" class="btn btn-sm btn-success text-capitalize" disabled>
                        <i class="ri-check-line"></i> Joined
                    </button>
                @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_REJECTED)
                    <button type="button" class="btn btn-sm btn-danger text-capitalize" disabled>
                        <i class="ri-close-line"></i> Rejected
                    </button>
                @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_HOLD || $status && $status == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD)
                    <button type="button" class="btn btn-sm btn-secondary text-capitalize" disabled>
                        <i class="ri-pause-circle-line"></i> Hold
                    </button>
                @else
                    <button type="button" class="btn btn-sm btn-success text-capitalize" data-bs-toggle="modal" data-bs-target="#modal-basic"
                            @if($advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator )
                                onclick="openApplyModal('{{ $advertiser->sid }}', `{{ $advertiser->name }}`)"
                            @else
                                onclick="window.location.href='{{ route("publisher.view-advertiser", ['sid' => $advertiser->sid]) }}'"
                            @endif
                    >
                        <i class="ri-user-add-line"></i> Apply
                    </button>
                @endif
            @endif
        </div>
    </td>
</tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <h6 class="text-center">Advertiser Data Not Exist</h6>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>


@include("template.publisher.widgets.loader")

@if(count($advertisers) && $advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator )
    {{ $advertisers->withQueryString()->links('vendor.pagination.custom') }}
@endif
