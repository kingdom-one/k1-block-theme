<?php
/**
 * Swiper: Staffing Page
 */

$content = new Content_Sections();
?>
<div class="swiper z-3" id="staffing-swiper">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<?php k1_get_svg_asset( 'staffing-icon-frustrated' ); ?>
			<span class="headline text-white h3 text-center col-lg-8">Finances can cause a lot of frustration, confusion and insecurity.</span>
			<?php k1_get_svg_asset( 'leaves-3' ); ?>
		</div>
		<div class="swiper-slide">
			<?php k1_get_svg_asset( 'staffing-icon-strategy' ); ?>
			<span class="headline text-white h3 text-center col-lg-8">
				Accurate and timely finance reports help avoid frustrating conversations and build trust so you can accomplish your ministry's goals.
			</span>
			<?php k1_get_svg_asset( 'leaves-3' ); ?>
		</div>
	</div>
	<div class="swiper-pagination"></div>
	<div class="swiper-navigation-next"></div>
	<div class="swiper-navigation-prev"></div>
</div>