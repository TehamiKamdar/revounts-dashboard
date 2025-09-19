
    <!-- Start Table Responsive -->
    <div class="table-responsive">
        <table class="table table-hover table-borderless border-0">
            <thead>
                <tr>
                    <th>
                        Date
                    </th>
                    <th>
                        Advertiser
                    </th>
                    <th>
                        Transaction ID
                    </th>

                    <th>
                        Sale Amount
                    </th>

                    <th>
                        Commission
                    </th>

                    <th>
                        Last Commission
                    </th>

                    <th>
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="userDatatable-header">
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">@if(count($transactions)){{ implode(', ', array_unique($transactions->pluck("sale_amount_currency")->toArray())) }} {{ number_format($totalSaleAmount, 2) }} @else - @endif</span>
                    </th>
                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">@if(count($transactions)){{ implode(', ', array_unique($transactions->pluck("commission_amount_currency")->toArray())) }} {{ number_format($totalCommissionAmount, 2) }} @else - @endif</span>
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                </tr>

                @if(count($transactions))
                    @foreach($transactions as $key => $transaction)

                        <tr>
                            <td>
                                <div class="orderDatatable-title float-right">
                                    {{ \Carbon\Carbon::parse($transaction->transaction_date)->format("F d, Y") }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ $transaction->advertiser_name }} <br>
                                    <span class="fs-12 color-gray">({{ $transaction->external_advertiser_id }})</span>
                                </div>
                            </td>
                            <td>
                                @if($transaction->sub_id)
                                    <div class="orderDatatable-title">
                                        {{ $transaction->transaction_id }}<br>
                                        <a href="javascript:void(0)" onclick="showSubID('{{ $key }}')"><i class="fas fa-plus-circle fs-12"></i></a><br>
                                        <span class="fs-12 display-hidden" id="subID{{ $key }}">Sub ID: {{ $transaction->sub_id }}</span>
                                    </div>
                                @else
                                    <div class="orderDatatable-title">
                                        {{ $transaction->transaction_id }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ $transaction->sale_amount_currency . " " . number_format($transaction->sale_amount, 2)  }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ $transaction->commission_amount_currency . " " . number_format($transaction->commission_amount, 2)  }}
                                </div>
                            </td>

                            <td>
                                <div class="orderDatatable-title">
                                    @if(!empty($transaction->last_commission) || $transaction->last_commission != 0)
                                    {{ $transaction->commission_amount_currency . " " . number_format($transaction->last_commission, 2)  }}
                                    @else
                                    {{ $transaction->commission_amount_currency . " " . number_format($transaction->commission_amount, 2)  }}
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="orderDatatable-status d-inline-block">
                                    @if($transaction->payment_status == \App\Models\Transaction::PAYMENT_STATUS_RELEASE_PAYMENT || $transaction->payment_status == \App\Models\Transaction::PAYMENT_STATUS_CONFIRM)
                                    @if(isset($transaction->yespaid) && $transaction->yespaid == 1)
                                        <span class="btn btn-sm btn-success text-capitalize">{{ \App\Models\Transaction::STATUS_PAID }}</span>
                                        @else
                                        <span class="btn btn-sm btn-success text-capitalize">{{ \App\Models\Transaction::STATUS_APPROVED }}</span>
                                        @endif
                                    @elseif($transaction->payment_status == \App\Models\Transaction::PAYMENT_STATUS_RELEASE)
                                        <span class="btn btn-sm btn-warning text-capitalize">{{ ucwords(str_replace('_', ' ', \App\Models\Transaction::STATUS_PENDING_PAID)) }}</span>
                                    @elseif($transaction->commission_status == \App\Models\Transaction::STATUS_PENDING)
                                        <span class="btn btn-sm btn-warning text-capitalize">{{ \App\Models\Transaction::STATUS_PENDING }}</span>
                                    @elseif($transaction->commission_status == \App\Models\Transaction::STATUS_HOLD)
                                        <span class="btn btn-sm btn-info text-capitalize">{{ \App\Models\Transaction::STATUS_HOLD }}</span>
                                    @elseif($transaction->commission_status == \App\Models\Transaction::STATUS_APPROVED)
                                        <span class="btn btn-sm btn-success text-capitalize">{{ \App\Models\Transaction::STATUS_APPROVED }}</span>
                                    @elseif($transaction->commission_status == \App\Models\Transaction::STATUS_PAID)
                                        <span class="btn btn-sm btn-primary text-capitalize">{{ \App\Models\Transaction::STATUS_PAID }}</span>
                                    @elseif($transaction->commission_status == \App\Models\Transaction::STATUS_DECLINED)
                                        <span class="btn btn-sm btn-danger text-capitalize">{{ \App\Models\Transaction::STATUS_DECLINED }}</span>
                                    @endif
                                </div>
                            </td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <h6 class="text-center mt-5">Transaction Data Not Exist</h6>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
    <!-- Table Responsive End -->

    @include("template.publisher.widgets.loader")

@if(count($transactions) && $transactions instanceof \Illuminate\Pagination\LengthAwarePaginator )
    {{ $transactions->withQueryString()->links('vendor.pagination.custom') }}
@endif

<script>
    function showSubID(key)
    {
        $(`#subID${key}`).toggle();
    }
</script>
