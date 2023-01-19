function backgroundSlide(){
    let slide = document.querySelector('#slide_show');
    let slideshow = document.querySelectorAll('#slide_show a');
    let slide2 = document.querySelector('#slide_show2');
    let slideshow2 = document.querySelectorAll('#slide_show2 a');
    let timer = "";
    let currentIndex = 0;
    let slideCount = slideshow.length;

    for(let i=0; i<slideshow.length; i++) {
        let newLeft = i * 100 + '%';
        slideshow[i].style.left = newLeft;
        slideshow2[i].style.left = newLeft;
    }

    function moveSlide(index) {
        currentIndex = index;
        let newLeft = index * -100 + '%';
        slide.style.left = newLeft;
        slide2.style.left = newLeft;
    }

    moveSlide(0);

    function startTimer() {
        timer = setInterval(function() {
            let nextIndex = (currentIndex + 1) % slideCount;
            moveSlide(nextIndex);
        }, 2000);
    }

    startTimer();

}