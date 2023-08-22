<?php
/**
 * The Template for the Hero Section
 */

var_dump( $content, $attributes );
$background                 = $attributes['background'] ?? 'background-color:var(--color-primary);';
$background_color           = $attributes['backgroundColor'] ?? 'var(--wp--preset--color--primary)';
$background_color_direction = $attributes['backgroundColorDirection'] ?? 'left';
?>
<section class="hero d-flex flex-column justify-content-center" id="hero">
	<div class="hero__background <?php echo 'color-' . $background_color_direction; ?>">
		<div class="hero__background--color" style="background-color:<?php echo $background_color; ?>"></div>
		<div class="hero__background--lower" style="<?php echo $background; ?>">
		</div>
		<?php
		if ( ! empty( $attributes['hasBackgroundImage'] ) ) {
			echo "<div class='hero__background--upper'></div>";
		}
		?>
	</div>
	<div class="hero__content container d-flex flex-column align-items-stretch">
		<div class="row">
			<div class="col-1 align-self-start h-auto position-relative d-none d-md-block">
			</div>
			<div class="position-relative d-flex flex-column col-11">
				<h1 class="hero__content--headline headline mb-5 display-1">
					<?php echo $attributes['headline'] ?? get_the_title(); ?>
				</h1>
			</div>
		</div>
	</div>
	<div class="container my-5">
		<div class="row position-relative z-3">
			<div class="col-1"></div>
			<div class="col-lg-11">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</section>