@if($records->total() > 0)
<nav class="pd-pagination" aria-label="{{ $label }} pagination"><p>{{ $records->firstItem() }}–{{ $records->lastItem() }} <span>of {{ $records->total() }} {{ $label }}</span></p><div>
@if($records->onFirstPage())<span class="pd-page-disabled">Previous</span>@else<a href="{{ $records->previousPageUrl() }}" rel="prev">Previous</a>@endif
<span class="pd-page-current">{{ $records->currentPage() }} / {{ $records->lastPage() }}</span>
@if($records->hasMorePages())<a href="{{ $records->nextPageUrl() }}" rel="next">Next</a>@else<span class="pd-page-disabled">Next</span>@endif
</div></nav>
@endif
