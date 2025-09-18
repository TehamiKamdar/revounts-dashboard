@if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-3">
        {{-- First + Prev --}}
        <div class="d-flex pageBtn">
            <button class="btn btn-sm btn-navigation me-2"
                    @if($paginator->onFirstPage()) disabled @endif
                    onclick="window.location='{{ $paginator->url(1) }}'">
                ⏮ <span class="md-none">First</span>
            </button>

            <button class="btn btn-sm btn-navigation"
                    @if($paginator->onFirstPage()) disabled @endif
                    onclick="window.location='{{ $paginator->previousPageUrl() }}'">
                ◀ <span class="md-none">Prev</span>
            </button>
        </div>

        {{-- Page Info --}}
        <div id="pageInfo" class="text-primary-light">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }} —
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} records
        </div>

        {{-- Next + Last --}}
        <div class="d-flex pageBtn">
            <button class="btn btn-sm btn-navigation me-2"
                    @if(!$paginator->hasMorePages()) disabled @endif
                    onclick="window.location='{{ $paginator->nextPageUrl() }}'">
                <span class="md-none">Next</span> ▶
            </button>

            <button class="btn btn-sm btn-navigation"
                    @if(!$paginator->hasMorePages()) disabled @endif
                    onclick="window.location='{{ $paginator->url($paginator->lastPage()) }}'">
                <span class="md-none">Last</span> ⏭
            </button>
        </div>
    </div>
@endif
