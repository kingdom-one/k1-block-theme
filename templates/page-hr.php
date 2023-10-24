<?php
/**
 * Page: TG HR
 *
 * @package KingdomOne
 */

k1_enqueue_page_assets( 'hrPage' );
$content = new Content_Sections();
?>

<section class="costs">
	<div class="container">
		<div class="row justify-content-between">
			<figure class="costs__image position-relative col-lg-4">
				<?php k1_get_svg_asset( 'leaves-4' ); ?>
				<div class="clip-color-right">
					<div class="bg-color-primary"></div>
					<img class='costs__image--image' src="<?php k1_get_image_asset_url( 'pexels-fauxels-3184296', 'jpg', 'temps' ); ?>" />
				</div>
			</figure>
			<div class="col-lg-7 costs__content">
				<h2 class="headline text-primary">the real cost of hr in ministry</h2>
				<p class='d-block my-5'><b>As Ministry Leaders, we understand the pain points of hiring, promotions, pay decisions, firing, and developing staff.</b></p>
				<p>The HR role isn't easy (we know, we've been there!), but your "people" efforts are necessary for your Church's Health. Our mission is to build healthy
					people strategies
					that help the Church thrive so you never have to second-guess your HR efforts.</p>
			</div>
		</div>
	</div>
</section>
<section class="problem-areas">
	<div class="container">
		<div class="row">
			<?php
			$causes    = array(
				'title'      => 'If you\'re experiencing:',
				'list-items' => array( 'High turnover rate', 'Unfruitful staffing search', 'Tough leadership transitions, terminations, & underperformance', 'An unstable work environment' ),
			);
			$effects   = array(
				'title'      => 'That can lead to:',
				'list-items' => array( 'Poor staff culture', 'Discouraged Staff & Leadership', 'Stalled Projects', 'Diluted Work', 'Fighting & Low Trust', 'Missing Ministry Opportunities' ),
			);
			$two_lists = array( $causes, $effects );
			foreach ( $two_lists as $list ) {
				echo "<div class='col-lg-6 d-flex flex-column'><h3 class='text-primary text-poppins h4'>{$list['title']}</h3><ul>";
				foreach ( $list['list-items'] as $item ) {
					echo "<li class='fw-bold'>{$item}</li>";
				}
				echo '</ul></div>';
			}
			?>
		</div>
		<div class="row justify-content-center text-center my-5">
			<div class="col-lg-8 d-flex flex-column justify-content-center align-items-center py-5">
				<h2 class="headline text-poppins color-grey mb-5">it's time to start a journey to revamping your hr efforts</h2>
				<?php $content->cta_button(); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_template_part(
	'template-parts/content',
	'core-services',
	array(
		array(
			'title' => null,
			'items' => array( 'Staffing', 'Handbooks', 'Payroll', 'HRIS Implementation', 'Staff Survey' ),
		),
		array(
			'title' => null,
			'items' => array( 'Total Rewards', 'Compensation Survey', 'Ministry Assessment', 'Retirement', 'Benefits' ),
		),
	)
);
?>
<aside class='tools-tips-training'>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-lg-center">
				<h2 class='text-poppins color-grey'>Tools, Tips, & Training <br /> <span class="text-primary">That Delivers</span></h2>
				<p class="mb-5">We are here to come alongside your staff, leadership, and volunteers to make sure you are HR-healthy. Not only can you get strategic work with our HR team,
					you also have access to Kingdom One Academy for on-demand ministry training. Spark Staffing is a ministry job board that focuses on calling, culture, and
					connection so you get the best candidates with a stellar experience. Best of all, we are based on a subscription model, meaning no contracts and no
					wasted dollars on retainer fees. Our friendly staff is here to see your ministry thrive. Get started today.</p>
				<?php $content->cta_button(); ?>
			</div>

		</div>
	</div>
</aside>
<?php
get_template_part(
	'template-parts/content',
	'three-steps',
	array(
		'headline' => "Let's Partner Together To Grow Your Ministry's Capacity!",
		'rows'     => array(
			array(
				'svg'         => 'above-reproach-lady-justice-step-1',
				'headline'    => 'Commit to creating a safe place for your people - Get Above Reproach.',
				'subheadline' => 'Above Reproach is our safety ecosystem, geared to equip you with the essentials to provide safe places for your people. When you bundle AB-506
				Child Abuse Prevention + Mandated Reporting along with Harassment & Bullying Prevention training you double down on your commitment to safety AND enjoy a discounted
				bundle price.',
				'cta'         => array(
					'url'         => 'https://academy.kingdomone.co',
					'text'        => 'Enroll Now',
					'is_external' => true,
				),
			),
			array(
				'svg'         => 'hr-inventory-step-2',
				'headline'    => 'Take Inventory of Your HR Health.',
				'subheadline' => 'Make sure you have the right tools, policies, and development necessary to grow your staff and culture.',
				'cta'         => array(
					'url'  => '',
					'text' => 'Get Started',
				),
			),
			array(
				'svg'         => 'rocket-step-3',
				'headline'    => 'Get connected. Partner with our HR industry experts to amplify your work at kingdomone.co.',
				'subheadline' => 'Ministry is complicated. Can we get an “amen”? While industry best practices and guidance is an excellent start, the pursuit of becoming
				courageous, healthy, and effective is nuanced. Our league of extraordinary gentlemen and women is ready to partner with you in a 1:1 capacity to assess and coach you
				forward thoroughly.',
				'cta'         => array(
					'url'  => '/get-started',
					'text' => 'Get Started',
				),
			),
		),
	)
);
?>
<section class='right-choice'>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-lg-center">
				<h2 class='color-grey text-poppins'>Is <span class="text-primary">Kingdom One</span> <br /> The Right Choice For Me?</h2>
				<p>We understand the sacrifice, dedication, and relational equity it takes to spread the gospel and want to see ministries united in growing the Church
					together. We're using our experience and learnings from Fortune 100 companies and mega-church ministries to help your ministry become more Courageous,
					Healthy, & Effective. Why? Because ministries of all sizes should have a chance to grow to their full potential. </p>
			</div>
		</div>
		<div class="row justify-content-center my-5">
			<pre>video of Steven...</pre>
		</div>
		<!-- <div class="row justify-content-center text-lg-center">
			<div class="col-lg-8">
				<h2 class="color-grey text-poppins">We have a track record of growth, but you don't have to take our word for it.</h2>
			</div>
		</div> -->
	</div>
</section>
<?php get_template_part( 'template-parts/final-cta/content', 'hr' ); ?>