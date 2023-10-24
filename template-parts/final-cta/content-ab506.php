<?php
/** AB506 Final CTA */

$content = new Content_Sections();
?>
<section class="ab506-final-cta">
	<?php $content->get_color_background_layers( 'ab506-final-cta', 'left-top', array( 'ab506-final-cta-bg', 'webp' ) ); ?>
	<div class="ab506-final-cta__content position-relative z-3 py-5">
		<div class="container">
			<div class="row py-5 text-white">
				<?php
				$three_step_cols = array(
					array(
						'headline'    => 'enroll',
						'subheadline' => 'Enroll your ministry, school, or non-profit in AB-506 Training.',
					),
					array(
						'headline'    => 'notify',
						'subheadline' => 'Notify your staff of their new training opportunity, and walk with them through the process.',
					),
					array(
						'headline'    => 'celebrate',
						'subheadline' => 'Celebrate as you are now certified and confident that your staff will keep kids safe and report well!',
					),
				);
				?>
				<?php foreach ( $three_step_cols as $index => $col ) : ?>
				<div class="col-lg-4 d-flex flex-column align-items-center my-5">
					<?php k1_get_svg_asset( 'ab506-final-cta-step-' . ( $index + 1 ) ); ?>
					<h3 class="text-white headline mt-3 mb-5"><?php echo $col['headline']; ?></h3>
					<p class="subheadline text-sm-center text-white"><?php echo $col['subheadline']; ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="row justify-content-lg-center">
				<?php
				$content->cta_button(
					array(
						'text'        => 'Enroll Now',
						'link'        => 'https://academy.kingdomone.co',
						'is_external' => true,
						'html_class'  => 'btn__ar-yellow--outline',
					)
				);
				?>
			</div>
		</div>
	</div>
</section>