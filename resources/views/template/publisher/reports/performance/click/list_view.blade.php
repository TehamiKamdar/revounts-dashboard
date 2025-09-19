
        @include("template.publisher.widgets.loader")

        <!-- Start Table Responsive -->
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead>
                <tr>
                    <th>
                        Advertiser
                    </th>
                    <th>
                        Tracking Link Clicks
                    </th>
                    <th>
                        Deeplink Clicks
                    </th>
                    <th>
                        Coupon Clicks
                    </th>
                    <th>
                        Total Clicks
                    </th>
                </tr>
                </thead>
                <tbody>
                @if($performanceOverviewList2 && count($performanceOverviewList2))
                    @foreach($performanceOverviewList2 as $data)
                        @php
                            $sid = $data->advertiser_sid;
                            $advertiser = $data->advertiser_name;
                            $totalTrackingClicks = $data->tracking_total_clicks;
                            $totalDeepClicks = $data->deeplink_total_clicks;
                            $totalCouponClicks = $data->coupon_total_clicks;
                            $totalClicks = $data->total_clicks;
                        @endphp
                        <tr>
                            <td>
                                <a target="_blank" href="{{ route("publisher.view-advertiser", ['sid' => $sid]) }}" class="text-primary-light">{{ $advertiser ?? "-" }} <br><span>({{ $sid }})</span></a>
                            </td>
                            <td>{{ $totalTrackingClicks }}</td>
                            <td>{{ $totalDeepClicks }}</td>
                            <td>{{ $totalCouponClicks }}</td>
                            <td>{{ $totalClicks }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <h6 class="my-5 text-center">Performance Overview Data Not Exist</h6>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

@if($performanceOverviewList2 && count($performanceOverviewList2) && $performanceOverviewList2 instanceof \Illuminate\Pagination\LengthAwarePaginator )
    {{ $performanceOverviewList2->withQueryString()->links('vendor.pagination.custom') }}
@endif
