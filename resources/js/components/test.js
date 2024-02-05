document.addEventListener('click', function(e){
    console.log(e.target);
})

if (document.querySelector(".img-input")) {
    const input = document.querySelector(".img-input");
    const imgPlace = document.querySelector(".img-place");
    const imgLabel = document.querySelector(".img-label");
    let imagesArr = [];


    imgLabel.addEventListener('click', function(){
        input.click();
    })
  
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
  
    input.addEventListener("change", function(e){
        render(e.target);
    });

    function itemDel(index) {
        const dt = new DataTransfer()
        const inputt = document.getElementById('img-input')
        const { files } = inputt
        
        for (let i = 0; i < files.length; i++) {
          const file = files[i]
          if (index !== i)
            dt.items.add(file) // here you exclude the file. thus removing it.
        }
        
        inputt.files = dt.files // Assign the updates list
        console.log(inputt.files)
        render(inputt);
    }


  
    function render(input) {
      if (input.files.length == 0) {
        imgPlace.innerHTML = defaultInner;
        imgPlace.classList.remove("active");
        return;
      }

        imgPlace.classList.add("active");
        imgPlace.innerHTML = '';

        for(let i = 0; i < input.files.length; i++ ){
            console.log( input.files);
            let img = getNoteTemplate(input.files[i], i);
            img.getElementsByClassName('img-delete')[0].addEventListener('click', ('click', function(){
                itemDel(i);
            }));

            imgPlace.appendChild(img);
        }
    }
  
  
    function getNoteTemplate(element, i, flag = false) {

        const elWrap = document.createElement('div');
        elWrap.className = `img-wrapper ${flag ? "img-wrapper-one" : ""}`;
        const elDelButton = document.createElement('button');
        elDelButton.className = 'img-delete';
        const elImg = document.createElement('img');
        elImg.className = 'img-inner';
        elImg.src = window.URL.createObjectURL(element);
        
        elWrap.appendChild(elDelButton);

        elWrap.appendChild(elImg);
 
        return elWrap;

    }
  
    const fileTypes = ["image/jpeg", "image/jpg", "image/png"];
    function validFileType(file) {
      for (let i = 0; i < fileTypes.length; i++) {
        if (file.type === fileTypes[i]) {
          return true;
        }
      }
  
      return false;
    }


}
