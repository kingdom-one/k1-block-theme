<?php
/**
 * Gallery Swiper
 * Powered by Swiper.js
 *
 * @link https://swiperjs.com/demos#thumbs-gallery
 * @package KingdomOne
 *
 * $args = array(string $id, array $slides, array $links, unknown $logo)
 */

$content = new Content_Sections();

if ( ! function_exists( 'k1_generate_the_slides' ) ) {
	/** Generates the Slides from the array
	 *
	 * @param array $slides the slides
	 */
	function k1_generate_the_slides( array $slides ) {
		foreach ( $slides as $slide ) {
			echo "<div class='swiper-slide'>{$slide}</div>";
		}
	}
}
?>
<div class="project-gallery-swiper" id='<?php echo $args['id']; ?>'>
	<?php if ( isset( $args['logo'] ) ) : ?>
	<div class="container">
		<div class="row justify-content-center my-5">
			<div class="col-6 col-lg-4 d-flex justify-content-center logo-container">
				<?php echo "<img src='{$args['logo']}' class='w-100' />"; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="swiper-container container">
		<div class="row swiper-row">
			<div style="--swiper-navigation-color: var(--color-primary);" class="swiper big-display">
				<div class="swiper-wrapper">
					<?php k1_generate_the_slides( $args['slides'] ); ?>
				</div>
				<div class="<?php echo "swiper-{$args['id']}-button-next"; ?> swiper-button-next"></div>
				<div class="<?php echo "swiper-{$args['id']}-button-prev"; ?> swiper-button-prev"></div>
			</div>
			<div class="swiper thumb-display">
				<div class="swiper-wrapper">
					<?php k1_generate_the_slides( $args['slides'] ); ?>
				</div>
			</div>
		</div>
		<?php if ( isset( $args['links'] ) ) : ?>
		<div class="row links-row justify-content-around">
			<?php
			foreach ( $args['links'] as $link_options ) {
				$content->cta_button( $link_options );
			}
			?>
		</div>
		<?php endif; ?>
	</div>
</div>