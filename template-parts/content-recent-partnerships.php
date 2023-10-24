<?php
/**
 * Recent Partnerships
 *
 */

$content = new Content_Sections();
?>

<section class="recent-partnerships">
	<div class="row text-center">
		<div class="col">
			<h2 class="h1 headline">Recent Partnerships</h2>
			<p>We have had the privilege of partnering with so many amazing ministries. Below is some of the recent work that we have had the opportunity to be a part of.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<!-- slider here -->
		</div>
		<div class="col-6">
			<!-- slider here -->
		</div>
		<div class="col-4">
		</div>
		<div class="col-6">
			<?php
				$content->cta_button(
					array(
						'text'        => 'Storybrand',
						'url'         => 'https://academy.kingdomone.co',
						'is_external' => true,
						'html_class'  => 'btn__black--outline',
					)
				);
				?>
			<?php
				$content->cta_button(
					array(
						'text'        => 'Storybrand',
						'url'         => 'https://academy.kingdomone.co',
						'is_external' => true,
						'html_class'  => 'btn__black--outline',
					)
				);
				?>
			<?php
				$content->cta_button(
					array(
						'text'        => 'Storybrand',
						'url'         => 'https://academy.kingdomone.co',
						'is_external' => true,
						'html_class'  => 'btn__black--outline',
					)
				);
				?>
		</div>
	</div>
</section>