// popup-call
if (document.querySelector("#popup-complaint-step-1")) {
  const body = document.querySelector("body");
  // кнопка в header
  const pageBtn = document.querySelector(".request-a-call");
  // все попапы в массииве
  const popupsCall = document.querySelectorAll(".popup-complaint");
  // кнопка продолжить
  const popupCallContinueBtns = document.querySelectorAll(
    ".popup-complaint-btn"
  );
  // кнопка назад
  const popupBackBtns = document.querySelectorAll(".popup-back");
  // кнопка закрытия
  const popupCloseBtn = document.querySelectorAll(".popup-close");
  // фон для закрытия
  const popupCloseBg = document.querySelectorAll(".popup-bg");

  // функция добавляет определенный класс элементу при нажатии кнопки
  const addClassElem = (btn, elem, className) => {
    btn.addEventListener("click", () => {
      elem.classList.add(className);
      body.classList.add("noscroll"); 
    });
  };

  // функция удаляет определенный класс элементу при нажатии кнопки
  const removeClassElem = (btn, elem, className) => {
    btn.addEventListener("click", () => {
      elem.classList.remove(className);
    });
  };

  // функция по добавлению и удалению класса попапу
  // попап, функция (добавить/удалить), ...кнопки
  const changePopup = (popup, operation, ...btnArr) => {
    btnArr.forEach((btn) => {
      operation(btn, popup, "active");
    });
  };

  // Функция по удалению определенного класса
  // Исользуется для нескольких элементов
  const removeClassElems = (popups, className, index) => {
    popups.forEach((popup, j) => {
      index === j ? popup.classList.remove(className) : "";
      body.classList.remove("noscroll");
    });
  };

  const disablePopups = (btns, popups, operation) => {
    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        operation(popups, "active", i);
      });
    });
  };

  // 1) Вызов первого попапа
  changePopup(popupsCall[0], addClassElem, pageBtn);

  // 2) Удаление попапов

  disablePopups(popupCloseBtn, popupsCall, removeClassElems);
  disablePopups(popupCloseBg, popupsCall, removeClassElems);

  popupCallContinueBtns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
      removeClassElems(popupsCall, "active", i);
      body.classList.remove("noscroll");
      if (i < popupCallContinueBtns.length - 1) {
        popupsCall[i + 1].classList.add("active");
        body.classList.add("noscroll");
      }
    });
  });

  popupBackBtns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
      if (i < popupBackBtns.length) {
        popupsCall[i + 1].classList.remove("active");
        popupsCall[i].classList.add("active");
      }
    });
  });
}

// add img
if (document.querySelector(".img-input")) {
  const input = document.querySelector(".img-input");
  const preview = document.querySelector(".preview");
  const imgPlace = document.querySelector(".img-place");

  const defaultInner = `
  <img class="p-2 mb-3" src="/images/icons/file-image.svg" alt="doc">
  <p class="text-sm text-default mb-1">
    <span class="mr-1 text-accent-b">
      Выберите фото
    </span>
    или перетащите
  </p>
  <p class="text-xs">
    (Максимальный размер файла: 25 MB)
  </p>
  `;

  input.addEventListener("change", updateImageDisplay);
  imgPlace.addEventListener("dragenter", updateImageDisplay);
  imgPlace.addEventListener("dragover", updateImageDisplay);
  imgPlace.addEventListener("dragleave", updateImageDisplay);
  imgPlace.addEventListener("drop", updateImageDisplay);

  function updateImageDisplay() {
    while (preview.firstChild && imgPlace.innerHTML) {
      preview.removeChild(preview.firstChild);
      imgPlace.innerHTML = "";
    }
    const curFiles = input.files;
    if (curFiles.length === 0) {
      preview.innerHTML = `
      <p class="mb-2 font-inter-700 overflow-ellipsis w-full whitespace-nowrap overflow-hidden">
      img_dlinnoenazvanie_chtoby_pokazanm.jpg</p>
      <p class="text-accent-b">40% Загрузка · 8.77 MB</p>`;
      imgPlace.innerHTML = defaultInner;
    } else {
      const para1 = document.createElement("p");
      const para2 = document.createElement("p");
      para1.classList.add(
        "mb-2",
        "font-inter-700",
        "overflow-ellipsis",
        "w-full",
        "whitespace-nowrap",
        "overflow-hidden"
      );
      para2.classList.add("text-accent-b");
      preview.innerHTML = "";
      preview.appendChild(para1);
      preview.appendChild(para2);
      for (let i = 0; i < curFiles.length; i++) {
        if (validFileType(curFiles[i])) {
          para1.textContent = curFiles[i].name;
          para2.textContent = `100% Загрузка · ${returnFileSize(
            curFiles[i].size
          )}`;
          const image = document.createElement("img");
          image.src = window.URL.createObjectURL(curFiles[i]);
          imgPlace.appendChild(image);
        } else {
          imgPlace.innerHTML = defaultInner;
          para1.textContent = curFiles[i].name;
          para1.textContent = "Not a valid file type. Update your selection.";
          preview.appendChild(para1);
          preview.appendChild(para2);
        }
      }
    }
  }

  var fileTypes = ["image/jpeg", "image/pjpeg", "image/png"];

  function validFileType(file) {
    for (var i = 0; i < fileTypes.length; i++) {
      if (file.type === fileTypes[i]) {
        return true;
      }
    }

    return false;
  }

  function returnFileSize(number) {
    if (number < 1024) {
      return number + "bytes";
    } else if (number > 1024 && number < 1048576) {
      return (number / 1024).toFixed(1) + "KB";
    } else if (number > 1048576) {
      return (number / 1048576).toFixed(1) + "MB";
    }
  }
}

//tabs
if (document.querySelector(".tabs")) {
  const tabsBtn = document.querySelectorAll(".tabs-btn");
  const filterItems = document.querySelectorAll(".filter-items>div");

  tabsBtn.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const filter = e.currentTarget.dataset.filter;

      tabsBtn.forEach((btn) => {
        btn.classList.remove("active");
      });
      btn.classList.add("active");

      filterItems.forEach((item) => {
        if (filter === "all") {
          item.style.display = "flex";
        } else if (item.classList.contains(filter)) {
          item.style.display = "flex";
        } else {
          item.style.display = "none";
        }
      });
    });
  });

  // filterItems.forEach((item) => {
  //   item.classList.contains("cat-b")
  //     ? (item.style.display = "block")
  //     : (item.style.display = "none");
  // });
}