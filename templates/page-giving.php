<?php
/**
 * Page: Giving
 *
 * @package KingdomOne
 */

k1_enqueue_page_style( 'giving' );
$content = new Content_Sections();
?>
<section class="problem">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-xl-4 position-relative d-flex flex-column align-items-center align-items-md-start">
				<?php k1_get_svg_asset( 'icon-church' ); ?>
				<?php k1_get_svg_asset( 'icon-church-closed' ); ?>
			</div>
			<div class="col-lg-6 col-xl-8">
				<?php
				$content->headline(
					'thousands of ministries in America will close their doors this year.',
					true,
					array(
						'subheadline_content' => 'In 2019, 4,500 churches closed their doors, and that number continues to rise each year.',
						'subheadline_element' => 'p',
						'subheadline_class'   => 'subheadline my-4',
					)
				);
				?>
				<div class="lacking d-flex flex-column justify-content-around my-5">
					<p class="fw-bold">Churches are lacking:</p>
					<?php
					$lacking = array(
						'the right tools',
						'the right team',
						'the right education',
						'at the right price',
					);
					?>
					<?php foreach ( $lacking as $lacks ) : ?>
					<div class='lacking__content text-content my-3 d-flex align-items-center'>
						<span class='lacking__content--icon mx-3'>
							<?php k1_get_svg_asset( 'icon-lacking-bullet' ); ?>
						</span>
						<span class='lacking__content--text'>
							<?php echo $lacks; ?>
						</span>
					</div>
					<?php endforeach; ?>
				</div>
				<p>When you give to Kingdom One, you help get tools, education & resources back into churches so that they have the health needed for growth.</p>
			</div>
		</div>
</section>
<section class="how-to-help p-0 pt-5">
	<?php $content->get_color_background_layers( 'how-to-help', 'left-top' ); ?>
	<div class="how-to-help__content position-relative z-2 pt-5">
		<div class="container">
			<div class="row my-5">
				<div class="col">
					<h2 class="headline text-white text-center pt-5">How can you help the American church?</h2>
					<span class="subheadline text-primary">We don't have a magic wand to fix the problem now, but we do have resources that will give the church a fighting chance.
						Giving to
						Kingdom One will get tools, education & resources back into churches, to grow their health.</span>
				</div>
			</div>
		</div>
		<div class="container my-5">
			<div class="row">
				<h3 class="headline text-sm-center text-white">There are multiple ways to give:</h3>
			</div>
		</div>
		<?php get_template_part( 'template-parts/content', 'ways-to-give' ); ?>
	</div>
</section>
<section class="give-butter pb-0">
	<div class="container">
		<div class="row">
			<div class="col d-flex justify-content-center">
				<?php k1_get_svg_asset( 'leaves-3' ); ?>
				<h2 class="headline my-5">healthy things <span class="text-primary">grow</span></h2>
			</div>
		</div>
		<div class="row justify-content-around">
			<div class="col-lg-4 d-flex flex-column">
				<p class="mb-5">When you give, ministries are equipped with tools, resources and knowledge to be courageous, healthy and effective. Your gift helps create toolkits, develop
					leaders and set strong foundations for generations to come.</p>
				<p class="text-primary fw-bold">Because of your giving, you ensure the Christian faith can reach future generations. </p>
			</div>
			<div class="col-lg-6">
				<iframe src="https://givebutter.com/embed/c/kingdom-one" class='give-butter__iframe' frameborder="0" scrolling="no" seamless=""></iframe>
			</div>

		</div>
	</div>
</section>
<section class="stephen-video pt-0">
	<div class="container">
		<div class="row my-5">
			<h2 class="headline h1 text-primary text-center">what your giving makes possible</h2>
			<span class="subheadline text-center">Our founder and CVO explains why now is a pivotal time to give to the health of the American Church.</span>
		</div>
		<div class="row justify-content-center">
			<lite-youtube videoid='IuNv15iBLBc' playlabel='Giving to Kingdom One'></lite-youtube>
		</div>
	</div>
</section>