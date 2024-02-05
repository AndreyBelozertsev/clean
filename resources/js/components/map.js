if( document.getElementById('landfill-map-single') ){
    initLandfillMapSingle();
}

async function initLandfillMapSingle() {

    await ymaps3.ready;

    const input = document.getElementById('coordinates');

    const readonly = false;

    const coord = input.getAttribute('value') 
        ? input.getAttribute('value').split(',') 
        : '';

    const {YMap, YMapDefaultSchemeLayer, YMapControls, YMapDefaultFeaturesLayer, YMapListener } = ymaps3;

    const {YMapZoomControl} = await ymaps3.import('@yandex/ymaps3-controls@0.0.1');

    const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');
    // Создание экземпляра карты.
    const map = new ymaps3.YMap(document.getElementById('landfill-map-single'), {
        location: {
            center: coord.length ? coord : [34.11165060017223, 44.9448782299429],
            zoom: '10',
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


//Карта со всеми метками
if( document.getElementById('landfill-map-full') ){
    initLandfillMapFull();
}


//Получаем точки и типы отметок  
async function getLandfillsData() {
    let block = document.getElementById('landfill-map-full');
    if( block.getAttribute('data-landfills') ){
        return JSON.parse(block.getAttribute('data-landfills'))
    }
    const res = await fetch('/get-landfills', {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            "Accept" : "application/json",
            "Content-type" : "application/json",
        },
    });
    return res.json();
}


async function initLandfillMapFull() {
    await ymaps3.ready;

    const data = await getLandfillsData();

    let center = [34.61165060017223, 45.2448782299429];
    let zoom = 8;
    

    if(data.landfills.length == 1){
        center = data.landfills[0].coordinates.split(',');
        zoom = 11;
    }

    const {YMap, YMapDefaultSchemeLayer, YMapControls, YMapDefaultFeaturesLayer, YMapListener,YMapMarker } = ymaps3;

    const {YMapZoomControl} = await ymaps3.import('@yandex/ymaps3-controls@0.0.1');

    // Создание экземпляра карты.
    const map = new ymaps3.YMap(document.getElementById('landfill-map-full'), {
        location: {
            center: center,
            zoom: zoom,
        }
    });
    // //Элементы контроля
    const controls = new ymaps3.YMapControls({position: 'top right', orientation: 'vertical'});
    controls.addChild(new YMapZoomControl({}));

    //добавление объектов на карту
    map.addChild(new ymaps3.YMapDefaultSchemeLayer())
        .addChild(new ymaps3.YMapDefaultFeaturesLayer({zIndex: 1800}))
        .addChild(controls);

    let markers = [];

    data.landfills.forEach(element => {

        const markerElement = document.createElement('img');
        markerElement.className = 'icon-marker';
        markerElement.src = `/storage/${element.category.thumbnail}`;
              // Создание заголовка маркера
        const popupTitle = document.createElement('div');
        popupTitle.className = 'marker-title';
        popupTitle.setAttribute("id", `marker-${element.slug}`);
        
        popupTitle.innerHTML = `<a href="/landfill/${element.slug}">${element.address}</a>`;

        const popupCloseButton = document.createElement('button');
        popupCloseButton.className = 'popupCloseButton';
        popupCloseButton.innerHTML = 'x';
        popupTitle.appendChild(popupCloseButton);

        const imgContainer = document.createElement('div');
        imgContainer.appendChild(markerElement);
        imgContainer.appendChild(popupTitle);

        imgContainer.onclick = () => mapPopupToggle(element.slug);
        const marker = new YMapMarker({
            coordinates: element.coordinates.split(','),
        },imgContainer) 
        markers.push(marker);
        map.addChild(marker);

    });

    const block = Array.from(document.getElementsByClassName('filter-button'));

    block.forEach(button => {
        button.addEventListener("click", (e) => {
            const slug = e.target.getAttribute('data-slug');
            markers.forEach(element => {
                map.removeChild(element);
            });   
            markers.forEach(element => {
                if(element._props.clusterCaption == slug || slug == 'all'){
                    map.addChild(element);
                }
            });  
        });
    });
}



//Карта со всеми метками
if( document.getElementById('meeting-map-full') ){
    initMeetingMapFull();
}


//Получаем точки и типы отметок  
async function getMeetingsData() {
    let block = document.getElementById('meeting-map-full');
    if( block.getAttribute('data-meetings') ){
        return JSON.parse(block.getAttribute('data-meetings'))
    }

    const res = await fetch('/get-meetings', {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            "Accept" : "application/json",
            "Content-type" : "application/json",
        },
    });
    return res.json();
}


async function initMeetingMapFull() {
    await ymaps3.ready;

    const data = await getMeetingsData();

    let center = [34.61165060017223, 45.2448782299429];
    let zoom = 8;

    if(data.meetings.length == 1){
        center = data.meetings[0].coordinates.split(',');
        zoom = 11;
    }

    const {YMap, YMapDefaultSchemeLayer, YMapControls, YMapDefaultFeaturesLayer, YMapListener,YMapMarker } = ymaps3;

    const {YMapZoomControl} = await ymaps3.import('@yandex/ymaps3-controls@0.0.1');

    // Создание экземпляра карты.
    const map = new ymaps3.YMap(document.getElementById('meeting-map-full'), {
        location: {
            center: center,
            zoom: zoom,
        }
    });
    // //Элементы контроля
    const controls = new ymaps3.YMapControls({position: 'top right', orientation: 'vertical'});
    controls.addChild(new YMapZoomControl({}));

    //добавление объектов на карту
    map.addChild(new ymaps3.YMapDefaultSchemeLayer())
        .addChild(new ymaps3.YMapDefaultFeaturesLayer({zIndex: 1800}))
        .addChild(controls);


    data.meetings.forEach(element => {
        const markerElement = document.createElement('img');
        markerElement.className = 'icon-marker';
        markerElement.src = '/images/icons/map-pin.svg';
              // Создание заголовка маркера
        const popupTitle = document.createElement('div');
        popupTitle.className = 'marker-title';
        popupTitle.setAttribute("id", `marker-${element.slug}`);
        
        popupTitle.innerHTML = `<a href="/meeting/${element.slug}">${element.title} </a>`;

        const popupCloseButton = document.createElement('button');
        popupCloseButton.className = 'popupCloseButton';
        popupCloseButton.innerHTML = 'x';

        popupTitle.appendChild(popupCloseButton);


        // Контейнер для элементов маркера
        const imgContainer = document.createElement('div');
        imgContainer.appendChild(markerElement);
        imgContainer.appendChild(popupTitle);

        imgContainer.onclick = () => mapPopupToggle(element.slug);
        const marker = new YMapMarker({
            coordinates: element.coordinates.split(','),
        },imgContainer) 
        map.addChild(marker);
    });

}

 
function mapPopupToggle(slug){
    if(! (event.target.classList.contains("icon-marker") || event.target.classList.contains("popupCloseButton"))){
        return
    }
    const layout = event.target.closest('ymaps');

    
    
    const box = document.getElementById(`marker-${slug}`);
    if(box.style.display == 'block'){
        layout.style.zIndex = 0;
        box.style.display = 'none';
    }else{
        layout.style.zIndex = 1;
        box.style.display = 'block';
        console.log(getTranslateZ(layout.style.transform));

        console.log( layout.querySelector('.marker-title').offsetHeight );
    }
}


function getTranslateZ(transform)
{
        let zT = transform.match(/translateZ\(([0-9]+(px|em|%|ex|ch|rem|vh|vw|vmin|vmax|mm|cm|in|pt|pc))\)/);
    return zT ? zT[1] : '0';
    //Return the value AS STRING (with the unit)
}