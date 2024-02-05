import 'cropperjs/dist/cropper.css';
import Cropper from 'cropperjs';

const cropperImgBlock = document.getElementById('crop_block');

if (cropperImgBlock) {
    const image = cropperImgBlock.querySelector("#image-crop");
    const fileInput = cropperImgBlock.querySelector("#thumbnail");
    const imageContainer = cropperImgBlock.querySelector(".image-container");
    const previewButton = cropperImgBlock.querySelector("#preview-btn");
    const previewImage = cropperImgBlock.querySelector("#preview-image");
    const previewImageContainer = cropperImgBlock.querySelector(".preview-container");
  
    let cropper = "";
    let fileName = "";
  
    fileInput.onchange = () => {
        previewImage.src = "";
        imageContainer.classList.remove("hidden");
        previewButton.classList.remove("hidden");
        previewImageContainer.classList.add("hidden");
        
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
            minCropBoxWidth: 500,
            minCropBoxHeight: 500,
            background: false,
            zoomable: false,
            mouseWheelZoom: false,
            touchDragZoom: false,
            rotatable: false,
            crop(event) {
                cropperImgBlock.querySelector('input[name="crop[x]"').value = Math.round(event.detail.x);
                cropperImgBlock.querySelector('input[name="crop[y]"').value = Math.round(event.detail.y);
                cropperImgBlock.querySelector('input[name="crop[width]"').value = Math.round(event.detail.width);
                cropperImgBlock.querySelector('input[name="crop[height]"').value = Math.round(event.detail.height);
            },
        });
        };
        fileName = fileInput.files[0].name.split('.')[0];
    };
  
    previewButton.addEventListener('click', (e)=>{
        e.preventDefault();
        imageContainer.classList.add('hidden');
        previewButton.classList.add("hidden");
        previewImageContainer.classList.remove("hidden");
        previewImage.src = cropper.getCroppedCanvas().toDataURL();;
    })
}