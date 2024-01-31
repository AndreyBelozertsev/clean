@if($meeting)
    <div class="flex items-center">
        <p class="text-lg font-inter-800 mb-2">
            Следующий субботник: 
            <span class="font-inter-400">
                {{ getHumanDate($meeting->start_at, true) }}
            </span>
        </p>
    </div>
    <div class="flex gap-[6px] py-[6px] ml-1">
        <img data-src="/images/icons/map-pin.svg" src="/images/1x1.png" alt="map pin">
        <p><a href="{{ route('meeting.show',[ 'slug' => $meeting->slug ]) }}">{{ $meeting->city->title . ", " . $meeting->address}}</a></p>
    </div>
@endif
