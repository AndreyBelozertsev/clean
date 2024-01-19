<br>components.landfill.landfills-statistic<br>

@foreach($landfill_statistic as $category)
    {{ $category->title . " - " . $category->landfills_count}}
@endforeach
<br>endcomponents.landfill.landfills-statistic<br>