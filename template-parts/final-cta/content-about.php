<?php
/**
 * Final CTA: About
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
?>
<section class="final-cta-about">
	<?php $content->get_color_background_layers( 'final-cta', 'left-top', array( 'final-cta-bg', 'webp' ) ); ?>
	<div class="container position-relative z-3">
		<div class="final-cta__content row justify-content-center">
			<div class="col text-center py-5">
				<?php k1_get_svg_asset( 'spark-icon' ); ?>
				<h2 class="text-white">Your Healthy Ministry Plan Starts Here</h2>
				<span class="subheadline white-stroke my-5 d-block">Join our team</span>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<p class="text-white mb-5">Our greatest asset is our people. Are you looking to join a courageous team who wants to bring ministry health to the globe? We are
					looking for
					tenacious, loving, and agile leaders to join the disruption…it’s a healthy one, we promise 😉
				</p>
				<?php
				$content->cta_button(
					array(
						'text'       => 'Join Our Team',
						'html_class' => 'btn__spark-yellow--fill',
					)
				);
				?>
			</div>
		</div>
	</div>
</section>