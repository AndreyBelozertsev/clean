<br>components.hero.heroes-list<br>
    @foreach($heroes as $hero)
        {{ $hero->name . " " . $hero->slug . " " . $hero->thumbnail }}<br>
    @endforeach
<br>endcomponents.hero.heroes-list<br>