<?php
/**
 * Page: Process & Pricing
 *
 * @package KingdomOne
 */

k1_enqueue_page_assets( 'pricing' );
$content = new Content_Sections();
?>

<section class="talent-description">
	<div class="container">
		<div class="row">
			<div class="col-1 d-none d-md-block position-relative">
				<?php k1_get_svg_asset( 'leaves-3' ); ?>
			</div>
			<div class="col-11">
				<?php
				$content->headline(
					'what is a talent?',
					true,
					array(
						'headline_class'      => 'headline text-primary',
						'subheadline_content' => 'The approach will not be easy. You are required to maneuver straight down this trench and skim the surface to this point.',
					)
				);
				?>
			</div>
		</div>
		<div class="row mt-5">
			<div class="d-none d-lg-block col-lg-4">
				<?php k1_get_svg_asset( 'pricing-talents-explanation' ); ?>
			</div>
			<div class="col-lg-8">
				<?php
				$talents = array(
					"Monthly Subscription to Ministry Expert's Time",
					'16 hours a month: half a day a week dedicated to your ministry',
					'The more Talents you take the bigger the discount <br> (think ice cream scoops)',
					'The benefit of having the time, expertise, and <br> knowledge, without committing to salary, benefits & <br> onboarding. We perform like staff but cost way less.',
				);
				$content->bulleted_list( $talents, '', 'ul', 'ms-5 d-inline-flex flex-column justify-content-around h-100' );
				?>
			</div>
		</div>
	</div>
</section>
<!-- <section class="services-calculator">
	<?php $content->get_color_background_layers( 'services-calculator', 'right' ); ?>
	<div class="container">
		<div class="services-calculator__content row">
			<div class="col-lg-7 col-xxl-6 py-5 services-calculator__content--headline-container d-flex position-relative">
				<h2 class="h1 text-primary">how much do services cost?</h2>
				<?php k1_get_svg_asset( 'leaves-3' ); ?>
			</div>
			<div class="services-calculator__content row">
				<p class="text-white">Luke? Luke? Luke? Have you seen Luke this morning? He said he had some things to do before he started today, so he left early. Uh? Did he take
					those two new droids with him? I think so.</p>
			</div>
		</div>
		<div class="services-calculator__calculator d-flex row justify-content-center my-5">
			<div class="col-6">
				<h2 class="text-white">Talent Calculator Here (ie. version of ERC Calculator)</h2>
				<p class="text-white">*Notes and Disclaimers This calculator is for estimation purposes only and is not a guarantee of final pricing For a more specific estimate, you may
					contact
					the ERC Team at Kingdom One by clicking “Get Started” above.</p>
			</div>
		</div>
	</div>
</section> -->
<aside class="our-services">
	<div class="container my-5">
		<div class="row">
			<div class="col-1 d-none d-md-block"><?php k1_get_svg_asset( 'leaves-3' ); ?></div>
			<div class="col">
				<h2 class="h1 text-primary">a wide range of work</h2>
				<p>The projects we offer range from a wide variety of HR, Finance and Communications. From Website Design & Management, Handbook, Leveling, ERC+, and more, we are ready to
					partner with your ministry reach your goals!</p>
			</div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/sliders/swiper', 'services' ); ?>
</aside>
<?php get_template_part( 'template-parts/final-cta/content', 'daunting' ); ?>