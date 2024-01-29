@if(isset($setting['organization']))
    <p class="font-inter-600 uppercase tracking-[-0.8px] mb-2.5 leading-none">
        <span>{{ $setting['organization'] }}</span>
    </p>
@endif
@if(isset($setting['inn']))
    <p class="font-inter-600 tracking-[-0.8px] mb-2.5 leading-none">ИНН: 
        <span class="font-inter-400">{{ $setting['inn'] }}</span>
    </p>
@endif
@if(isset($setting['email']))
    <p class="font-inter-600 tracking-[-0.8px] mb-2.5 leading-none">Email: 
        <span class="text-other-blue font-inter-400"><a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a></span>
    </p>
@endif
@if(isset($setting['phone']))
    <p class="font-inter-600 tracking-[-0.8px] mb-2.5 leading-none">Номер телефона: 
        <span class="text-other-blue font-inter-400"><a href="tel:{{ $setting['phone'] }}">{{ $setting['phone'] }}</a></span>
    </p>
@endif
<div class="pt-2">
    <p class=text-lg lg:text-xl font-inter-500">Мы в социальных сетях:</p>
    <div class="flex gap-4 pt-2">
        @if(isset($setting['vk']))
            <a href="{{ $setting['vk'] }}"><img src="/img/icons/vk.svg" alt="vk"></a>
        @endif
        @if(isset($setting['tg']))
            <a href="{{ $setting['tg'] }}"><img src="/img/icons/telegram.svg" alt="telegram"></a>
        @endif
    </div>
</div>