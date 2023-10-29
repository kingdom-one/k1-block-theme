<?php
/** AB506 Legal Update Final CTA
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
?>
<section class="legal-update-final-cta">
	<?php $content->get_color_background_layers( 'legal-update-final-cta', 'left', array( 'legal-update-final-cta-bg', 'webp' ) ); ?>
	<div class="legal-update-final-cta__content position-relative z-3 py-5">
		<div class="container">
			<div class="row">
				<h2 class='color-ar-yellow text-center'>say goodbye to setbacks!</h2>
			</div>
			<div class="row py-5 text-white justify-content-evenly">
				<?php
				$three_step_cols = array(
					array(
						'headline'    => 'register now',
						'subheadline' => 'Purchase one of the limited 60 tickets available, priced at $25',
					),
					array(
						'headline'    => 'connect & collaborate',
						'subheadline' => 'Network with other pastors and/or like-minded peers, and take the opportunity to ask Jenn your questions and learn more about the legal updates for 2024.',
					),
					array(
						'headline'    => 'empower your ministry',
						'subheadline' => 'Enjoy the confidence of knowing that your ministry has the right tools and training to help prevent future setbacks.',
					),
				);
				?>
				<?php foreach ( $three_step_cols as $index => $col ) : ?>
				<div class="col-lg-4 d-flex flex-column align-items-center text-center">
					<?php k1_get_svg_asset( 'legal-update-circle-' . ( $index + 1 ) ); ?>
					<h3 class="text-white headline mt-3 mb-5"><?php echo $col['headline']; ?></h3>
					<p class="subheadline text-sm-center text-white"><?php echo $col['subheadline']; ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="row justify-content-lg-center">
				<?php
				$content->cta_button(
					array(
						'text'        => 'Register Now',
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