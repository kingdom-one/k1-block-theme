<?php
/**
 * Page: Staffing
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
k1_enqueue_page_assets( 'staffing' );
?>
<section class="quality-candidates">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="text-center color-erc-purple">Finding quality candidates that are called, have good chemistry, and are a cultural fit can be difficult to find.</h2>
			</div>
		</div>
		<div class="row my-5 justify-content-evenly text-center py-5">
			<div class="col-lg-4 d-flex flex-column align-items-center">
				<?php k1_get_svg_asset( 'icon-handshake' ); ?>
				<h3 class="color-grey h4 text-poppins">Relational Recruiting</h3>
			</div>
			<div class="col-lg-4 d-flex flex-column align-items-center">
				<?php k1_get_svg_asset( 'staffing-icon-prescreening' ); ?>
				<h3 class="color-grey h4 text-poppins">Cultural Fit Pre-screening</h3>
			</div>
			<div class="col-lg-4 d-flex flex-column align-items-center">
				<?php k1_get_svg_asset( 'staffing-icon-onboarding' ); ?>
				<h3 class="color-grey h4 text-poppins">Onboarding</h3>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="text-center col-lg-10">
				<span class="fw-bold subheadline fs-3 color-grey">Spark staffing is a search service that gives ministry leaders quality candidates vetted, culturally
					fit, and ready to join
					your ministry's mission</span>
			</div>
		</div>
	</div>
</section>
<section class="help">
	<?php $content->get_color_background_layers( 'help', 'right', array( 'k1-conference', 'webp' ) ); ?>
	<div class="help__content position-relative z-3 my-5 py-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<?php k1_get_svg_asset( 'leaves-3' ); ?>
					<h2 class="color-spark-yellow mb-3">how can we help?</h2>
					<p class="subheadline text-white">People are our most valuable asset in ministry. If you are experiencing tension in ministry, staff mishandling resources or poor work
						ethic you need to experience Spark Staffing by Kingdom One. We want to partner with you so you can avoid:</p>
					<?php
					$list_items = array( 'Long lead times for candidates', 'Staff that aren\'t called to ministry', 'Staff that aren\'t a cultural fit', 'Staff that don\'t have chemistry with your current team' );

					$content->bulleted_list( $list_items, ' fw-bold my-5 color-erc-blue', 'ul', 'list-unstyled d-flex flex-column justify-content-around align-items-md-center text-md-center m-0' );
					?>
				</div>
			</div>
			<div class="row justify-content-center">
				<?php $content->cta_button(); ?>
			</div>
		</div>
	</div>
</section>
<aside class="text-callout">
	<div class="container">
		<div class="row my-5 py-5">
			<div class="col text-center">
				<h2 class="color-spark-yellow">staff health is not optional</h2>
				<p class="subheadline fw-bold color-grey fs-3">We understand the importance of having a staff that works as a team. Let's work together to make sure that your overall
					ministry
					impact is
					healthy and strong!</p>
			</div>
		</div>
	</div>
</aside>
<?php
get_template_part(
	'template-parts/content',
	'core-services',
	array(
		array(
			'items' => array(
				'Relational Recruiting',
				'Culture Fit Interviewing',
				'Active Recruiting Methods using HR Tech tools',
			),
		),
		array(
			'items' => array(
				'Create compelling job postings and handle candidate management',
				'Micro-site creation to present candidate bios and share ministry profiles',
				'Coordinate Onboarding plan and give salary recommendations.',
			),
		),
	)
);
?>
<section class="ministry-plan">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h2 class="color-grey text-poppins">Let's Start Building Your Ministry Team Together!</h2>
			</div>
		</div>
		<?php
		get_template_part(
			'template-parts/final-cta/content',
			'ministry-change'
		);
		?>
	</div>
</section>
<section class="final-cta final-cta-about">
	<?php $content->get_color_background_layers( 'final-cta', 'left-top', array( 'final-cta-bg', 'webp' ) ); ?>
	<div class="container position-relative z-3">
		<div class="final-cta__content row justify-content-center">
			<div class="col-lg-8 text-center py-5">
				<?php k1_get_svg_asset( 'spark-icon' ); ?>
				<h2 class="text-white text-poppins">The journey to a healthy staff culture is one step away.</h2>
				<p class="subheadline white-stroke my-5 d-block">Get started today</p>
				<p class="text-white">Begin the journey to onboarding quality candidates that are vetted, culturally fit, and ready to join your mission.</p>
				<?php
				$content->cta_button(
					array(
						'text'       => 'Get Started',
						'html_class' => 'btn__spark-yellow--fill',
					)
				);
				?>
			</div>
		</div>

	</div>
</section>