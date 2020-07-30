@if ($paginator->hasPages())
    <div class="pagination clearfix style2"">
        <div class="nav-link">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="page-numbers" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="icon fa fa-angle-left" aria-hidden="true">
                </i></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="page-numbers" aria-disabled="true">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a aria-current="page" class="page-numbers current">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-numbers" rel="next" aria-label="@lang('pagination.next')">
                    <i class="icon fa fa-angle-right" aria-hidden="true"></i>
                </a>
            @endif
        </div>
    </div>
@endif
