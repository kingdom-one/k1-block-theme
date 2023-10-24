<?php
/**
 * Page: Above Reproach Legal Update
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
k1_enqueue_page_style( 'legalUpdate' );
get_header();
?>
<main class="site-content <?php echo $post->post_name; ?>">
	<section class="hero d-flex flex-column justify-content-center" id="hero">
		<?php
		$hero = get_field( 'hero' );
		extract( $hero );
		$headline = empty( $alternate_headline ) ? get_the_title( $post_id ) : $alternate_headline;
		echo $content->get_hero_background( $has_background_image, 'ar-deep-blue', $color_direction, $background_image );
		$lady_justice_url = k1_get_image_asset_url( 'legal-update-logo-and-text', 'webp', '', false );
		echo "<div class='container'><div class='row'><div class='d-none d-lg-block col-1'></div><img class='hero__ar-logo position-relative z-3 col-lg-5' src='{$lady_justice_url}' /></div></div>";
		echo $content->get_hero_content( $headline, $subheadline, $has_cta, $cta_options );
		?>
	</section>
	<section class="bg-color-ar-golden-yellow" id='section-2'>
		<div class="container py-5">
			<div class="row">
				<div class="col-lg-9">
					<h2 class="headline color-ar-deep-blue">with legal policies and procedures constantly in flux, it can be difficult for your ministry to evolve to meet regulations
						quickly.
					</h2>
					<p class="text-white">Legal compliance is something you can’t ignore. When ministries don’t strive to stay up-to-date with compliance, they open the door
						to
						confusion within your ministry team; if nobody within the organization is on the same page, legal setbacks can occur that can seriously damage the integrity of your
						ministry.</p>
				</div>
				<div class="col-5 col-lg-3"><?php k1_get_svg_asset( 'legal-update-docs' ); ?></div>
			</div>
		</div>
	</section>
	<section class="conference-plan pt-0">
		<div class="conference-plan__background position-absolute h-50 w-100 bg-color-ar-deep-blue"></div>
		<div class="container position-relative z-2 py-5">
			<div class="row my-5 justify-content-center">
				<div class="col-lg-10">
					<h2 class="text-white text-poppins text-center fs-3">When you attend the Above Reproach Legal Update Conference, you help shield your ministry from legal setbacks and
						provide
						your team with the tools to lead your ministry confidently through the legal changes of 2024.</h2>
				</div>
			</div>
			<div class="row my-5">
				<lite-youtube videoid='a8DQHrhvWyY' class='conference-plan__video' playlabel="About Kingdom One's Legal Update Conference"></lite-youtube>
			</div>
			<div class="row justify-content-around my-5">
				<?php
				$columns = array(
					array(
						'icon'        => 'step-1-shield',
						'headline'    => 'Shield Your Ministry',
						'subheadline' => 'Shield your ministry from legal setbacks',
					),
					array(
						'icon'        => 'step-2-tools',
						'headline'    => 'Provide the Right Tools',
						'subheadline' => 'Provide your team with the right tools',
					),
					array(
						'icon'        => 'step-3-confidence',
						'headline'    => 'Lead with Confidence',
						'subheadline' => 'Lead your ministry team with confidence',
					),
				);
				foreach ( $columns as $column ) :
					?>
				<div class="conference-plan__step col-lg-3 d-flex flex-column align-items-stretch">
					<figure class="conference-plan__step--icon mx-auto mb-5">
						<?php k1_get_svg_asset( 'legal-update-' . $column['icon'] ); ?>
					</figure>
					<h3 class="conference-plan__step--headline color-ar-golden-yellow text-center mt-3 mb-5"><?php echo $column['headline']; ?></h3>
					<p class="conference-plan__step--subheadline text-center"><?php echo $column['subheadline']; ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php
			$content->cta_button(
				array(
					'text'       => 'Register Now',
					'link'       => '#',
					'html_class' => 'conference-plan__cta-button',
				)
			);
			?>
		</div>
	</section>
	<?php
	get_template_part( 'template-parts/content', 'attorney-callout' );
	get_template_part( 'template-parts/final-cta/content', 'legal-update' );
	?>
	<section class="ministry-network bg-color-ar-golden-yellow pb-0">
		<div class="container">
			<div class="row justify-content-center"><?php k1_get_svg_asset( 'logo-hr-ministry-network' ); ?></div>
			<div class="row align-items-stretch mt-5">
				<div class="col-lg-10">
					<h2 class="color-ar-deep-blue">the ever-changing landscape of inistry compliance can be daunting.</h2>
					<p class="text-white">Balancing your mission with these intricate legal shifts can leave you feeling caught between staying true to your values and fulfilling
						regulatory
						requirements. When you attend the Above Reproach Legal Update Conference, you help shield your ministry from legal setbacks and provide your team with the tools to
						lead your ministry confidently through the legal changes of 2024.</p>
					<?php
					$content->cta_button(
						array(
							'text'       => 'Register Now',
							'link'       => '#',
							'html_class' => 'ministry-network__cta my-5',
						)
					);
					?>
				</div>
				<div class="col-lg-2 col-6 position-relative">
					<img src="<?php k1_get_image_asset_url( 'ar-the-judge--thumbs-up-min', 'webp' ); ?>" alt="" class="ministry-network__icons--judge position-absolute z-1">
					<img src="<?php k1_get_image_asset_url( 'ar-lady-justice-min', 'webp' ); ?>" alt="" class="ministry-network__icons--lady-justice position-absolute z-2">
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();