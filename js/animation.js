autoSlider();
let i = 1;
function autoSlider() {
    let timer = setTimeout(function () {
        let photos = ['img/slider1.jpg','img/slider2.jpg','img/slider3.jpeg', 'img/slider4.jpg', 'img/slider5.jpg', 'img/slider6.jpg']
        let slider = document.getElementById('promo-photo')
        let currentPhoto = photos[i];
        i++;
        if(i > photos.length - 1){
            i = 0;
            clearTimeout(timer);
        }
        slider.style.backgroundImage = 'url("'+currentPhoto+'")';
        autoSlider();
    },6000);
}





