<?php
/**
 * Ministry Change
 * Seen on Home & About Page
 *
 * @package KingdomOne
 */

$content       = new Content_Sections();
$default_steps = array(
	array(
		'svg'         => 'icon-checklist-step-1',
		'headline'    => 'Take Our Assessment',
		'subheadline' => 'Take our Healthy Ministry Assessment today to find your ministry quality score.',

	),
	array(
		'svg'         => 'icon-handshake-step-2',
		'headline'    => 'Meet with a Ministry Partner',
		'subheadline' => 'Meet with a Kingdom One ministry partner to review your assessment and build a custom plan to grow your ministry efforts.',

	),
	array(
		'svg'         => 'icon-growth-step-3',
		'headline'    => 'Build Towards Health',
		'subheadline' => 'Build your ministry towards health with our team, training, and tools, so you can get back to the ministry you love.',

	),
);
?>
<div class="row my-5">
	<?php foreach ( $default_steps as $index => $step ) : ?>
		<?php $step_level = $index + 1; ?>
	<div class="<?php echo "ministry-plan__steps--step-{$step_level}"; ?> col-lg-4 my-5 my-lg-0 d-flex flex-column align-items-center text-primary--dark">
		<?php k1_get_svg_asset( $step['svg'] ); ?>
		<h3 class="text-poppins text-center align-self-stretch mt-5 mb-3 color-primary--dark"><?php echo $step['headline']; ?></h3>
		<span class="subheadline text-center align-self-stretch fs-4"><?php echo $step['subheadline']; ?></span>
	</div>
	<?php endforeach; ?>
</div>
<div class="row flex-column justify-content-center align-items-center">
	<?php $content->cta_button(); ?>
</div>