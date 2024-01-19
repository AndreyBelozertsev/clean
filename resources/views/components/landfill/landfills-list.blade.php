<br>components.landfill.landfills-list<br>
    <br>categories<br>
    @foreach($categories as $category)
        {{ $category->title . " " . $category->slug }}<br>
    @endforeach
    <br>endcategories<br>
    <br>landfills<br>
    @foreach($landfills as $landfill)
        {{ $landfill->address . " " . $landfill->slug . " " . ( isset($landfill->images[0]) ? $landfill->images[0] : '' ) . " " . $landfill->city->title . " " . $landfill->category->title }}<br>
    @endforeach
    <br>endlandfills<br>
<br>endcomponents.landfill.landfills-list<br>