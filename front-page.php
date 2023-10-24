<?php
/**
 * The Front Page
 */

get_header();
$content = new Content_Sections();
k1_enqueue_page_assets( 'frontPage' );
?>
<main class="site-content">
	<?php the_content();?>
	<section class="community">
		<div class="container py-5">
			<div class="row">
				<h2 class="headline mt-5 text-white">Community, Tools &amp; Knowledge</h2>
				<?php k1_get_svg_asset( 'leaves-4' ); ?>
			</div>
			<div class="row">
				<div class="col-lg-9 subheadline text-white mb-5">Our Tools, Training & Talent deliver the expertise you need to develop a healthy ministry.</div>
			</div>
		</div>
		<div class="community__grid--container">
			<div class="container">
				<div class="community__grid">
					<?php
					$grid_items = array(
						array(
							'svg'  => 'compass',
							'text' => 'Expert Guidance with a Kingdom One Ministry Partner',
						),
						array(
							'svg'  => 'restroom',
							'text' => 'Sexual Harrassment Prevention Training',
						),
						array(
							'svg'  => 'justice',
							'text' => 'AB-506 Child Safety & Mandated Reporting Compliance Training',
						),
						array(
							'svg'  => 'git-network',
							'text' => 'HR Ministry Network Conference Online Course',
						),
						array(
							'svg'  => 'sitemap',
							'text' => 'Talent Planning &amp; Organizational Leveling',
						),
						array(
							'svg'  => 'search-dollar',
							'text' => 'Annual Compensation Survey Report',
						),
						array(
							'svg'  => 'profile',
							'text' => 'Staffing Searches',
						),
						array(
							'svg'  => 'medical',
							'text' => 'Benefits, Insurance &amp; Total Rewards',
						),
						array(
							'svg'  => 'group-add',
							'text' => 'Ministry Cohorts',
						),
					);
					foreach ( $grid_items as $item ) {
						$markup  = "<div class='community__grid--item'><div class='community__grid-item-content'>";
						$markup .= k1_get_svg_asset( 'front-page-icon-' . $item['svg'], false, false );
						$markup .= "<p class='community__grid-item-content--text'>{$item['text']}</p>";
						$markup .= '</div></div>';
						echo $markup;
					}
					?>

				</div>
			</div>
		</div>
	</section>
	<aside class='text-callout py-5'>
		<div class="container">
			<div class="row">
				<h2 class="col text-center display-3">
					We're using our expertise to help ministries become more <span class="text-primary">Courageous, Healthy & Effective</span>
				</h2>
			</div>
		</div>
	</aside>
	<?php get_template_part( 'template-parts/sliders/swiper', 'testimonials' ); ?>
	<section class="projects py-5">
		<?php $content->get_color_background_layers( 'projects', 'zig-zag-left', ); ?>
		<div class="z-3 position-relative py-5 my-5">
			<div class="container">
				<div class="row justify-content-center mt-5">
					<div class="col-lg-10 text-center">
						<h2 class="text-white">Recent Partnerships</h2>
						<p class="subheadline text-white">We have had the privilege of partnering with so many amazing ministries. Below is some of the recent work that we have had the
							opportunity to be a part of.</p>
					</div>
				</div>
			</div>
			<?php get_template_part( 'template-parts/sliders/swiper', 'brands' ); ?>
		</div>
	</section>
	<aside class="video-testimonial">
		<div class="container">
			<div class="row justify-content-center">
				<lite-youtube videoid='ClhiWrVCNkg' playlabel='Hume Lake Christian Camp and Kingdom One'></lite-youtube>
			</div>
		</div>
	</aside>
	<section class="ministry-plan">
		<?php $content->get_color_background_layers( 'ministry-plan', 'left-top', array( 'josh-calabrese-XXpbdU_31Sg-unsplash', 'jpg' ) ); ?>
		<div class="ministry-plan__content position-relative z-3 py-5">
			<div class="container">
				<div class="ministry-plan__header row">
					<div class="col text-center">
						<h2 class="headline text-white">Decide to make a ministry change</h2>
						<p class="white-stroke my-5">get started today</p>
						<div class="subheadline text-white">Your role isn't easy (we know, we've been there!), but your job is so necessary to your Ministry's Health. Our mission is to build
							healthy
							people & strategies that help the Church thrive so you never have to second guess your ministry efforts.</div>
					</div>
				</div>
				<div class="ministry-plan__steps row justify-content-evenly my-5">
					<?php get_template_part( 'template-parts/final-cta/content', 'ministry-change' ); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();