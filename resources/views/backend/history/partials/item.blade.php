<li>
    <i class="fa fa-{{ $historyItem->icon }} {{ $historyItem->class }}"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{ $historyItem->created_at->diffForHumans() }}</span>

        <h3 class="timeline-header no-border"><strong>{{ $historyItem->user->name }}</strong> {{ history()->renderDescription($historyItem->text, $historyItem->assets) }}</h3>
    </div><!--timeline-item-->
</li>