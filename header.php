<?php
/**
 * Basic Header Template
 *
 * @package KingdomOne
 */

?>

<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header py-3 w-100 position-absolute" id="site-header">
		<div class="navbar container-fluid gx-5 py-4">
			<div class="row justify-content-between">
				<div class="col-6">
					<a class="d-inline-flex flex-column flex-lg-row justify-content-center justify-content-lg-start align-items-center" href="<?php echo esc_url( site_url() ); ?>"
					   class="logo" aria-label="to Home Page">
						<figure class="logo-image d-inline-block m-0">
							<?php echo file_get_contents( 'wp-content/themes/k1-block-theme/src/assets/K1-Logo-v2.svg' ); ?>
						</figure>
						<h1 class="site-title d-block text-center">
							<?php echo bloginfo( 'name' ); ?>
						</h1>
					</a>
				</div>
				<div class="col d-flex justify-content-end align-items-center">
					<div class="d-none w-auto d-lg-flex justify-content-center align-items-center me-5">
						<a href="/get-started" class="btn__primary--fill cta pill-btn">Get Started</a>
					</div>
					<div class="h-100 me-5 d-flex align-items-center justify-content-center">
						<div class="hamburger d-flex flex-column justify-content-evenly align-items-center" data-bs-toggle="offcanvas" data-bs-target="#mobileMainMenu"
							 aria-controls="mobileMainMenu">
							<span class=" hamburger__lines"></span>
							<span class="hamburger__lines"></span>
							<span class="hamburger__lines"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php get_template_part( 'template-parts/nav', 'offcanvas' ); ?>