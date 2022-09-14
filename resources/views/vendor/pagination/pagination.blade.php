@if ($paginator->hasPages())

<nav aria-label="Page navigation example">
	<ul class="pagination">

        @if ($paginator->onFirstPage())
                <li class="page-item disabled mx-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">Anterior</span>
                </li>
            @else
                <li class="page-item mx-2">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="cursor: pointer;">Anterior</a>
                </li>
            @endif

		{{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active mx-1" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li><a class="page-link mx-1" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item mx-2">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="cursor: pointer;">Siguiente</a>
                </li>
            @else
                <li class="page-item disabled mx-2" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">Siguiente</span>
                </li>
            @endif
	</ul>
</nav>
@endif