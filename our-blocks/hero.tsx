import "../src/styles/components/content-sections/_hero-section.scss";
import React, { useState, useEffect } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";
import { BlockConfiguration, registerBlockType } from "@wordpress/blocks";
import {
	InnerBlocks,
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
	RichText,
} from "@wordpress/block-editor";

import {
	Button,
	PanelBody,
	PanelRow,
	Panel,
	ButtonGroup,
	ColorPalette,
} from "@wordpress/components";

import { leaves3 } from "../assets/leaf-svgs";

registerBlockType("k1-block-theme/hero", {
	title: "Hero Section",
	edit: EditComponent,
	save: SaveComponent,
	supports: { align: ["full"] },
	attributes: {
		align: { type: "string", default: "full" },
		imgID: { type: "number" },
		imgUrl: { type: "string" },
		background: { type: "string" },
		hasBackgroundImage: { type: "bool" },
		headline: { type: "string", default: "Hero Section Title" },
		backgroundColor: { type: "string", default: "primary" },
		backgroundColorDirection: { type: "string", default: "left" },
	},
	category: "theme",
} as BlockConfiguration);

function EditComponent({ attributes, setAttributes }) {
	function onFileSelect({ id }) {
		setAttributes({ imgID: id });
	}

	useEffect(() => {
		if (!attributes.imgID || attributes.imgUrl) return;
		apiFetch({
			path: `/wp/v2/media/${attributes.imgID}`,
			method: "GET",
		})
			.then((response) => {
				const imgUrl =
					response.media_details.sizes.heroBanner.source_url;
				setAttributes({
					imgUrl: imgUrl,
				});
				setAttributes({ hasBackgroundImage: true });
				setAttributes({
					background: `background-image:url('${imgUrl}')`,
				});
			})
			.catch((err) => console.error(err));
	}, [attributes.imgID]);

	const [lowerDiv, setLowerDiv] = useState(
		attributes.hasBackgroundImage
			? { backgroundImage: `url('${attributes.imgUrl}')` }
			: {
					backgroundColor: `var(--color-primary--dark)`,
			  },
	);
	const [color, setColor] = useState("#00644b");

	useEffect(() => {
		setLowerDiv(
			attributes.hasBackgroundImage
				? { backgroundImage: `url('${attributes.imgUrl}')` }
				: {
						backgroundColor: color,
				  },
		);
	}, [attributes.hasBackgroundImage, color]);

	const colors = [
		{
			slug: "primary",
			color: "#00ae83",
			name: "Primary Green",
		},
		{
			slug: "primary--dark",
			color: "#00644b",
			name: "Dark Green",
		},
		{
			slug: "academy-green",
			color: "#2e3636",
			name: "Academy Green",
		},
		{
			slug: "spark-yellow",
			color: "#f4c063",
			name: "Spark Yellow",
		},
		{
			slug: "ar-purple",
			color: "#9d9dcd",
			name: "Above Reproach Purple",
		},
		{
			slug: "ar-orange",
			color: "#e37f5a",
			name: "Above Reproach Orange",
		},
	];
	const blockProps = useBlockProps();
	return (
		<section
			className="hero d-flex flex-column justify-content-center"
			id="hero">
			<InspectorControls>
				<Panel header="Background Settings">
					<PanelBody
						title="Background Color Options"
						initialOpen={true}>
						<PanelRow>
							<ColorPalette
								value={color}
								onChange={(color) => {
									setColor(color);
									setAttributes({
										backgroundColor: color,
									});
								}}
								colors={colors}
							/>
						</PanelRow>
						<PanelRow>
							<ButtonGroup
								onClick={(ev) => {
									setAttributes({
										backgroundColorDirection:
											ev.target.dataset.direction,
									});
								}}>
								<Button text="Left" data-direction="left" />
								<Button text="Right" data-direction="right" />
							</ButtonGroup>
						</PanelRow>
					</PanelBody>
					<PanelBody title="Background Image">
						<PanelRow>
							<MediaUploadCheck>
								<MediaUpload
									onSelect={onFileSelect}
									value={attributes.imgID}
									render={({ open }) => (
										<Button
											onClick={open}
											text="Choose Background Image"
										/>
									)}
								/>
							</MediaUploadCheck>
						</PanelRow>
					</PanelBody>
				</Panel>
			</InspectorControls>
			<div className="hero__background">
				<div
					className="hero__background--color"
					style={{ backgroundColor: color }}
				/>
				<div className="hero__background--lower" style={lowerDiv} />
				{attributes.hasBackgroundImage && (
					<div className="hero__background--upper"></div>
				)}
			</div>
			<div className="hero__content container d-flex flex-column align-items-stretch">
				<div className="row">
					<div className="col-1 align-self-start h-auto position-relative d-none d-md-block">
						{leaves3}
					</div>
					<div className="position-relative d-flex flex-column col-11">
						<RichText
							tagName="h1"
							className="hero__content--headline headline mb-5 text-white display-1"
							value={
								attributes.headline ??
								attributes.headline.default
							}
							onChange={(val: string) =>
								setAttributes({ headline: val })
							}
							allowedFormats={[]}
						/>
					</div>
				</div>
				<div className="row my-5 position-relative z-3">
					<div className="col-1" />
					<div className="col-lg-11">
						<div {...blockProps}>
							<InnerBlocks
								allowedBlocks={[
									"core/paragraph",
									"core/buttons",
									"core/button",
								]}
								template={[
									[
										"core/paragraph",
										{
											placeholder:
												"A subheadline section can go here.",
										},
									],
									[
										"core/buttons",
										[
											"core/button",
											{
												text: "Get Started",
												url: "/get-started",
											},
										],
									],
								]}
							/>
						</div>
					</div>
				</div>
			</div>
		</section>
	);
}
function SaveComponent() {
	const blockProps = useBlockProps.save();
	return (
		<div {...blockProps}>
			<InnerBlocks.Content />
		</div>
	);
}
