<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table mb-0 table-hover table-borderless border-0">
        <thead>
        <tr>

            <th>
                Advertiser
            </th>
            <th>
                Advertiser URL
            </th>

            <th>
                Tracking Short Link
            </th>

            <th>
                Tracking Link
            </th>

            <th>
                Sud ID
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
                                <a href="{{ $link->url }}" class="text-primary-light" target="_blank">{{ \Illuminate\Support\Str::limit($link->url, 30, $end='...') }}</a>
                        </td>
                        <td>
                                <a href="{{ $link->tracking_url_short }}" class="text-primary-light" id="trackingURL{{ $key }}" target="_blank">{{ $link->tracking_url_short ?? "-" }}</a>
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
                    <td colspan="5">
                        <h6 class="text-center mt-2">Text Link Data Not Exist</h6>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{ $links->withQueryString()->links('vendor.pagination.custom') }}
@endif