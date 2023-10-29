<section class="problems">
		<div class="container text-center">
			<div class="row justify-content-center mb-5">
				<div class="col-10">
					<h2>Has ministry gotten <span class="text-primary">complicated</span> for you and your team?
					</h2>
					<p class="subheadline my-5">Ministry life is a complicated life! Can we get an "amen"? While industry best practices and guidance is an excellent start, the pursuit
						of
						becoming courageous,
						healthy, and effective is nuanced. Our team is ready to partner with you in a 1:1 capacity to assess and coach you forward thoroughly.</p>
				</div>
			</div>
			<div class="row my-5">
				<?php
				$steps = array(
					array(
						'image'       => k1_get_image_asset_url( 'resources', 'svg', echo: false ),
						'headline'    => 'Grab some free resources',
						'subheadline' => 'Get to know us with free tools education, and resources',
					),
					array(
						'image'       => k1_get_image_asset_url( 'tools', 'svg', echo: false ),
						'headline'    => 'Grab tools &amp; Courses',
						'subheadline' => 'Grab a tool or course to sharpen your expertise',
					),
					array(
						'image'       => k1_get_image_asset_url( 'talents', 'svg', echo: false ),
						'headline'    => 'Grab some talents',
						'subheadline' => 'Grab some talents to help get the work done',
					),
				);
				?>
				<?php foreach ( $steps as $step ) : ?>
				<div class="col-lg-4">
					<img src="<?php echo $step['image']; ?>">
					<h3><?php echo $step['headline']; ?></h3>
					<p><?php echo $step['subheadline']; ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<a class="pill-btn__fill--primary mt-auto" href="#">Get Started</a>
		</div>
	</section>