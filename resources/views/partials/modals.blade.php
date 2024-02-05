<section class="hidden popup-complaint overflow-auto" id="popup-complaint-step-1">
    <div class="fixed z-50 top-0 bottom-0 right-0 left-0 flex justify-center items-center">
      <div class="popup-bg bg-alpha absolute backdrop-blur-md h-full w-full cursor-pointer"></div>
      <div
        class="rounded-[20px] bg-white border border-popup-bor w-full relative max-w-[80%] p-8 pt-10 sm:py-10 sm:px-[50px] lg:px-10 lg:pt-6 lg:pb-10 md:max-w-[408px]">
        <div class="popup-close absolute top-4 right-4 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7.03033 6.46967C6.73743 6.17678 6.26256 6.17678 5.96967 6.46967C5.67678 6.76257 5.67678 7.23744 5.96967 7.53033L10.9393 12.4999L5.96967 17.4696C5.67678 17.7625 5.67678 18.2373 5.96967 18.5302C6.26256 18.8231 6.73743 18.8231 7.03033 18.5302L12 13.5606L16.9697 18.5302C17.2626 18.8231 17.7374 18.8231 18.0303 18.5302C18.3232 18.2373 18.3232 17.7625 18.0303 17.4696L13.0607 12.4999L18.0303 7.53033C18.3232 7.23744 18.3232 6.76257 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L12 11.4393L7.03033 6.46967Z"
              fill="#9F9FA0" />
          </svg>
        </div>
        <h2 class="py-2 px-4 text-center text-base/[1] sm:text-xl/[1] font-inter-600">
          Подача жалобы на незаконную свалку
        </h2>
        <p class="text-step-color text-sm/[1] text-center mb-8">
          После получения и проверки информации мы подаем жалобу и требование привести территорию в порядок
        </p>
        <form class="mb-8" action="{{ route('landfill.store.stage1') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
          <input type="hidden" name="uuid" value="{{ $custom_uuid }}">
          <div class="font-manrope-400 text-sm text-custom-gray mb-8">
            <label class="mb-4 block">
              <span class="text-step-txt mb-2 inline-block">Муниципальное образование<span
                  class="text-accent-red ml-1">*</span></span>
              <select name="city_id" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full" required>
                <option value="1">Выберите из списка</option>
                <option value="2">Выберите из списка 2</option>
                <option value="3">Выберите из списка 3</option>
              </select>
              <x-input-error name="city_id" />
            </label>
            <label class="mb-4">
              <span class="text-step-txt mb-2 inline-block">Адрес свалки<span class="text-accent-red ml-1">*</span></span>
              <input name="address" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full" type="text"
                placeholder="Укажите адрес" required>
            </label>
            <x-input-error name="address" />
          </div>
          <div>
              <label for="coordinates">Координаты</label>
              <div id="landfill-map-single" class="w-full h-[200px]"></div>
              <x-input-error name="coordinates" />
              <input id="coordinates" type="hidden" name="coordinates" value="{{ old('coordinates') }}">
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
  </section>

  <section class="hidden popup-complaint overflow-auto" id="popup-complaint-step-2">
    <div class="fixed z-50 top-0 bottom-0 right-0 left-0 flex justify-center items-center">
      <div class="popup-bg bg-alpha absolute backdrop-blur-md h-full w-full cursor-pointer"></div>
      <div
        class="rounded-[20px] bg-white border border-popup-bor w-full relative max-w-[80%] p-8 sm:py-10 sm:px-[50px] lg:px-10 pt-[68px] lg:pb-10 md:max-w-[408px]">
        <div class="popup-close absolute top-4 right-4 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7.03033 6.46967C6.73743 6.17678 6.26256 6.17678 5.96967 6.46967C5.67678 6.76257 5.67678 7.23744 5.96967 7.53033L10.9393 12.4999L5.96967 17.4696C5.67678 17.7625 5.67678 18.2373 5.96967 18.5302C6.26256 18.8231 6.73743 18.8231 7.03033 18.5302L12 13.5606L16.9697 18.5302C17.2626 18.8231 17.7374 18.8231 18.0303 18.5302C18.3232 18.2373 18.3232 17.7625 18.0303 17.4696L13.0607 12.4999L18.0303 7.53033C18.3232 7.23744 18.3232 6.76257 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L12 11.4393L7.03033 6.46967Z"
              fill="#9F9FA0" />
          </svg>
        </div>
        <div class="popup-back absolute top-6 left-10 cursor-pointer flex gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M9.60842 5.94194C9.8525 5.69786 9.8525 5.30213 9.60842 5.05806C9.36434 4.81398 8.96867 4.81398 8.72459 5.05806L3.72456 10.0581C3.60252 10.1801 3.5415 10.3401 3.5415 10.5C3.5415 10.5847 3.55837 10.6656 3.58893 10.7392C3.61943 10.8129 3.66464 10.882 3.72456 10.9419L8.72459 15.9419C8.96867 16.186 9.36434 16.186 9.60842 15.9419C9.8525 15.6978 9.8525 15.3022 9.60842 15.0581L5.67539 11.125H15.8332C16.1783 11.125 16.4582 10.8452 16.4582 10.5C16.4582 10.1548 16.1783 9.875 15.8332 9.875H5.67539L9.60842 5.94194Z"
              fill="#737376" />
          </svg>
          <span class="text-sm text-step-txt">Назад</span>
        </div>
        <h2 class="py-2 px-4 text-center text-base/[1] sm:text-xl/[1] font-inter-600">
          Подача жалобы на незаконную свалку
        </h2>
        <p class="text-step-color text-sm/[1] text-center mb-8">
          После получения и проверки информации мы подаем жалобу и требование привести территорию в порядок
        </p>
        <form class="mb-8" action="#">
          <div class="font-manrope-400 text-sm mb-8">
            <div class="mb-2">
              <p class="text-step-txt mb-2">Загрузите фотографии</p>
              <label class="mb-4 p-4 border border-dashed border-accent-blue w-full rounded-[6px] cursor-pointer block">
                <input class="img-input hidden" multiple="multiple" type="file">
                <div class="img-place flex flex-col items-center">
                  <img class="p-2 mb-3" src="/images/icons/file-image.svg" alt="doc">
                  <p class="text-sm text-default mb-1">
                    <span class="mr-1 text-accent-blue">
                      Выберите фото
                    </span>
                    или перетащите
                  </p>
                  <p class="text-xs">
                    (Максимальный размер файла: 25 MB)
                  </p>
                </div>
              </label>
            </div>
            <label class="preview p-4 w-full border border-step-color rounded-[12px] cursor-pointer block">
              <p class="mb-2 font-inter-700 overflow-ellipsis w-full whitespace-nowrap overflow-hidden">
                img_dlinnoenazvanie_chtoby_pokazanm.jpg</p>
              <p class="text-accent-blue">40% Загрузка · 8.77 MB</p>
            </label>
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
  </section>

  <section class="hidden popup-complaint overflow-auto" id="popup-complaint-step-2">
    <div class="fixed z-50 top-0 bottom-0 right-0 left-0 flex justify-center items-center">
      <div class="popup-bg bg-alpha absolute backdrop-blur-md h-full w-full cursor-pointer"></div>
      <div
        class="rounded-[20px] bg-white border border-popup-bor w-full relative max-w-[80%] p-8 sm:py-10 sm:px-[50px] lg:px-10 pt-[68px] lg:pb-10 md:max-w-[408px]">
        <div class="popup-close absolute top-4 right-4 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7.03033 6.46967C6.73743 6.17678 6.26256 6.17678 5.96967 6.46967C5.67678 6.76257 5.67678 7.23744 5.96967 7.53033L10.9393 12.4999L5.96967 17.4696C5.67678 17.7625 5.67678 18.2373 5.96967 18.5302C6.26256 18.8231 6.73743 18.8231 7.03033 18.5302L12 13.5606L16.9697 18.5302C17.2626 18.8231 17.7374 18.8231 18.0303 18.5302C18.3232 18.2373 18.3232 17.7625 18.0303 17.4696L13.0607 12.4999L18.0303 7.53033C18.3232 7.23744 18.3232 6.76257 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L12 11.4393L7.03033 6.46967Z"
              fill="#9F9FA0" />
          </svg>
        </div>
        <div class="popup-back absolute top-6 left-10 cursor-pointer flex gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M9.60842 5.94194C9.8525 5.69786 9.8525 5.30213 9.60842 5.05806C9.36434 4.81398 8.96867 4.81398 8.72459 5.05806L3.72456 10.0581C3.60252 10.1801 3.5415 10.3401 3.5415 10.5C3.5415 10.5847 3.55837 10.6656 3.58893 10.7392C3.61943 10.8129 3.66464 10.882 3.72456 10.9419L8.72459 15.9419C8.96867 16.186 9.36434 16.186 9.60842 15.9419C9.8525 15.6978 9.8525 15.3022 9.60842 15.0581L5.67539 11.125H15.8332C16.1783 11.125 16.4582 10.8452 16.4582 10.5C16.4582 10.1548 16.1783 9.875 15.8332 9.875H5.67539L9.60842 5.94194Z"
              fill="#737376" />
          </svg>
          <span class="text-sm text-step-txt">Назад</span>
        </div>
        <h2 class="py-2 px-4 text-center text-base/[1] sm:text-xl/[1] font-inter-600">
          Подача жалобы на незаконную свалку
        </h2>
        <p class="text-step-color text-sm/[1] text-center mb-8">
          После получения и проверки информации мы подаем жалобу и требование привести территорию в порядок
        </p>
        <form class="mb-8" action="#">
          <div class="font-manrope-400 text-sm text-custom-gray mb-8">
            <label class="mb-4 block">
              <span class="text-step-txt mb-2 inline-block">Имя<span class="text-accent-red ml-1">*</span></span>
              <input class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full" type="text"
                placeholder="Укажите ваше имя" required>
            </label>
            <label class="mb-4 block">
              <span class="text-step-txt mb-2 inline-block">Номер телефона<span
                  class="text-accent-red ml-1">*</span></span>
              <input class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full" type="tel"
                placeholder="Укажите контактный номер" required>
            </label>
            <label class="mb-4 block">
              <span class="text-step-txt mb-2 inline-block">Комментарий</span>
              <textarea
                class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full bg-[#f8f8f8] max-h-12"
                placeholder="Дополнительная информация"></textarea>
            </label>
            <label class="checkbox-label mb-4 flex gap-2 items-center cursor-pointer">
              <input class="checkbox-main hidden" type="checkbox" id="check">
              <div class="checkbox-label__inner flex justify-center items-center">
                <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 4.5L2.79898 6.65877C3.17543 7.11051 3.8585 7.1415 4.27431 6.72569L10 1" stroke="#02880B"
                    stroke-linecap="round" />
                </svg>
              </div>
              <p class="w-full text-step-txt">
                Согласен с <a class="underline" href="#">Политикой обработки персональных данных</a>
              </p>
            </label>
            </label>
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
  </section>