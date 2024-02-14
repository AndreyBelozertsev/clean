
<div class="container">
	<div class="flex flex-wrap xl:grid grid-cols-5 md:items-center xl:items-stretch xl:grid-cols-12 gap-6">
		<a class="order-1 w-full xl:w-auto xl:order-none py-[13px] px-[7px] rounded-[20px] bg-white flex justify-center items-center mb-5 xl:mb-0 col-span-2"
			href="/">
		    <img data-src="/images/logo.svg" src="/images/1x1.png" alt="Чистый Крым">
		</a>
		<div class="w-full col-span-3 xl:col-span-10">
			<div class="flex justify-between items-center xl:items-stretch xl:grid gap-6 xl:mb-[22px] relative xl:grid-cols-2 3xl:grid-cols-10 top-nav">
			    <nav class="menu order-1 xl:order-none 3xl:col-span-3">
					<div @click="active = !active" x-show="!active"
						class="group px-6 py-[14px] rounded-huge bg-white justify-between cursor-pointer hidden border border-transparent xl:flex hover:border-other-blue duration-500 transition ease-in-out">
						<span class="group-hover:text-other-blue mr-2.5">Меню</span>
						<button>
						    <img data-src="/images/icons/burger.svg" src="/images/1x1.png" alt="burger">
						</button>
					</div>
					<ul x-show="active"
						class="flex justify-between items-center px-6 py-[14px] rounded-huge bg-white font-inter-500 absolute z-[1] w-full text-xs right-0 2xl:text-sm 3xl:text-base">
                        @forelse ($menu->all() as $item)
                            <li><a href="{{ $item->link() }}" class="@if($item->isActive()) menu_active @endif hover:text-other-blue duration-500 transition ease-in-out"> {{ $item->label()  }}</a></li>
                        @empty
                        @endforelse
                        @if (auth()->check())
                            <li>
                                <a href="{{ route('admin.dashboard') }}">В админ панель</a>
                            </li>
                            <li>
                                <form action="{{ route('logOut') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Выйти</button>
                                </form>
                            </li>
                        @endif
						<img @click="active = !active" class="cursor-pointer" src="/images/icons/close.svg" alt="">
					</ul>
					<div class="humb xl:hidden bg-white rounded-standart p-2 sm:p-3 md:p-4">
						<div class="hamb__field">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
						</div>
					</div>
				</nav>
				<form action="{{ route('search') }}"
					class="text-custom-gray-text font-inter-500 px-6 py-3 bg-white relative rounded-huge items-center col-span-3 hidden 3xl:flex 5xl:col-span-4">
					<input class="outline-none w-full" name="search" type="text" placeholder="Поиск свалки">
					<button class="cursor-pointer absolute right-6" type="submit">
						<img data-src="/images/icons/search.svg" class="w-5 h-5" src="/images/1x1.png" alt="search">
					</button>
				</form>
				<a class="bg-accent-red text-center text-xs sm:text-sm md:text-base p-2.5 md:px-7 md:py-[14px] text-white rounded-huge 3xl:col-span-4 5xl:col-span-3 hover:bg-accent-red-hover duration-500 transition ease-in-out modal-open-button"
					href="#"
                    data-modal="modal-step1"
                    >
					Подать жалобу на незаконную свалку
				</a>
			</div>

			<div class="hidden xl:grid 3xl:grid-cols-10">
                <x-landfill.landfills-statistic />
                <div class=" row-span-2 bg-white rounded-[16px] px-5 pt-4 pb-3 3xl:col-span-5 5xl:col-span-6">
                    <x-meeting.meeting-next />
                </div>
			</div>
        </div>
	</div>
</div>
<div class="popup" id="popup-menu">
    <div class="container">
        <ul class="popup-menu__list flex">
            @forelse ($menu->all() as $item)
                <li class="popup-menu__list-item"><a href="{{ $item->link() }}" class="@if($item->isActive()) menu_active @endif text-lg font-inter-600"> {{ $item->label()  }}</a></li>
            @empty
            @endforelse
            @if (auth()->check())
                <li class="popup-menu__list-item">
                    <a href="{{ route('admin.dashboard') }}">В админ панель</a>
                </li>
                <li class="popup-menu__list-item">
                    <form action="{{ route('logOut') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Выйти</button>
                    </form>
                </li>
            @endif
        </ul>
    </div>
</div>