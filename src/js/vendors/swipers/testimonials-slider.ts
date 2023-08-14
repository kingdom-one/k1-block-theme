import '../../../styles/components/swipers/_testimonials.scss';
import { newSlider } from '../swiper';

/** Call function to init slider  */
export const testimonialsSlider = () => {
	const el = document.getElementById('testimonials-swiper');
	if (!el) {
		throw new Error("couldn't find swiper!");
	}
	return newSlider(el, {
		pagination: {
			el: '.swiper-testimonials-pagination',
		},
		navigation: {
			nextEl: '.swiper-testimonials-button-next',
			prevEl: '.swiper-testimonials-button-prev',
		},
	});
};
