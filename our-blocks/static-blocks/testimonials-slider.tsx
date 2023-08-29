import "../../src/styles/components/swipers/_testimonials.scss";
import React from "@wordpress/element";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";
import PlaceholderBlock from "../utilities/PlaceholderBlock";

registerBlockType("k1-block-theme/testimonials-slider", {
	title: "Testimonials Slider",
	edit: EditComponent,
	save: () => null,
	supports: { align: ["full"] },
	attributes: {},
	category: "theme",
} as BlockConfiguration);

function EditComponent() {
	return (
		<PlaceholderBlock
			title="Testimonials Slider"
			message="Individual slides can be edited
	with the WordPress Dashboard."
		/>
	);
}
