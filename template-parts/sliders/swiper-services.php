<?php
/**
 * Services Swiper (as seen on /communications)
 *
 * @package KingdomOne
 */

$slides = array(
	array(
		'svg'         => 'hr',
		'headline'    => 'Human Resources',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
	array(
		'svg'         => 'staffing',
		'headline'    => 'Staffing',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
	array(
		'svg'         => 'finance',
		'headline'    => 'Finance',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
	array(
		'svg'         => 'marcom',
		'headline'    => 'Communications',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
	array(
		'svg'         => 'worship',
		'headline'    => 'Worship',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
	array(
		'svg'         => 'online',
		'headline'    => 'Web Development',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
	array(
		'svg'         => 'video',
		'headline'    => 'video',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
	array(
		'svg'         => 'it',
		'headline'    => 'I.T.',
		'subheadline' => 'blurb blurb blurb',
		'cta'         => array(
			'url'         => '#',
			'text'        => 'Learn More',
			'is_external' => false,
		),
	),
);
?>
<div class="swiper" id="services-swiper">
	<div class="swiper-wrapper">
		<?php foreach ( $slides as $slide ) : ?>
		<div class="swiper-slide d-flex flex-column align-items-center">
			<?php k1_get_svg_asset( 'services-icon-' . $slide['svg'] ); ?>
			<h3 class="headline text-primary text-uppercase text-center my-3">
				<?php echo $slide['headline']; ?>
			</h3>
			<p class="text-lg-center mb-5">
				<?php echo $slide['subheadline']; ?>
			</p>
			<?php
			$has_cta = ! empty( $slide['cta']['url'] );
			if ( $has_cta ) {
				extract( $slide['cta'] );
				echo "<a href='{$url}' class='btn__primary--fill mt-auto'" . ( $is_external ? "target='_blank' rel='noopener noreferrer'>" : '>' ) . "{$text}</a>";
			}
			?>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="swiper-services-pagination"></div>
	<div class="swiper-button-services-prev swiper-button-prev"></div>
	<div class="swiper-button-services-next swiper-button-next"></div>
</div>