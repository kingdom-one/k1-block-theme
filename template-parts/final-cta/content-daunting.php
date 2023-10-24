<?php
/**
 * Final CTA: Daunting
 */

$content = new Content_Sections();
?>
<section class="final-cta">
	<?php $content->get_color_background_layers( 'final-cta', 'left-top', array( 'final-cta-bg', 'webp' ) ); ?>
	<div class="container">
		<div class="final-cta__content d-flex row justify-content-center">
			<div class="d-none d-lg-flex col-2 align-items-center">
				<?php k1_get_svg_asset( 'leaves-3' ); ?>
			</div>
			<div class="col-lg-8 text-center py-5">
				<h2 class="text-white">The first step towards health can feel a little daunting.</h2>
				<span class="subheadline white-stroke my-5 d-block">GET STARTED TODAY</span>
				<p class="text-white">Getting help is a sign of strength and courage. It helps avoid <br> the heartache of burnout, resignation, and failure. Here's to a brighter
					ministry future where you are supported, equipped. and encouraged to grow. </p>
				<?php $content->cta_button(); ?>
			</div>
		</div>
	</div>
</section>