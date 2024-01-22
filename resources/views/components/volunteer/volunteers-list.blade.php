<br>components.volunteer.volunteers-list<br>
    @foreach($volunteers as $volunteer)
        {{ $volunteer->name . " " . $volunteer->slug . " " . $volunteer->thumbnail }}<br>
    @endforeach
<br>endcomponents.volunteer.volunteers-list<br>