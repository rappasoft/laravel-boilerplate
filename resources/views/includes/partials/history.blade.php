<ul class="timeline">
	@foreach ($history as $historyItem)
		{!! history()->buildItem($historyItem) !!}
	@endforeach
</ul>
@if($paginate)
	{{ $history->links() }}
@endif