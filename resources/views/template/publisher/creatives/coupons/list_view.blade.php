
    <div class="table-responsive">
        <table class="table mb-0 table-hover table-borderless border-0">
            <thead>
                <tr>
                    <th style="width: 20%;">
                        Advertiser
                    </th>
                    <th style="width: 40%;">
                        Offer Name
                    </th>
                    <th style="width: 15%;">
                        Code
                    </th>
                    <th style="width: 15%;">
                        Start-End Dates
                    </th>
                    <th style="width: 10%;">
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(count($coupons))
                    @foreach($coupons as $coupon)
                        <tr>

                            <td>
                                {{ ucwords($coupon->advertiser_name) }} <br>
                                <span class="text-primary-light">({{ $coupon->sid ?? 0 }})</span>
                            </td>
                            <td>
                                {!! $coupon->title !!}
                            </td>
                            <td>
                                {{ $coupon->code ? $coupon->code : "No code required" }}
                            </td>
                            <td>
                                @if($coupon->start_date && $coupon->end_date)
                                    {{ \Carbon\Carbon::parse($coupon->start_date)->format("d/m/Y") }} -
                                    {{ \Carbon\Carbon::parse($coupon->end_date)->format("d/m/Y") }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-xs btn-primary btn-add" data-toggle="modal"
                                    data-target="#showVoucherForm" onclick="prepareVoucherFormContent('{{ $coupon->id }}')">
                                    VIEW
                                </a>
                            </td>
                        </tr>
                        <!-- End: tr -->
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <h6 class="text-center mt-2">Coupons Data Not Exist</h6>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

<div class="modal fade showVoucherForm" id="showVoucherForm" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-xl" id="voucherModalContent"></div>
    </div>
</div>
<!-- Modal -->
@if(count($coupons) && $coupons instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{ $coupons->withQueryString()->links('vendor.pagination.custom') }}
@endif