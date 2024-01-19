<input {{ $element->attributes()->merge([
    'id' => $element->id(),
    'name' => $element->name(),
    'value' => (string) $element->value(),
    'class' => !in_array($element->attributes()->get('type'), ['checkbox', 'radio', 'color'])
        ? 'form-input'
        : 'form-' . $element->attributes()->get('type', 'input'),
    'type' => 'text'])
    }}
    readonly="readonly"
/>

<div>
    <div {{ $element->attributes()['readonly'] ? "readonly=readonly" : '' }} id="map-{{ $element->id() }}" style="width:100%; height: 500px"></div>
</div>

<script src="https://api-maps.yandex.ru/v3/?apikey={{ env('MOONSHINE_YANDEX_MAP_API') }}&lang=ru_RU"></script>
<script>

    initMap();

    async function initMap() {
        await ymaps3.ready;

        const input = document.getElementById('{{ $element->id() }}');

        const readonly = document.getElementById('map-{{ $element->id() }}').getAttribute('readonly') ? true : false;

        const coord = input.getAttribute('value') 
            ? input.getAttribute('value').split(',') 
            : '';

        const {YMap, YMapDefaultSchemeLayer, YMapControls, YMapDefaultFeaturesLayer, YMapListener } = ymaps3;

        const {YMapZoomControl} = await ymaps3.import('@yandex/ymaps3-controls@0.0.1');

        const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');
        // Создание экземпляра карты.
        const map = new ymaps3.YMap(document.getElementById('map-{{ $element->id() }}'), {
            location: {
                center: coord.length ? coord : {{ env('MOONSHINE_YANDEX_MAP_CENTER', '[37.588144, 55.733842]') }},
                zoom: {{ env('MOONSHINE_YANDEX_MAP_ZOOM', '10') }}
            }
        });
        //Элементы контроля
        const controls = new ymaps3.YMapControls({position: 'top right', orientation: 'vertical'});
        controls.addChild(new YMapZoomControl({}));

        //Отслеживание передвижение маркера
        const behaviorHandler = (coord) => {
            input.setAttribute("value", coord);
        };

        const marker = new YMapDefaultMarker({
            coordinates: coord,
            color: 'red',
            draggable: !readonly,
            mapFollowsOnDrag: true,
            onDragEnd: behaviorHandler,
        });

        //добавление объектов на карту
        map.addChild(new ymaps3.YMapDefaultSchemeLayer())
            .addChild(controls)
            .addChild(new ymaps3.YMapDefaultSchemeLayer())
            .addChild(new ymaps3.YMapDefaultFeaturesLayer({zIndex: 1800}))
            .addChild(marker);

        //Отслеживание нажатия на карту
        const clickCallback = function(type, location, camera){
            marker.update({coordinates:location.coordinates});
            input.setAttribute("value", location.coordinates);
        }

        // Создание объекта-слушателя.
        const mapListener = new YMapListener({
            layer: 'any',
            // Добавление обработчиков на слушатель.
            onClick: clickCallback
        });

        if(!readonly ){
            map.addChild(mapListener);
        }

    }

</script>