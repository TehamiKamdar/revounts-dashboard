<nav class="atbd-page mt-3">
    <ul class="atbd-pagination d-flex" id="publisherPagination">
        @if ($paginator->hasPages())
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="atbd-pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="atbd-pagination__link pagination-control" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="atbd-pagination__item">
                    <a class="atbd-pagination__link pagination-control" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="atbd-pagination__item disabled" aria-disabled="true"><span class="atbd-pagination__link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="atbd-pagination__item" aria-current="page"><span class="atbd-pagination__link active">{{ $page }}</span></li>
                        @else
                            <li class="atbd-pagination__item"><a class="atbd-pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="atbd-pagination__item">
                    <a class="atbd-pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="atbd-pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="atbd-pagination__link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        @endif
        @if(
            request()->route()->getName() == "publisher.reports.transactions.list"
            || request()->route()->getName() == "publisher.find-advertisers"
            || request()->route()->getName() == "publisher.own-advertisers"
            || request()->route()->getName() == "publisher.reports.performance-by-transactions.list"
            || request()->route()->getName() == "publisher.reports.performance-by-clicks.list"
            || request()->route()->getName() == "publisher.creatives.coupons.list"
            || request()->route()->getName() == "publisher.creatives.text-links.list"
        )

            <li class="ml-2 atbd-pagination__item">
                <div class="paging-option">
                    @if(request()->route()->getName() == "publisher.find-advertisers" || request()->route()->getName() == "publisher.own-advertisers")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_ADVERTISER_PAGINATION;
                            if(session()->has('publisher_advertiser_limit')) {
                                $limit = session()->get('publisher_advertiser_limit');
                            }
                        @endphp
                    @elseif(request()->route()->getName() == "publisher.reports.transactions.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_TRANSACTION_PAGINATION;
                            if(session()->has('publisher_transaction_limit')) {
                                $limit = session()->get('publisher_transaction_limit');
                            }
                        @endphp
                    @elseif(request()->route()->getName() == "publisher.reports.performance-by-transactions.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if(session()->has('publisher_earning_performance_limit')) {
                                $limit = session()->get('publisher_earning_performance_limit');
                            }
                        @endphp
                    @elseif(request()->route()->getName() == "publisher.reports.performance-by-clicks.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if(session()->has('publisher_click_performance_limit')) {
                                $limit = session()->get('publisher_click_performance_limit');
                            }
                        @endphp
                    @elseif(request()->route()->getName() == "publisher.creatives.coupons.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if(session()->has('publisher_coupon_limit')) {
                                $limit = session()->get('publisher_coupon_limit');
                            }
                        @endphp
                    @elseif(request()->route()->getName() == "publisher.creatives.text-links.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if(session()->has('publisher_text_link_limit')) {
                                $limit = session()->get('publisher_text_link_limit');
                            }
                        @endphp
                    @endif
                    <select name="limit" id="limit" class="page-selection">
                        <option value="10" @if($limit == "10") selected @endif>10/page</option>
                        <option value="20" @if($limit == "20") selected @endif>20/page</option>
                        <option value="40" @if($limit == "40") selected @endif>40/page</option>
                        <option value="60" @if($limit == "60") selected @endif>60/page</option>
                    </select>
                </div>
            </li>
        @endif
    </ul>
</nav>
