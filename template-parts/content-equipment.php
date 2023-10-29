<?php
/**
 * Content Section: Equipment
 * Description: 3 column icon + text for Resources, Tools and Talents
 *
 * $args = array(
 * 'with_header' => boolean,
 * 'as_cta'      => boolean,
 * 'header_args' => array(
 *   'headline' => string,
 *   'subheadline' => string,
 *   ),
 * )
 *
 * @package KingdomOne
 */

extract( $args );
$content = new Content_Sections();
?>
<section class="equipment">
	<?php $content->get_color_background_layers( 'equipment', $as_cta ? 'left-top' : 'zig-zag-left', array( 'josh-calabrese-XXpbdU_31Sg-unsplash', 'jpg' ) ); ?>
	<div class="equipment__content container">
		<?php
		if ( $with_header ) {
			extract( $header_args );
			echo "<h2 class='headline text-center text-white mt-5'>{$headline}</h2><p class='subheadline fs-4 text-white text-center text-my-5'>{$subheadline}</p>";
		}
		?>
		<div class="equipment__steps row justify-content-around">
			<?php
			$default_steps = array(
				array(
					'svg'         => 'equipment-icon-step-1',
					'headline'    => 'Grab Some Free Resources',
					'subheadline' => 'Get to know us with free tools, education and resources',
				),
				array(
					'svg'         => 'equipment-icon-step-2',
					'headline'    => 'Grab Tools &amp; Courses',
					'subheadline' => 'Grab a tool or course to sharpen your expertise',
				),
				array(
					'svg'         => 'equipment-icon-step-3',
					'headline'    => 'Grab Some Talents',
					'subheadline' => 'Grab some talents to help get the work done',
				),
			);
			?>
			<?php foreach ( $default_steps as $step ) : ?>
			<div class="equipment__steps--step-1 col-lg-4 my-5 py-5 my-lg-0">
				<?php k1_get_svg_asset( $step['svg'] ); ?>
				<h3 class="headline text-white text-center"><?php echo $step['headline']; ?></h3>
				<span class="subheadline text-white text-center"><?php echo $step['subheadline']; ?></span>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="mt-5 py-5 row flex-column justify-content-center align-items-center">
			<?php $content->cta_button(); ?>
		</div>
	</div>
</section>