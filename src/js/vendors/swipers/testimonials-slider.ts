import "../../../styles/components/swipers/_testimonials.scss";
import { newSlider } from "../swiper";

/** Call function to init slider  */
export const testimonialsSlider = (el?: HTMLElement) => {
	const defaultEl = document.getElementById("testimonials-swiper");
	const slider = el ?? defaultEl;

	if (!slider) {
		throw new Error("couldn't find swiper!");
	}
	return newSlider(slider, {
		pagination: {
			el: ".swiper-testimonials-pagination",
		},
		navigation: {
			nextEl: ".swiper-testimonials-button-next",
			prevEl: ".swiper-testimonials-button-prev",
		},
	});
};

testimonialsSlider();
