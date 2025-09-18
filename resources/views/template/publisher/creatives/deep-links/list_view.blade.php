<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table mb-0 table-hover table-borderless border-0">
        <thead>
        <tr class="userDatatable-header">

            <th>
                <span class="userDatatable-title">Advertiser</span>
            </th>
            <th>
                <span class="userDatatable-title">Landing Page</span>
            </th>

            <th>
                <span class="userDatatable-title">Tracking Short Link</span>
            </th>

            <th>
                <span class="userDatatable-title">Tracking Link</span>
            </th>

            <th>
                <span class="userDatatable-title">Sud ID</span>
            </th>

            <th>

            </th>
        </tr>
        </thead>
        <tbody>
            @if(count($links))
                @foreach($links as $key => $link)
                    <tr>
                        <td>
                                {{ $link->name }} <br>
                                <span class="text-primary-light">({{ $link->sid }})</span>
                        </td>
                        <td>
                                <a href="{{ $link->landing_url }}" class="text-primary-light" target="_blank">{{ \Illuminate\Support\Str::limit($link->landing_url ?? "-", 30, $end='...') }}</a>
                        </td>
                        <td>
                                <a href="{{ $link->tracking_url }}" class="text-primary-light" id="trackingURL{{ $key }}" target="_blank">{{ $link->tracking_url ?? "-" }}</a>
                        </td>
                        <td>
                                <a href="{{ $link->tracking_url_long }}" class="text-primary-light" id="trackingURL{{ $key }}" target="_blank">{{ \Illuminate\Support\Str::limit($link->tracking_url_long ?? "-", 30, $end='...') }}</a>
                        </td>
                        <td>
                                {{ $link->sub_id ?? "-" }}
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="copyLink('{{ $key }}')" class="btn btn-sm text-primary text-lg">
                                <i class="ri-file-copy-line"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- End: tr -->
                @endforeach
            @else
                <tr>
                    <td colspan="6">
                        <h6 class="text-center mt-2">Deep Link Data Not Exist</h6>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<!-- Table Responsive End -->

@if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{ $links->withQueryString()->links('vendor.pagination.custom') }}
@endif
