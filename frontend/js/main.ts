import Swiper from "swiper";
import {Navigation, Grid} from "swiper/modules";

abstract class DomManipulator{
    public toggleItems(items: NodeListOf<HTMLElement>, active_class: string, force?: boolean){
		for(let item of items){
			item.classList.toggle(active_class, force);
		}
	}
    public changeStyle(items: NodeListOf<HTMLElement>, property: string, value: string){
        for(let item of items){
			item.style.setProperty(property, value);
		}
    }
}

class SliderCats extends DomManipulator{
    public tabClass: string;
    public itemClass: string;
    public tabs: NodeListOf<HTMLElement>;
    public items: NodeListOf<HTMLElement>;
    public carousel?: Swiper;

    public constructor(tabs: string, items: string, carousel: Swiper){
        super();
        this.tabClass = tabs;
        this.itemClass = items;
        this.carousel = carousel;
        this.tabs = document.querySelectorAll("."+tabs);
        this.items = document.querySelectorAll("."+items);
        for(let item of this.tabs){
            this.addEvent(item);
        }
    }
    public resetCarousel(){
        if(!this.carousel) return;
        this.carousel.update();
        this.carousel.slideTo(0);
    }
    private addEvent(item: HTMLElement){
        const button = item.querySelector("button");
        if(!button) return;
        button.addEventListener("click", () => {
            this.toggleItems(this.tabs, this.tabClass+"--active", false);
            item.classList.add(this.tabClass+"--active");
            if(!button.dataset.term){
                this.changeStyle(this.items, "display", "block");
                this.resetCarousel();
                return;
            }
            let term: string = button.dataset.term;
            this.changeStyle(this.items, "display", "none");
            let targets = document.querySelectorAll<HTMLElement>(`.${this.itemClass}[data-term="${term}"]`);
            this.changeStyle(targets, "display", "block");
            this.resetCarousel();
        });
    }
}

type TeamMember = {
    image: string,
    name: string,
    position: string,
    cite: string
};
type TeamEvent = (member: TeamMember) => void;
class TeamViewer extends DomManipulator{
    private memberClass: string;
    private currentMember?: TeamMember;
    private members: NodeListOf<HTMLElement>;
    private events: TeamEvent[] = []

    public constructor(memberClass: string){
        super();
        this.memberClass = memberClass;
        this.members = document.querySelectorAll<HTMLElement>("."+memberClass);
        for(let member of this.members){
            this.click(member);
        }
    }

    public addEvent(event: TeamEvent): this{
        this.events.push(event);
        return this;
    }

    private click(member: HTMLElement){
        member.addEventListener("click", () => {
            let image: string = member.dataset.image ?? "";
            let name: string = member.querySelector(".team__name")?.textContent ?? "Test";
            let position: string = member.querySelector(".team__position")?.textContent ?? "Test";
            let cite: string = member.querySelector(".team__cite")?.textContent ?? "Test";
            this.toggleItems(this.members, this.memberClass+"--selected", false)
            member.classList.add(this.memberClass+"--selected");
            this.currentMember = {
                image,
                name,
                position,
                cite
            };
            for(let event of this.events){
                event(this.currentMember);
            }
        });
    }
}

const casesCarousel = new Swiper(".b-cases", {
    slidesPerView: "auto",
    spaceBetween: 25,
    loop: true,
    centeredSlides: true,
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
            centeredSlides: false,
            loop: false,
        }
    },
    navigation: {
        prevEl: ".carousel__arrow--prev",
        nextEl: ".carousel__arrow--next",
    },
    modules: [Navigation]
});

new Swiper(".team__carousel", {
    slidesPerView: "auto",
    spaceBetween: 25,
    centeredSlides: true,
    loop: true,
    breakpoints: {
        768: {
            slidesPerView: 4,
            spaceBetween: 10,
            centeredSlides: false,
            loop: false,
            grid: {
                rows: 4,
            },
        }
    },
    navigation: {
        prevEl: "#team-prev",
        nextEl: "#team-next",
    },
    modules: [Navigation, Grid]
});

new Swiper(".posts-carousel", {
    slidesPerView: "auto",
    centeredSlides: true,
    spaceBetween: 25,
    loop: true,
    breakpoints: {
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: false,
            centeredSlides: false,
        }
    },
    navigation: {
        prevEl: ".carousel__arrow--prev",
        nextEl: ".carousel__arrow--next",
    },
    modules: [Navigation]
});

new SliderCats("b-cases__tabs-item", "b-cases__item", casesCarousel);

new TeamViewer("team__member")
    .addEvent((member: TeamMember) => {
        const currentImage = document.querySelector<HTMLMediaElement>(".team__current");
        const currentName = document.querySelector(".team__info-name");
        const currentPosition = document.querySelector(".team__info-position");
        const currentCite = document.querySelector(".team__info-cite");
        if(currentImage && currentName && currentPosition && currentCite){
            currentImage.src = member.image;
            currentName.textContent = member.name;
            currentPosition.textContent = member.position;
            currentCite.textContent = member.cite;
        }
    });

