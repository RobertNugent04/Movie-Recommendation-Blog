<style>
    .page-link {
  color: #fff;
  background-color: #040012;
  border-color: #040012;
}

.page-link:hover {
  color: #040012;
  background-color: #fff;
  border-color: #040012;
}

.page-item.active .page-link {
  color: #040012;
  background-color: #fff;
  border-color: #040012;
}
</style>
@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">First</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url(1) }}" rel="prev">First</a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled d-none d-md-block"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item d-none d-md-block"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&rsaquo;</span>
            </li>
        @endif

        {{-- Last Page Link --}}
        @if($paginator->currentPage() == $paginator->lastPage())
            <li class="page-item disabled">
                <span class="page-link">Last</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">Last</a>
            </li>
        @endif
    </ul>
@endif
