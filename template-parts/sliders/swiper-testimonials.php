<?php
/**
 * Brands Swiper
 * powered by Swiper.js
 *
 * @package KingdomOne
 */

$testimonials = new WP_Query(
	array(
		'post_type'      => 'testimonial',
		'posts_per_page' => -1,
	)
);

?>
<?php if ( $testimonials->have_posts() ) : ?>
<aside class="testimonials text-center py-5">
	<div class="container">
		<div class="row">
			<div class="swiper" id="testimonials-swiper">
				<div class="swiper-wrapper">
					<?php while ( $testimonials->have_posts() ) : ?>
						<?php $testimonials->the_post(); ?>
					<div class="swiper-slide d-flex justify-content-center">
						<div class="internal-slide d-flex flex-column align-items-center border border-2 border-black py-5 w-75">
							<?php the_post_thumbnail( null, 'post-thumbnail', ); ?>
							<p class="quote fw-bold mt-5 text-center col-md-6">"<?php echo esc_textarea( get_field( 'quote' ) ); ?>"</p>
							<div class="quote__attribution">
								<?php the_title( '<p class="subheadline quote__attribution--name fs-2">', '</p>' ); ?>
								<p class="subheadline quote__attribution--role fs-5">
									<?php echo esc_textarea( get_field( 'position' ) ); ?>
								</p>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<div class="swiper-button-prev swiper-testimonials-button-prev"></div>
				<div class="swiper-button-next swiper-testimonials-button-next"></div>
			</div>
		</div>
		<div class="row mt-5 pt-5">
			<div class="swiper-pagination swiper-testimonials-pagination"></div>
		</div>
	</div>
</aside>
<?php endif; ?>