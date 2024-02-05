import 'cropperjs/dist/cropper.css';
import Cropper from 'cropperjs';



// const image = document.querySelector('.image-crop');
// if(image){
//     const cropper = new Cropper(image, {
//     aspectRatio: 1 / 1,
//     autoCrop: true,
//     minCropBoxWidth:150,
//     minCropBoxHeight:150,
//     background: false,
//     zoomable: false,
//     mouseWheelZoom: false,
//     touchDragZoom: false,
//     rotatable: false,
//     crop(event) {
//         console.log(event.detail.x);
//         console.log(event.detail.y);
//         console.log(event.detail.width);
//         console.log(event.detail.height);
//     },
//     });
// }

// crop img
const image = document.getElementById("image-crop");
if (image) {
  const fileInput = document.getElementById("file");
  const imageContainer = document.querySelector(".image-container");
  const previewButton = document.getElementById("preview-btn");
  const previewImage = document.getElementById("preview-image");
  
  let cropper = "";
  let fileName = "";
  
  fileInput.onchange = () => {
    previewImage.src = "";
  
    const reader = new FileReader();
  
    reader.readAsDataURL(fileInput.files[0]);
  
    reader.onload = () => {
      image.setAttribute("src", reader.result);
      imageContainer.classList.remove("w-[60%]");
      imageContainer.classList.add('w-max');
  
      if (cropper) {
        cropper.destroy();
      }
  
      cropper = new Cropper(image, {
        aspectRatio: 1 / 1,
        autoCrop: true,
        minCropBoxWidth: 150,
        minCropBoxHeight: 150,
        background: false,
        zoomable: false,
        mouseWheelZoom: false,
        touchDragZoom: false,
        rotatable: false,
        crop(event) {
          console.log(event.detail.x);
          console.log(event.detail.y);
          console.log(event.detail.width);
          console.log(event.detail.height);
        },
      });
    };
    fileName = fileInput.files[0].name.split('.')[0];
  };
  
  previewButton.addEventListener('click', (e)=>{
    e.preventDefault();
    let imgSrc = cropper.getCroppedCanvas().toDataURL();
    console.log(fileInput.files[0]);
    previewImage.src = imgSrc;
    fileInput.files[0] = imgSrc;
    console.log(fileInput.files[0]);
  })
}