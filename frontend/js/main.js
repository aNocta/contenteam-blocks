import Swiper from "swiper";
import {Navigation} from "swiper/modules";

const casesCarousel = new Swiper(".b-cases", {
    slidesPerView: 2,
    spaceBetween: 40,
    navigation: {
        prevEl: ".carousel__arrow--prev",
        nextEl: ".carousel__arrow--next",
    },
    modules: [Navigation]
});


const casesTabs = document.querySelectorAll(".b-cases__tabs-item");
const cases = document.querySelectorAll(".b-cases__item");
for(let item of casesTabs){
    const button = item.querySelector("button");
    button.addEventListener("click", () => {
        for(let item of casesTabs){
            item.classList.remove("b-cases__tabs-item--active");
        }
        item.classList.add("b-cases__tabs-item--active");
        if(!button.dataset.term){
            for(let item of cases){
                item.style.display = "block";
            }
            casesCarousel.update();
            casesCarousel.slideTo(0);
            return;
        }
        for(let item of cases){
            item.style.display = "none";
        }
        let targets = document.querySelectorAll(`.b-cases__item[data-term="${button.dataset.term}"]`);
        for(let item of targets){
            item.style.display = "block";
        }
        casesCarousel.update();
        casesCarousel.slideTo(0);
    });
}