// menu scroll
// document.querySelectorAll(".menu a, .popup-menu__list a").forEach((link) => {
//   link.addEventListener("click", function (e) {
//     document.getElementById("popup-menu").classList.remove("active");
//     document.querySelector(".hamb__field").classList.remove("active");
//     document.querySelector("body").classList.toggle("noscroll");
//     e.preventDefault();

//     let href = this.getAttribute("href").substring(1);

//     const scrollTarget = document.getElementById(href);

//     const topOffset = 0;
//     // const topOffset = 0; // если не нужен отступ сверху
//     const elementPosition = scrollTarget.getBoundingClientRect().top;
//     const offsetPosition = elementPosition - topOffset;

//     window.scrollBy({
//       top: offsetPosition,
//       behavior: "smooth",
//     });
//   });
// });

//menu sticky
if (document.querySelector(".top-nav")) {
  // инициализируем top Navigation
  const topNavigation = document.querySelector(".top-nav");
  // попап меню - блок
  const popupMenu = document.getElementById("popup-menu");
  // Функция добавляет класс элементу в зависимости от координат окна
  function checkСoordinatesElem(elem) {
    // запуск функции по движению скролла
    window.addEventListener("scroll", function () {
      // инициализируем координаты окна по Y
      const coordWindow = window.scrollY;
      // если координаты окна больше 80, то добавляем класс, иначе - нет
      coordWindow > 0
        ? (elem.classList.add("active", "container"),
          popupMenu.classList.add("top-scroll"))
        : (elem.classList.remove("active", "container"),
          popupMenu.classList.remove("top-scroll"));
    });
  }

  checkСoordinatesElem(topNavigation);
}

// menu
if (document.querySelector("#popup-menu")) {
  // бургер
  const humb = document.querySelector(".hamb__field");
  // body
  const body = document.querySelector("body");
  // попап меню - блок
  const popupMenu = document.getElementById("popup-menu");

  // при клике на бургер выполняются действия
  humb.addEventListener("click", () => {
    // добавяем/удаляем класс active у элемента
    popupMenu.classList.toggle("active");
    // добавяем/удаляем класс active бургеру
    // humb.classList.toggle("active");
    humb.classList.toggle("active");
    // добавяем/удаляем класс noscroll у body
    body.classList.toggle("noscroll");
  });
}
