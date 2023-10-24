<?php
/**
 * Page: Get Started
 *
 * @package KingdomOne
 */

k1_enqueue_page_assets( 'getStarted' );
$content = new Content_Sections();
?>
<section class="bg-color-primary" id='section-2'>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<h2 class="headline text-white">what are your ministry's greatest needs?</h2>
			<p class="subheadline fw-bold">Tell Us About Your Organization, And We'll Connect You With Ministry Support As Soon As Possible.</p>
		</div>
	</div>
</section>
<section class="contact">
	<div class="container-fluid">
		<div data-form-slug="3915198875505926" data-env="production" data-path="contact-us/3915198875505926" class="keap-custom-form"></div>
		<script>
		(function(a, b) {
			var c = a.keapForms || {
					SNIPPET_VERSION: "1.1.0",
					appId: "hav885"
				},
				d = b.createElement("script");
			d.type = "text/javascript", d.crossOrigin = "anonymous", d.defer = !0, d.src = "https://forms.keap.app/lib/public-form-embed.js?appId=hav885&version=1.1.0", d.onload = function() {
				var b = a.keapForms;
				b.renderAllForms ? !b.invoked && (b.invoked = !0, b.renderAllForms()) : console.error("[Keap Forms] Error: could not load")
			};
			var e = b.getElementsByTagName("script")[0];
			e.parentNode.insertBefore(d, e), a.keapForms = c
		})(window, document);
		</script>
	</div>
</section>
<?php // get_template_part( 'template-parts/sliders/swiper', 'testimonials' ); ?>
<aside>
	<div class="container">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-8">
				<h2 class="headline text-center">Wouldn't it be great to have a coach or support system without breaking the budget?</h2>
			</div>
		</div>
	</div>
</aside>
<section class="ministry-plan">
	<?php $content->get_color_background_layers( 'ministry-plan', 'left-top' ); ?>
	<div class="ministry-plan__steps z-3 position-relative">
		<div class="container">
			<?php get_template_part( 'template-parts/final-cta/content', 'ministry-change' ); ?>
		</div>
	</div>
</section>