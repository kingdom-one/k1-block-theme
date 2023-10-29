<?php
/**
 * Page: Above Reproach
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
k1_enqueue_page_style( 'aboveReproach' );
get_header();
?>
<main class="site-content <?php echo $post->post_name; ?>">
	<section class="hero d-flex flex-column justify-content-center" id="hero">
		<?php
		$hero = get_field( 'hero' );
		extract( $hero );
		$headline = empty( $alternate_headline ) ? get_the_title( $post_id ) : $alternate_headline;
		echo $content->get_hero_background( $has_background_image, $color, $color_direction, $background_image );
		$lady_justice_url = k1_get_image_asset_url( 'ar-text-and-lady-justice', 'webp', '', false );
		echo "<div class='container'><div class='row'><div class='d-none d-lg-block col-1'></div><img class='hero__ar-logo position-relative z-3 col-lg-5' src='{$lady_justice_url}' /></div></div>";
		echo $content->get_hero_content( $headline, $subheadline, $has_cta, $cta_options );
		?>
	</section>
	<section class="intro-video">
		<div class="container">
			<div class="row justify-content-lg-center">
				<h2 class="headline text-lg-center col-lg-8">finally, an ab-506 training that is biblically-minded</h2>
			</div>
			<div class="row justify-content-center my-5">
				<lite-youtube videoid='n14d6Addfas' playlabel='AB-506 Tools'></lite-youtube>
			</div>
			<div class="row justify-content-lg-center">
				<?php
				$content->cta_button(
					array(
						'text'        => 'Enroll Now',
						'url'         => 'https://academy.kingdomone.co',
						'is_external' => true,
						'html_class'  => 'btn__black--outline',
					)
				);
				?>
			</div>
		</div>
	</section>
	<section class="ab506-callout">
		<div class="container">
			<div class="row my-5">
				<h2 class="headline text-center">AB-506 Training For whichever team you lead</h2>
				<p class="subheadline text-lg-center">Whether you are training a volunteer team or staff for a ministry, nonprofit or school, we've got your back. Teams access will help you
					coordinate and manage whichever team you are leading through the self-guided training.</p>
			</div>
			<div class="row">
				<?php
				$ab506_cards = array(
					array(
						'thumbnail' => 'Volunteer',
						'title'     => 'Volunteer Teams',
						'features'  => array( '60 Minutes', 'Overview of AB-506', 'Biblical, topical and legal child saftey training', 'Mandatory reporter requirements', 'Certificate of completion' ),
						'cta_link'  => 'https://academy.kingdomone.co/course/ab-506-child-safety-reporting-volunteer/',

					),
					array(
						'thumbnail' => 'Flagship',
						'title'     => 'Ministry &amp; Non-Profit Teams',
						'features'  => array( '90-Minute Training', 'Overview of AB-506', 'Biblical, topical and legal child saftey training', 'Mandatory reporter requirements', 'Certificate of completion' ),
						'cta_link'  => 'https://academy.kingdomone.co/course/ab506/',

					),
					array(
						'thumbnail' => 'School',
						'title'     => 'Education Teams',
						'features'  => array( '120 Minutes', 'Overview of AB-506', 'Biblical, topical and legal child saftey training', 'Mandatory reporter requirements', 'Certificate of completion' ),
						'cta_link'  => 'https://academy.kingdomone.co/course/ab-506-child-safety-reporting-for-education/',

					),
				);
				?>
				<?php foreach ( $ab506_cards as $card ) : ?>
				<div class="col-lg-4 my-5 my-lg-0">
					<div class="ar-card">
						<div class="ar-card__bg" style="background-image:url('<?php k1_get_image_asset_url( 'AB-506-' . $card['thumbnail'] . '-Banner', 'png', 'temps' ); ?>');"></div>
						<div class="ar-card__content">
							<h3 class="ar-card__content--title">
								<?php echo $card['title']; ?>
							</h3>
							<div class="ar-card__features-list">
								<h4 class="ar-card__features-list--header">Course Features:</h4>
								<?php $content->bulleted_list( $card['features'], 'ar-card__features-list--item' ); ?>
							</div>
							<a href="<?php echo $card['cta_link']; ?>" target="_blank" rel='noopener noreferrer' class="btn__ar-purple--fill ar-card__content--btn">Preview Course</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

			</div>
		</div>
	</section>
	<section class="ab506-diy">
		<div class="container">
			<?php
			$content->two_col_text_and_media(
				array(
					'split'      => array( 5, 6 ),
					'headline'   => "don't see what you're looking for? that's ok!",
					'content'    => '<p>Our D.I.Y. kit has policy templates and training resources for a fraction of the cost!</p>',
					'media_type' => 'photo',
					'image'      => k1_get_image_asset_url( 'above-reproach-road-sign', 'webp', '', false ),
					'cta'        => array(
						'url'         => 'https://academy.kingdomone.co',
						'title'       => 'Get the D.I.Y. Kit',
						'is_external' => true,
					),
					'cta_class'  => 'btn__ar-purple--fill',
				)
			);
			?>
		</div>
	</section>
	<?php get_template_part( 'template-parts/final-cta/content', 'ab506' ); ?>
</main>
<?php
get_footer();