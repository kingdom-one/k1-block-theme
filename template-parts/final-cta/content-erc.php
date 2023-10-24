<?php
/**
 * Final CTA Section: ERC
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
?>
<section class="final-cta-erc">
	<?php $content->get_color_background_layers( 'final-cta-erc', 'left-top', array( 'josh-calabrese-XXpbdU_31Sg-unsplash', 'jpg' ) ); ?>
	<div class="final-cta-erc__content container">
		<h2 class='headline text-center text-white my-5'>what are your <span class='text-primary'>next steps?</span></h2>
		<div class="final-cta-erc__steps row justify-content-around my-5">
			<?php
			$default_steps = array(
				array(
					'svg'         => 'erc-rocket-step-1',
					'headline'    => 'Get Started',
					'subheadline' => 'Let us know you’re interested
					by clicking on “Get Started.”',
				),
				array(
					'svg'         => 'erc-chat-step-2',
					'headline'    => 'Chat With Us',
					'subheadline' => 'We’ll schedule an initial meeting to learn more about you, your eligibility for ERC, and what you may qualify for.',
				),
				array(
					'svg'         => 'erc-partner-step-3',
					'headline'    => 'Partner With Us',
					'subheadline' => 'Strategize about how ERC can
					transform your organization.',
				),
			);
			?>
			<?php foreach ( $default_steps as $step ) : ?>
			<div class="final-cta-erc__steps--step-1 col-lg-4 my-5 my-lg-0">
				<?php k1_get_svg_asset( $step['svg'] ); ?>
				<h3 class="headline text-white text-center"><?php echo $step['headline']; ?></h3>
				<span class="subheadline text-white text-center"><?php echo $step['subheadline']; ?></span>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="row flex-column justify-content-center align-items-center">
			<?php $content->cta_button(); ?>
		</div>
	</div>
</section>