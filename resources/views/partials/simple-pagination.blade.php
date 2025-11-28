@if ($paginator->hasPages())
    <nav class="flex justify-center mt-4">
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="btn btn-outline btn-disabled join-item" aria-disabled="true">
                    @lang('pagination.previous')
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-outline join-item">
                    @lang('pagination.previous')
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-outline join-item">
                    @lang('pagination.next')
                </a>
            @else
                <button class="btn btn-outline btn-disabled join-item" aria-disabled="true">
                    @lang('pagination.next')
                </button>
            @endif
        </div>
    </nav>
@endif
