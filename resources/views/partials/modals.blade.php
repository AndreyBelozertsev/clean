<div id="modal-step1" style="opacity:0;pointer-events:none" class="modal modal-blur fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full "></div>
    <div class="modal-container w-full py-6 md:w-11/12 md:max-w-md max-h-screen mx-auto shadow-lg z-50 overflow-y-auto">
        <div class="rounded-[20px] bg-white border border-popup-bor w-full relative p-8 pt-10 sm:py-10 sm:px-[50px] lg:px-10 lg:pt-6 lg:pb-10">
            <div class="absolute top-4 right-4 cursor-pointer" >
                <svg class="modal-close" data-modal="modal-step1" xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.03033 6.46967C6.73743 6.17678 6.26256 6.17678 5.96967 6.46967C5.67678 6.76257 5.67678 7.23744 5.96967 7.53033L10.9393 12.4999L5.96967 17.4696C5.67678 17.7625 5.67678 18.2373 5.96967 18.5302C6.26256 18.8231 6.73743 18.8231 7.03033 18.5302L12 13.5606L16.9697 18.5302C17.2626 18.8231 17.7374 18.8231 18.0303 18.5302C18.3232 18.2373 18.3232 17.7625 18.0303 17.4696L13.0607 12.4999L18.0303 7.53033C18.3232 7.23744 18.3232 6.76257 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L12 11.4393L7.03033 6.46967Z"
                        fill="#9F9FA0" />
                </svg>
            </div>
            <h2 class="py-2 px-4 text-center text-base/[1] sm:text-xl/[1] font-inter-600">
              Подача жалобы на незаконную свалку
            </h2>
            <p class="text-step-color text-sm/[1] text-center mb-8">
              После получения и проверки информации мы подаем жалобу и требование привести территорию в порядок
            </p>
            <form class="mb-8" action="{{ route('landfill.store.stage1') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
                <input type="hidden" name="uuid" value="{{ $custom_uuid }}">
                <div class="font-manrope-400 text-sm text-custom-gray mb-8">
                    <label class="mb-4 block">
                        <p class="text-step-txt mb-2 inline-block">Муниципальное образование<span
                            class="text-accent-red ml-1">*</span>
                        </p>
                        <select name="city_id" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active" required>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->title }}</option>
                            @endforeach
                        </select>
                        <x-input-error name="city_id" />
                    </label>
                    <label class="mb-4">
                        <p class="text-step-txt mb-2 inline-block">Адрес свалки<span 
                            class="text-accent-red ml-1">*</span>
                        </p>
                        <input name="address" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active" type="text"
                            placeholder="Укажите адрес" required>
                    </label>
                    <x-input-error name="address" />
                </div>
                <div class="mb-4">
                    <label>
                        <p class="text-step-txt mb-2 inline-block">На карте<span 
                            class="text-accent-red ml-1">*</span>
                        </p>
                    </label>
                    <div id="landfill-map-single" class="w-full h-[200px]"></div>
                    <x-input-error name="coordinates" />
                    <input id="coordinates" type="hidden" name="coordinates">
                </div>
                <button class=" text-white py-[14px] px-8 bg-accent-blue rounded-huge w-full" type="submit">
                    Продолжить
                </button>
            </form>
            <div class="steps flex gap-2 justify-center">
                <div class="step active"></div>
                <div class="step"></div>
                <div class="step"></div>
            </div>
        </div>
    </div>
</div>

