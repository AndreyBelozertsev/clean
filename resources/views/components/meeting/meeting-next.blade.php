<br>components.meeting.meeting-next<br>

@if($meeting)
    
    Сейчас - {{ date("Y-m-d H:i:s") }}<br>
    Субботник - {{ $meeting->start_at }}<br>

    До ближайшего субботника осталось:</br>
    Месяцев - {{ $meeting->remains_until['months'] }}<br>
    Дней - {{ $meeting->remains_until['days'] }}<br>
    Часов - {{ $meeting->remains_until['hours'] }}<br>
    Минут - {{ $meeting->remains_until['minuts'] }}<br>
    Секунд - {{ $meeting->remains_until['seconds'] }}<br>
@endif
<br>endcomponents.meeting.meeting-next<br>
