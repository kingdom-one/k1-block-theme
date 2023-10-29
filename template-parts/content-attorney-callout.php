<?php
/**
 * Ministry Legal Partner Callout
 *
 * @package KingdomOne
 */

?>
<aside class="attorney-callout d-flex flex-column justify-content-center">
	<div class="attorney-callout__background--left bg-color-ar-deep-blue position-absolute z-1 w-100 h-100"></div>
	<div class="attorney-callout__background--right bg-color-ar-golden-yellow position-absolute z-1 w-100 h-100"></div>
	<div class="attorney-callout__content container z-3 border border-2 border-white py-5 px-3 bg-color-ar-deep-blue">
		<div class="row justify-content-center mt-lg-5">
			<div class="col-lg-3 d-flex flex-column justify-content-center">
				<img src="<?php k1_get_image_asset_url( 'jenn', 'webp' ); ?>" alt="Jenn Bursh headshot" class="attorney-callout__image mb-5 mb-lg-0">
			</div>
			<div class="col-lg-7 d-flex flex-column justify-content-center">
				<div class="attorney-callout__title d-inline-flex align-items-center">
					<span class="color-ar-yellow fw-normal fs-4">Jenn Bursh <span class="text-white">&mdash; Attorney at Law</span></span>
					<div class="attorney-callout__stars ms-5">⭐️⭐️⭐️⭐️⭐️</div>
				</div>
				<h2 class="text-white">Your Ministry Legal Partner</h2>
				<p class="text-white">“Legal updates are your ministry's first line of defense to minimize potential financial liability. If you know what the law requires of your ministry,
					you can make
					informed decisions to navigate the difficult waters between the law and ministry.”</p>
			</div>
		</div>
	</div>
	<img src="<?php k1_get_image_asset_url( 'steno-color-min', 'webp' ); ?>" alt="Lady Stenographer" class="attorney-callout__image--steno d-none d-lg-block">
</aside>