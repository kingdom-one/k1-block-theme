<?php
/**
 * Tesimonials Swiper
 * powered by Swiper.js
 */

$args  = array(
	'post_type'      => 'clients',
	'posts_per_page' => -1,
);
$query = new WP_Query( $args );
if ( ! $query->have_posts() ) {
	return;
}
$content = new Content_Sections();
?>
<aside class="brands py-5 my-5">
	<?php $content->get_color_background_layers( 'brands', 'left' ); ?>
	<div class="container-fluid position-relative z-2 py-5">
		<div class="row mt-5">
			<div class="swiper" id="brands-swiper">
				<div class="swiper-wrapper">
					<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						if ( get_field( 'show_in_slider' ) ) {
							echo "<div class='swiper-slide p-5 text-white d-flex flex-column align-items-stretch'>";
							$post_thumbnail_id = get_post_thumbnail_id();
							$url               = get_the_post_thumbnail_url();
							$alt               = get_post_meta( $post_thumbnail_id, '_wp_attachment_iamge_alt', true );
							$srcset            = wp_get_attachment_image_srcset( $post_thumbnail_id );
							echo "<img class='swiper-slide__logo object-fit-contain' src='{$url}' alt='{$alt}' srcset='{$srcset}'>";
							echo '<div class="text-content my-5">' . acf_esc_html( get_field( 'slider_points' ) ) . '</div>';

							if ( get_field( 'show_learn_more_button' ) ) {
								$permalink = get_the_permalink();
								echo "<a href= '{$permalink}' class='btn__primary--fill mt-auto mb-2 align-self-center'>Learn More</a>";
							};
							echo '</div>';
						}
					}
					?>
				</div>
				<div class="swiper-button-prev swiper-brands-button-prev"></div>
				<div class="swiper-button-next swiper-brands-button-next"></div>
			</div>
		</div>
		<div class="row mt-5 pt-5">
			<div class="swiper-pagination swiper-brands-pagination"></div>
		</div>
	</div>
</aside>