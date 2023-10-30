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