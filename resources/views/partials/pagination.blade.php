@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="my-2">

        <div class="flex gap-2 items-center justify-between sm:hidden">

            @if ($paginator->onFirstPage())
                <button class="btn btn-outline btn-disabled" disabled>
                    {!! __('pagination.previous') !!}
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-outline">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-outline">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <button class="btn btn-outline btn-disabled" disabled>
                    {!! __('pagination.next') !!}
                </button>
            @endif

        </div>

        <div class="hidden sm:flex-1 sm:flex sm:gap-2 sm:items-center sm:justify-between">

            <div>
                <p class="text-sm text-base-content leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div class="join">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <button class="btn btn-disabled" disabled aria-disabled="true"
                        aria-label="{{ __('pagination.previous') }}" aria-hidden="true">
                        🢔
                    </button>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn"
                        aria-label="{{ __('pagination.previous') }}">
                        🢔
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <button class="join-item btn btn-disabled">...</button>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <button class="join-item btn btn-primary"
                                    aria-current="page">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn"
                        aria-label="{{ __('pagination.next') }}">
                        🢖
                    </a>
                @else
                    <button class="btn btn-disabled" disabled aria-disabled="true"
                        aria-label="{{ __('pagination.next') }}" aria-hidden="true">
                        🢖
                    </button>
                @endif
            </div>
        </div>
    </nav>
@endif
