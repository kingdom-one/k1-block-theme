import "../../src/styles/blocks/icon-grid.scss";

import React from "@wordpress/element";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";
import PlaceholderBlock from "../utilities/PlaceholderBlock";

registerBlockType("k1-block-theme/icon-grid", {
	title: "Icon Grid",
	description: "Shows the 'Community Tools and Knowledge' Grid",
	edit: EditComponent,
	save: () => null,
	supports: { align: ["full"] },
	attributes: {},
	category: "theme",
} as BlockConfiguration);

function EditComponent() {
	return <PlaceholderBlock title="Icon Grid" />;
}
