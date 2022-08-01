@if ($paginator->hasPages())

<nav aria-label="Page navigation example">
	<ul class="pagination">

		@if ($paginator->onFirstPage())
		<button class="page-item disabled"><a class="page-link" href="#">Anterior</a></button>
		@else
		<button class="page-item" wire:click="previousPage" wire:loading.attr="disabled">Anterior</button>
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
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <button class="page-item" wire:click="nextPage">Siguiente</button>
            @else
                <button class="page-item disabled"><a class="page-link" href="#">Siguiente</a></button>
            @endif
	</ul>
</nav>
@endif