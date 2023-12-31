@if ($paginator->hasPages())
    <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="col-md-6">
                <a href="#" class="button button-sm button-pasific pull-left hover-skew-backward disabled">
                    Old Entries
                </a>
            </div>
        @else
            <div class="col-md-6">
                <a href="{{ $paginator->previousPageURL() }}"
                    class="button button-sm button-pasific pull-left hover-skew-backward disable">
                    Old Entries
                </a>
            </div>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="col-md-6">
                <a href="{{ $paginator->nextPageURL() }}"
                    class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
            </div>
        @else
            <div class="col-md-6">
                <a href="#" class="button button-sm button-pasific pull-right hover-skew-forward disabled">New
                    Entries</a>
            </div>
        @endif

    </div>
@endif
