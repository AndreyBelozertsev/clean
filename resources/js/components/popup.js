// popup-call
if (document.querySelector("#popup-call")) {
    const pageBtns = document.querySelectorAll(".request-a-call");
    const popupCall = document.querySelector("#popup-call");
    const popupCallSendBtn = document.querySelector("#popup-call-send");
    const popupSent = document.querySelector("#popup-sent");
    const popupCloseBtn = document.querySelectorAll(".popup-close");
    const popupCloseBg = document.querySelectorAll(".popup-bg");
  
    const addClassElem = (btn, elem, className) => {
      btn.addEventListener("click", () => {
        elem.classList.add(className);
      });
    };
    const removeClassElem = (btn, elem, className) => {
      btn.addEventListener("click", () => {
        elem.classList.remove(className);
      });
    };
  
    const changePopup = (popup, operation, ...btnArr) => {
      btnArr.forEach((btn) => {
        operation(btn, popup, "active");
      });
    };
  
    changePopup(popupCall, addClassElem, ...pageBtns);
    changePopup(popupCall, removeClassElem, ...popupCloseBtn);
    changePopup(popupCall, removeClassElem, ...popupCloseBg);
    changePopup(popupCall, removeClassElem, popupCallSendBtn);
    changePopup(popupSent, addClassElem, popupCallSendBtn);
    changePopup(popupSent, removeClassElem, ...popupCloseBtn);
    changePopup(popupSent, removeClassElem, ...popupCloseBg);
}