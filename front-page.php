<?php
/**
 * The Front Page
 */

get_header();
$content = new Content_Sections();
k1_enqueue_page_assets( 'frontPage' );
?>
<main class="site-content">
	<?php the_content();?>
	<section class="projects py-5">
		<?php $content->get_color_background_layers( 'projects', 'zig-zag-left', ); ?>
		<div class="z-3 position-relative py-5 my-5">
			<div class="container">
				<div class="row justify-content-center mt-5">
					<div class="col-lg-10 text-center">
						<h2 class="text-white">Recent Partnerships</h2>
						<p class="subheadline text-white">We have had the privilege of partnering with so many amazing ministries. Below is some of the recent work that we have had the
							opportunity to be a part of.</p>
					</div>
				</div>
			</div>
			<?php get_template_part( 'template-parts/sliders/swiper', 'brands' ); ?>
		</div>
	</section>
	<aside class="video-testimonial">
		<div class="container">
			<div class="row justify-content-center">
				<lite-youtube videoid='ClhiWrVCNkg' playlabel='Hume Lake Christian Camp and Kingdom One'></lite-youtube>
			</div>
		</div>
	</aside>
	<section class="ministry-plan">
		<?php $content->get_color_background_layers( 'ministry-plan', 'left-top', array( 'josh-calabrese-XXpbdU_31Sg-unsplash', 'jpg' ) ); ?>
		<div class="ministry-plan__content position-relative z-3 py-5">
			<div class="container">
				<div class="ministry-plan__header row">
					<div class="col text-center">
						<h2 class="headline text-white">Decide to make a ministry change</h2>
						<p class="white-stroke my-5">get started today</p>
						<div class="subheadline text-white">Your role isn't easy (we know, we've been there!), but your job is so necessary to your Ministry's Health. Our mission is to build
							healthy
							people & strategies that help the Church thrive so you never have to second guess your ministry efforts.</div>
					</div>
				</div>
				<div class="ministry-plan__steps row justify-content-evenly my-5">
					<?php get_template_part( 'template-parts/final-cta/content', 'ministry-change' ); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();