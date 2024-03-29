@props([
    'components' => [],
    'home_route' => null,
    'logo',
    'profile',
])
<aside {{ $attributes->merge(['class' => 'layout-menu']) }}
       :class="minimizedMenu && '_is-minimized'"
>
    <div class="menu-heading">
        <div class="menu-heading-logo">
            @if($logo ?? false)
                {{ $logo }}
            @else
                @include('moonshine::layouts.shared.logo', ['home_route' => $home_route])
            @endif
        </div>

        <div class="menu-heading-actions">
            <div class="menu-heading-burger">
                @include('moonshine::layouts.shared.burger')
            </div>
        </div>
    </div>

    <nav class="menu" :class="asideMenuOpen && '_is-opened'">
        <x-moonshine::components
            :components="$components"
        />

        {{ $slot ?? '' }}

        <!-- Bottom menu -->
    </nav>
</aside>
