import "../../../styles/components/swipers/_relationship-first.scss";
import { newSlider } from "../swiper";

/** Call function to init slider  */
export const servicesSlider = () => {
	const el = document.getElementById("relationship-first");
	if (!el) {
		throw new Error("couldn't find swiper!");
	}
	return newSlider(el, {
		pagination: {
			el: "swiper-services-pagination",
		},
		navigation: {
			nextEl: ".swiper-services-button-next",
			prevEl: ".swiper-services-button-prev",
		},
	});
};
servicesSlider();
