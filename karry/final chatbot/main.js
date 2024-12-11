$(document).ready(function(){
     $(window).scroll(function(){
         if(this.scrollY > 20){
             $('.navbar').addClass("sticky");
         }else{
             $('.navbar').removeClass("sticky");
         }
     })
});

document.addEventListener('DOMContentLoaded', function () {
    let currentIndex = 0;

    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;

    function showSlide(index) {
        if (index >= totalSlides) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalSlides - 1;
        } else {
            currentIndex = index;
        }
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;


    }

    window.nextSlide = function () {
        showSlide(currentIndex + 1);
    }

    window.prevSlide = function () {
        showSlide(currentIndex - 1);
    }

    setInterval(nextSlide, 3000); // Change image every 3 seconds
});

