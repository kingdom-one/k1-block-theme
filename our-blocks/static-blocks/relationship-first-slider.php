<?php
/** Relationship-First Slider */

$content = new Content_Sections();
?>
<section class="stakes">
	<?php $content->get_color_background_layers( 'stakes', 'left', array( 'k1-retreat-01', 'webp' ) ); ?>
	<div class="stakes__content py-5">
		<div class="container">
			<div class="row mb-5">
				<div class="col d-flex flex-column text-center text-white">
					<h2 class="headline text-white">relationship first</h2>
					<span class="subheadline d-block mt-3 mb-5">Don't let ministry pain points stop you from fulfilling your calling. At Kingdom One, we help ministries reduce turnover,
						find
						quality
						candidates and assist with hiring & transitions. Transform your ministry work environment to be more courageous, healthy & effective with our HR, finance, and
						strategic experts. </span>
				</div>
			</div>
			<div class="stakes__content--background row mb-5">
				<div class="row align-items-stretch">
					<div class="col col-lg-6">
						<div class="swiper" id="relationship-first">
							<div class="swiper-pagination swiper-stakes-pagination"></div>
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<h3 class="headline w-75">Our Relationship First Approach Provides:</h3>
									<div class="borders row w-100 gap-2">
										<hr class="col-1 border-5 border-primary">
										<hr class="col-6 border-5">
										<hr class="col-1 border-5 border-primary">
									</div>
									<ul class="list-unstyled">
										<li>Icon <br /> <span>Community</span></li>
										<li>Icon <br /> <span>Tools</span></li>
										<li>Icon <br /> <span>Knowledge</span></li>
									</ul>
								</div>
								<div class="swiper-slide">
									<h3 class="headline w-75">Our Relationship First Approach Helps You Avoid:</h3>
									<div class="borders row w-100 gap-2">
										<hr class="col-1 border-5 border-primary">
										<hr class="col-6 border-5">
										<hr class="col-1 border-5 border-primary">
									</div>
									<ul class="list-unstyled">
										<li>A bad Thing</li>
										<li>A bad Thing</li>
										<li>A bad Thing</li>
										<li>A bad Thing</li>
										<li>A bad Thing</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="d-none d-lg-block col-lg-6 mask" style="border-radius:1rem;border:2px solid var(--color-grey);"><span class="bg-warning my-auto">MASK
							ME</span>
						<?php $content->cta_button( array( 'html_class' => 'btn__primary--fill mb-3' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>