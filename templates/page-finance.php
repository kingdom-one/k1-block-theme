<?php
/**
 * Page: Finance
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
k1_enqueue_page_assets( 'finance' );
?>
<aside class="callout section-2">
	<div class="container">
		<div class="row justify-content-center">
			<h2 class="headline text-primary col-lg-8 text-center">
				How is your ministry's financial visibility & growth?
			</h2>
		</div>
	</div>
</aside>
<section class="problem-solution-swiper">
	<?php $content->get_color_background_layers( 'problem-solution-swiper', 'zig-zag-left', array( 'staffing-swiper-bg', 'webp' ) ); ?>
	<div class="container">
		<div class="row align-items-center py-5 my-5">
			<?php get_template_part( 'template-parts/sliders/swiper', 'staffing-problem-solution' ); ?>
		</div>
	</div>
</section>
<section class="problem-solution">
	<?php $content->get_color_background_layers( 'problem-solution', 'zig-zag-left' ); ?>
	<div class="container position-relative z-3 py-5">
		<div class="my-5 row justify-content-center" id='section-header'>
			<div class="col-lg-10 text-center">
				<h2 class="headline text-primary">The American Church is Struggling</h2>
				<p class="subheadline text-white">In 2019, 4,500 churches closed their doors, and that number continues to rise each year. Year after year, fewer people are attending and
					giving at church services, and this creates so much heartache for ministry leaders.</p>
			</div>
		</div>
		<div class="row text-center justify-content-around gap-5 my-5" id='statistics'>
			<?php
			$statistics = array(
				array(
					'svg'  => 'staffing-stats-17',
					'text' => 'When surveyed, only 17% of Americans state that they regularly tithe.',
				),
				array(
					'svg'  => 'staffing-stats-37',
					'text' => "37% of regular church attendees and Evangelicals don't give money to church.",
				),
				array(
					'svg'  => 'staffing-stats-17',
					'text' => '17% of American families have reduced the amount that they give to their local church.',
				),
				array(
					'svg'  => 'staffing-stats-7',
					'text' => '7% of church goers have dropped regular giving by 20% or more.',
				),
			);
			?>
			<?php foreach ( $statistics as $stat ) : ?>
			<div class="col-6 col-md-4 col-xxl-2">
				<?php
				k1_get_svg_asset( $stat['svg'] );
				echo "<p class='my-5 text-white'>{$stat['text']}</p>";
				?>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="row my-5">
			<div class="col">
				<div class="small text-white text-center">From <a
					   href='https://nonprofitssource.com/online-giving-statistics/church-giving/#:~:text=The%20average%20giving%20by%20adults,giving%20by%2020%25%20or%20more.'
					   target="_blank" class="text-white" rel='noopener noreferrer'>https://nonprofitssource.com/online-giving-statistics/church-giving/</a>
				</div>
			</div>
		</div>
	</div>
</section>
<aside class="hope">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-xl-8 text-center">
				<h2 class="headline text-primary">There is Hope!</h2>
				<p class="subheadline">We understand you may be overwhelmed, but practicing the time-tested principles of stewardship will lead your ministry to financial
					health.</p>
				<?php $content->cta_button(); ?>
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
			'title' => null,
			'items' => array( 'Receivables', 'Payables', 'Expense Tracking' ),
		),
		array(
			'title' => null,
			'items' => array( 'Payroll', 'Credit Card Reconciliation', 'Bank Statement Reconciliation' ),
		),
		array(
			'title' => null,
			'items' => array( 'Financial Reporting', 'Budgeting', 'Audit Support' ),
		),
	)
);
get_template_part(
	'template-parts/content',
	'three-steps',
	array(
		'headline'           => 'Are You Ready to Make a positive change?',
		'bg_image_file_name' => 'marcom-three-steps-bg',
		'rows'               => array(
			array(
				'svg'         => 'marcom-assessment-step-1',
				'headline'    => 'Take a Financial Assessment',
				'subheadline' => 'Get insights on your strengths and opportunities to grow your finance efforts.',
				'cta'         => array(
					'url'  => '',
					'text' => 'Get Started',
				),
			),
			array(
				'svg'         => 'staffing-icon-partner-step-2',
				'headline'    => 'Meet with a financial ministry partner',
				'subheadline' => 'Meet with a K1 Ministry Partner to review your assessment and get a plan to get to financial health.',
				'cta'         => array(
					'url'  => '',
					'text' => 'Get Started',
				),
			),
			array(
				'svg'         => 'staffing-build-step-3',
				'headline'    => 'Build Towards Health',
				'subheadline' => 'Work with your Kingdom One ministry partner to work the plan and bring financial clarity, trust, and health back to the ministry you love.',
				'cta'         => array(
					'url'  => '',
					'text' => 'Get Started',
				),
			),
		),
	)
);
get_template_part( 'template-parts/final-cta/content', 'daunting' );