import "../../src/styles/components/_footer.scss";
import React from "@wordpress/element";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";
import PlaceholderBlock from "../utilities/PlaceholderBlock";

registerBlockType("k1-block-theme/site-footer", {
	title: "Site Footer",
	edit: EditComponent,
	save: () => null,
	supports: { align: ["full"] },
	attributes: {},
	category: "theme",
} as BlockConfiguration);

function EditComponent() {
	return <PlaceholderBlock title="Site Footer" />;
}
