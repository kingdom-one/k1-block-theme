import "../../src/styles/components/swipers/_relationship-first.scss";
import React from "@wordpress/element";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";
import PlaceholderBlock from "../utilities/PlaceholderBlock";

registerBlockType("k1-block-theme/relationship-first-slider", {
	title: "Relationship First Slider",
	edit: EditComponent,
	save: () => null,
	supports: { align: ["full"] },
	attributes: {},
	category: "theme",
} as BlockConfiguration);

function EditComponent() {
	return <PlaceholderBlock title="Relationship First Slider" />;
}