<div id="modal-step2" style="opacity:0;pointer-events:none" class="modal modal-blur fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full "></div>
    <div class="modal-container w-full py-6 md:w-11/12 md:max-w-md max-h-screen mx-auto shadow-lg z-50 overflow-y-auto">
        <div class="rounded-[20px] bg-white border border-popup-bor w-full relative p-8 pt-10 sm:py-10 sm:px-[50px] lg:px-10 lg:pt-6 lg:pb-10">
            <div class="absolute top-4 right-4 cursor-pointer" >
                <svg class="modal-close" data-modal="modal-step2" xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.03033 6.46967C6.73743 6.17678 6.26256 6.17678 5.96967 6.46967C5.67678 6.76257 5.67678 7.23744 5.96967 7.53033L10.9393 12.4999L5.96967 17.4696C5.67678 17.7625 5.67678 18.2373 5.96967 18.5302C6.26256 18.8231 6.73743 18.8231 7.03033 18.5302L12 13.5606L16.9697 18.5302C17.2626 18.8231 17.7374 18.8231 18.0303 18.5302C18.3232 18.2373 18.3232 17.7625 18.0303 17.4696L13.0607 12.4999L18.0303 7.53033C18.3232 7.23744 18.3232 6.76257 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L12 11.4393L7.03033 6.46967Z"
                        fill="#9F9FA0" />
                </svg>
            </div>
            <div class="absolute top-6 left-10 cursor-pointer flex gap-2">
                <svg class="modal-open-button" data-modal="modal-step1" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.60842 5.94194C9.8525 5.69786 9.8525 5.30213 9.60842 5.05806C9.36434 4.81398 8.96867 4.81398 8.72459 5.05806L3.72456 10.0581C3.60252 10.1801 3.5415 10.3401 3.5415 10.5C3.5415 10.5847 3.55837 10.6656 3.58893 10.7392C3.61943 10.8129 3.66464 10.882 3.72456 10.9419L8.72459 15.9419C8.96867 16.186 9.36434 16.186 9.60842 15.9419C9.8525 15.6978 9.8525 15.3022 9.60842 15.0581L5.67539 11.125H15.8332C16.1783 11.125 16.4582 10.8452 16.4582 10.5C16.4582 10.1548 16.1783 9.875 15.8332 9.875H5.67539L9.60842 5.94194Z"
                        fill="#737376" />
                </svg>
                <span class="text-sm text-step-txt modal-open-button"
                data-modal="modal-step1"
                >Назад</span>
            </div>
            <h2 class="pt-6 pb-2 px-4 text-center text-base/[1] sm:text-xl/[1] font-inter-600">
              Подача жалобы на незаконную свалку
            </h2>
            <p class="text-step-color text-sm/[1] text-center mb-8">
              После получения и проверки информации мы подаем жалобу и требование привести территорию в 2порядок
            </p>
            <form id="landfill-images-form" class="mb-8" action="{{ route('landfill.store.stage2') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
                <input type="hidden" name="uuid" value="{{ $custom_uuid }}">  
                <div class="font-manrope-400 text-sm mb-8">
                    <div class="mb-2">
                        <p class="text-step-txt mb-2">Загрузите фотографии</p>
                        <div class="mb-4 p-4 border border-dashed border-accent-b w-full rounded-[6px] block cursor-pointer sm:grid-cols-2"
                        id="multiple-uploader" data-msg="multiple-uploader">
                            <div class="mup-msg flex flex-col items-center text-center" data-msg="mup-msg">
                                <img class="p-2 mb-3" src="/images/icons/file-image.svg" alt="doc" data-msg="mup-msg">
                                <p class="text-default mb-1" data-msg="mup-msg">
                                    <span class="mr-1 text-accent-b" data-msg="mup-msg">
                                        Выберите фото
                                    </span>
                                    или перетащите
                                </p>
                                <p class="text-xs" data-msg="mup-msg">
                                    (Максимальный размер файла: 25 MB)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="text-white py-[14px] px-8 bg-accent-blue rounded-huge w-full" type="submit">
                  Продолжить
                </button>
            </form>
            <div class="steps flex gap-2 justify-center">
                <div class="step active"></div>
                <div class="step active"></div>
                <div class="step"></div>
            </div>
        </div>
    </div>
</div>

