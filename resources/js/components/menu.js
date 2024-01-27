document
  .querySelectorAll(".menu a, .popup-menu__list a")
  .forEach((link) => {
    link.addEventListener("click", function (e) {

      document.getElementById("popup-menu").classList.toggle("active");
      document.querySelector("body").classList.toggle("noscroll");
      e.preventDefault();

      let href = this.getAttribute("href").substring(1);

      const scrollTarget = document.getElementById(href);

      const topOffset = 60;
      // const topOffset = 0; // если не нужен отступ сверху
      const elementPosition = scrollTarget.getBoundingClientRect().top;
      const offsetPosition = elementPosition - topOffset;

      window.scrollBy({
        top: offsetPosition,
        behavior: "smooth",
      });
    });
  });

// menu

if (document.querySelector("#popup-menu")) {
  // бургер
  const humbs = document.querySelectorAll(".hamb__field");
  // body
  const body = document.querySelector("body");
  // попап меню - блок
  const popupMenu = document.getElementById("popup-menu");

  // при клике на бургер выполняются действия
  humbs.forEach((humb) => {
    humb.addEventListener("click", () => {
      // добавяем/удаляем класс active у элемента
      popupMenu.classList.toggle("active");
      // добавяем/удаляем класс active бургеру
      // humb.classList.toggle("active");
      humbs.forEach((humb) => humb.classList.toggle("active"));
      // добавяем/удаляем класс noscroll у body
      body.classList.toggle("noscroll");
    });
  });
}
