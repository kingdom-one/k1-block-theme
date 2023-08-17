import "../src/styles/components/swipers/_testimonials.scss";
import React from "@wordpress/element";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";

registerBlockType("k1-block-theme/testimonials-slider", {
	title: "Testimonials Slider",
	edit: EditComponent,
	save: () => null,
	supports: { align: ["full"] },
	attributes: {},
	category: "theme",
} as BlockConfiguration);

function EditComponent() {
	const swiper_slides = [
		...Array.from({ length: 9 }, (x) => ({
			image: undefined,
			quote: "Kingdom One brings a level of professionalism that we need and does so with Christ at the center.",
			attribution: "Tim Kuhl",
			role: "Pastor, Some Church",
		})),
	];

	return (
		<aside className="testimonials text-center py-5">
			<div className="container-fluid">
				<div className="row">
					<div className="swiper" id="testimonials-swiper">
						<div className="swiper-wrapper">
							{swiper_slides.map((slide, i) => {
								return (
									<div className="swiper-slide" key={i}>
										<img src={slide.image ?? ""} />
										<p className="quote">{slide.quote}</p>
										<div className="quote__attribution">
											<span className="subheadline quote__attribution--name">
												{slide.attribution}
											</span>
											<span className="subheadline quote__attribution--role">
												{slide.role}
											</span>
										</div>
									</div>
								);
							})}
						</div>
						<div className="swiper-button-prev swiper-testimonials-button-prev"></div>
						<div className="swiper-button-next swiper-testimonials-button-next"></div>
					</div>
				</div>
				<div className="row mt-5 pt-5">
					<div className="swiper-pagination swiper-testimonials-pagination"></div>
				</div>
			</div>
		</aside>
	);
}