<div id="modal-step3" style="opacity:0;pointer-events:none" class="modal modal-blur fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full"></div>
    <div class="modal-container w-full py-6 md:w-11/12 md:max-w-md max-h-screen mx-auto shadow-lg z-50 overflow-y-auto">
        <div class="rounded-[20px] bg-white border border-popup-bor w-full relative p-8 pt-10 sm:py-10 sm:px-[50px] lg:px-10 lg:pt-6 lg:pb-10">
            <div class="absolute top-4 right-4 cursor-pointer" >
                <svg class="modal-close" data-modal="modal-step3" xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.03033 6.46967C6.73743 6.17678 6.26256 6.17678 5.96967 6.46967C5.67678 6.76257 5.67678 7.23744 5.96967 7.53033L10.9393 12.4999L5.96967 17.4696C5.67678 17.7625 5.67678 18.2373 5.96967 18.5302C6.26256 18.8231 6.73743 18.8231 7.03033 18.5302L12 13.5606L16.9697 18.5302C17.2626 18.8231 17.7374 18.8231 18.0303 18.5302C18.3232 18.2373 18.3232 17.7625 18.0303 17.4696L13.0607 12.4999L18.0303 7.53033C18.3232 7.23744 18.3232 6.76257 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L12 11.4393L7.03033 6.46967Z"
                          fill="#9F9FA0" />
                </svg>
            </div>
            <div class="absolute top-6 left-10 cursor-pointer flex gap-2">
                <svg class="modal-open-button" data-modal="modal-step2" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M9.60842 5.94194C9.8525 5.69786 9.8525 5.30213 9.60842 5.05806C9.36434 4.81398 8.96867 4.81398 8.72459 5.05806L3.72456 10.0581C3.60252 10.1801 3.5415 10.3401 3.5415 10.5C3.5415 10.5847 3.55837 10.6656 3.58893 10.7392C3.61943 10.8129 3.66464 10.882 3.72456 10.9419L8.72459 15.9419C8.96867 16.186 9.36434 16.186 9.60842 15.9419C9.8525 15.6978 9.8525 15.3022 9.60842 15.0581L5.67539 11.125H15.8332C16.1783 11.125 16.4582 10.8452 16.4582 10.5C16.4582 10.1548 16.1783 9.875 15.8332 9.875H5.67539L9.60842 5.94194Z"
                    fill="#737376" />
                </svg>
                <span class="text-sm text-step-txt modal-open-button"
                data-modal="modal-step2"
                >Назад</span>
            </div>
            <h2 class="pt-6 pb-2 px-4 text-center text-base/[1] sm:text-xl/[1] font-inter-600">
              Подача жалобы на незаконную свалку
            </h2>
            <p class="text-step-color text-sm/[1] text-center mb-8">
              После получения и проверки информации мы подаем жалобу и требование привести территорию в порядок
            </p>
            <form class="mb-8" action="{{ route('landfill.store.stage3') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
                <input type="hidden" name="uuid" value="{{ $custom_uuid }}">  
                <div class="font-manrope-400 text-sm text-custom-gray mb-8">
                    <label class="mb-4 block">
                        <p class="text-step-txt mb-2 inline-block">Имя<span class="text-accent-red ml-1">*</span></p>
                        <input class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active" type="text"
                          name="name"
                          placeholder="Укажите ваше имя" required>
                        <x-input-error name="name" />
                    </label>
                    <label class="mb-4 block">
                        <p class="text-step-txt mb-2 inline-block">Номер телефона<span
                            class="text-accent-red ml-1">*</span></p>
                        <input class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full phone-number active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active" type="tel"
                          name="phone"
                          autocomplete="off" 
                          placeholder="Укажите контактный номер" required>
                        <x-input-error name="phone" />
                    </label>
                    <label class="mb-4 block">
                        <span class="text-step-txt mb-2 inline-block">Комментарий</span>
                        <textarea
                          name="content"
                          class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full bg-[#f8f8f8] max-h-12 active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active"
                          placeholder="Дополнительная информация"></textarea>
                        <x-input-error name="content" />
                    </label>
                    <label class="checkbox-label mb-4 flex gap-2 items-center cursor-pointer">
                        <input name="agree" class="checkbox-main hidden" type="checkbox" id="check">
                        <div class="checkbox-label__inner flex justify-center items-center">
                            <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 4.5L2.79898 6.65877C3.17543 7.11051 3.8585 7.1415 4.27431 6.72569L10 1" stroke="#02880B"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <p class="w-full text-step-txt">
                          Согласен с <a class="underline" href="/policy-agree">Политикой обработки персональных данных</a>
                        </p>
                    </label>
                    <x-input-error name="agree" />
                </div>
                <button class="popup-complaint-btn text-white py-[14px] px-8 bg-accent-red rounded-huge w-full" type="submit">
                  Отправить жалобу
                </button>
            </form>
            <div class="steps flex gap-2 justify-center">
                <div class="step active"></div>
                <div class="step active"></div>
                <div class="step active"></div>
            </div>
        </div>
    </div>
</div>



<div id="modal-response" style="opacity:0;pointer-events:none" class="modal modal-blur fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full"></div>
    <div class="modal-container w-full my-6 md:w-11/12 md:max-w-md max-h-screen mx-auto z-50 overflow-y-auto">
        <div class="rounded-[20px] bg-white border border-popup-bor w-full relative p-8 pt-10 sm:py-10 sm:px-[50px] lg:px-10 lg:pt-6 lg:pb-10">
            <div class="absolute top-4 right-4 cursor-pointer" >
                <svg class="modal-close" data-modal="modal-response" xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.03033 6.46967C6.73743 6.17678 6.26256 6.17678 5.96967 6.46967C5.67678 6.76257 5.67678 7.23744 5.96967 7.53033L10.9393 12.4999L5.96967 17.4696C5.67678 17.7625 5.67678 18.2373 5.96967 18.5302C6.26256 18.8231 6.73743 18.8231 7.03033 18.5302L12 13.5606L16.9697 18.5302C17.2626 18.8231 17.7374 18.8231 18.0303 18.5302C18.3232 18.2373 18.3232 17.7625 18.0303 17.4696L13.0607 12.4999L18.0303 7.53033C18.3232 7.23744 18.3232 6.76257 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L12 11.4393L7.03033 6.46967Z"
                          fill="#9F9FA0" />
                </svg>
            </div>
            <div class="modal-content">
            </div>
        </div>
    </div>
</div>
