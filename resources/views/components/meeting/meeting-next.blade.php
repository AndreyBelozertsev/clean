@if($meeting)
    <div class="mb-6 md:mb-10">
        <div class="flex items-center">
            <p class="text-xl font-inter-800 mb-2">
                Следующий субботник: 
                <span class="font-inter-500">
                    {{ getHumanDate($meeting->start_at, true) }}
                </span>
            </p>
        </div>
        <div class="flex gap-[6px] py-[6px] ml-1">
            <img data-src="img/icons/map-pin.svg" src="img/1x1.png" alt="map pin">
            <p><a href="{{ route('meeting.show',[ 'slug' => $meeting->slug ]) }}">{{ $meeting->city->title . ", " . $meeting->address}}</a></p>
        </div>
    </div>
@endif
