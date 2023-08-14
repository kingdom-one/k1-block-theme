import { leaves3 } from "../assets/leaf-svgs";

wp.blocks.registerBlockType("k1-block-theme/hero", {
	title: "Hero Section",
	edit: EditComponent,
	save: SaveComponent,
});

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
					}}></div>
			</div>
			<div className="hero__content container d-flex flex-column align-items-stretch">
				<div className="row">
					<div className="col-1 align-self-start h-auto position-relative d-none d-md-block">
						{leaves3}
						<svg id="leaves-3" viewBox="0 0 147.637 185.88">
							<defs>
								<clipPath id="leaves-3-a">
									<rect
										className="a"
										width="147.637"
										height="185.88"></rect>
								</clipPath>
							</defs>
							<g className="b">
								<path
									className="c"
									d="M328.262,338.491c11.175,24.413-4.392,54.661-4.392,54.661s-35.992-6.646-47.167-31.059c-8.1-17.7-1.54-39.174,2.681-49.644h0l2.865-6.36S317.087,314.078,328.262,338.491Z"
									transform="translate(-263.177 -213.148)"></path>
								<path
									className="c"
									d="M50.641,348.131c-2.718-4.734-6.76-17.435-6.76-17.435s23.866-9.978,38.561-2.763c8.827,4.335,14.331,12.855,17.546,19.866a59.368,59.368,0,0,1,3.875,11.119,62.159,62.159,0,0,1-9.429,3.945c-7.927,2.619-19.478,4.789-29.161.034C58.681,359.661,53.951,353.9,50.641,348.131Z"
									transform="translate(29.745 -221.309)"></path>
								<path
									className="c"
									d="M32.809,38.588C14.539,38.822,0,20.806,0,20.806S14.045.236,32.315,0c13.248-.17,24.8,9.827,30.159,15.336l3.17,3.534h0S51.079,38.354,32.809,38.588Z"
									transform="translate(100.905 80.475) rotate(165)"></path>
							</g>
						</svg>
					</div>
					<div className="position-relative d-flex flex-column col-11">
						<h1 className="hero__content--headline headline mb-5 display-1">
							Home
						</h1>
					</div>
				</div>
			</div>
			<div className="container my-5">
				<div className="row position-relative z-3">
					<div className="col-1"></div>
					<div className="col-lg-11">
						<a href="/get-started" className="btn__primary--fill">
							Get Started
						</a>
						<a href="#" className="btn__white--outline mx-5">
							Learn More
						</a>
					</div>
				</div>
			</div>
		</section>
	);
}
function SaveComponent() {
	return <p>This is a hero block</p>;
}
