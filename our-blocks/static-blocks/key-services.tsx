import "../../src/styles/components/content-sections/_key-services.scss";

import React from "@wordpress/element";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";
import PlaceholderBlock from "../utilities/PlaceholderBlock";

registerBlockType("k1-block-theme/key-services", {
	title: "Key Services (Featured Talent Groups)",
	edit: EditComponent,
	save: () => null,
	supports: { align: ["full"] },
	attributes: {},
	category: "theme",
} as BlockConfiguration);

function EditComponent() {
	return (
		<PlaceholderBlock
			title="Key Services"
			message="HR, Finance, Marcom & Staffing Icons with labels"
		/>
	);
}
