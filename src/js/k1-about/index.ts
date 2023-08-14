import '../../styles/pages/k1-about.scss';
import { newSlider } from '../vendors/swiper';

const staff = document.getElementById('staff-swiper');
if (staff) {
	newSlider(staff, { spaceBetween: 40 });
} else {
	console.warn('No Staff Slider Found');
}
