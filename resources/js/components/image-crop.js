import 'cropperjs/dist/cropper.css';
import Cropper from 'cropperjs';



const image = document.querySelector('.image-crop');
if(image){
    const cropper = new Cropper(image, {
    aspectRatio: 1 / 1,
    autoCrop: true,
    minCropBoxWidth:150,
    minCropBoxHeight:150,
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
}