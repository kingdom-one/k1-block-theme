<?php //phpcs:ignore
/**
 * Basic Footer Template
 *
 * @since 1.0
 */

$current_year = gmdate( 'Y' );
?>
<footer class="footer bg-color-primary--dark pt-5 pb-3">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
				<a href="/" class="h1" aria-label='to Home page'>
					<figure class="logo">
						<?php echo file_get_contents( 'wp-content/themes/k1-theme/src/assets/K1-Logo-v2.svg' ); ?>
					</figure>
				</a>
				<div class="socials row justify-content-around align-self-stretch">
					<i class='fa-brands fa-facebook'></i>
					<i class='fa-brands fa-instagram'></i>
					<i class='fa-brands fa-linkedin'></i>
				</div>
			</div>
			<div class="my-5 col-md-8">
				<div class="row">
					<div class="col-md-4">
						<nav class="footer-nav" id="footer-nav-1">
							<ul>
								<li><a href="/about">About Us</a></li>
								<li><a href="#">Join the Team</a></li>
								<li><a href="#">Transparency in Coverage</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-4">
						<nav class="footer-nav" id="footer-nav-2">
							<ul>
								<li><a href="/services">Our Services</a></li>
								<li><a href="/staffing">Staffing</a></li>
								<li><a href="https://academy.kingdomone.co" target="_blank" rel="noreferrer noopener">Academy</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-4">
						<nav class="footer-nav" id="footer-nav-3">
							<ul>
								<li><a href="#">Free Resources</a></li>
								<li><a href="#">Podcast</a></li>
								<li><a href="#">Go Initiatives</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center text-center">
			<div id="copyright">&copy; <?php echo $current_year; ?> Kingdom One<br /> All Rights Reserved</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</footer>
</body>

</html>