import React from "@wordpress/element";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType("k1-block-theme/hero", {
	title: "Hero Section",
	edit: EditComponent,
	save: SaveComponent,
	supports: { align: ["full"] },
	attributes: { type: "string", default: "full" },
	category: "theme",
} as BlockConfiguration);

function EditComponent() {
	return (
		<section
			className="hero d-flex flex-column justify-content-center"
			id="hero">
			<div className="hero__background">
				<div
					className="hero__background--lower"
					style={{
						backgroundColor: `var(--color-primary--dark)`,
					}}
				/>
			</div>
			<InnerBlocks allowedBlocks={["k1-block-theme/hero-content"]} />
		</section>
	);
}
function SaveComponent() {
	return (
		<section
			className="hero d-flex flex-column justify-content-center"
			id="hero">
			<div className="hero__background">
				<div
					className="hero__background--lower"
					style={{
						backgroundColor: `var(--color-primary--dark)`,
					}}
				/>
			</div>
			<InnerBlocks.Content />
		</section>
	);
}
