<?php
/**
 * Content Part: BG Rolling Hills
 */

$background_image = k1_get_image_asset_url( 'bg-rolling-hills', 'svg', 'bg-images', false );
extract( $args );

$headline    = esc_textarea( $headline );
$subheadline = esc_textarea( $subheadline );
$cta['text'] = esc_textarea( $cta['text'] );
$cta['link'] = esc_url( $cta['link'] );
$row_2       = acf_esc_html( $row_2 );

$classes = 'bg-rolling-hills';
if ( isset( $class ) && ! empty( $class ) ) {
	$classes .= ' ' . $class;
}

?>
<section class="<?php echo $classes; ?> " id="<?php echo $id ?? ''; ?>" style="background-image:url('<?php echo $background_image; ?>')">
	<div class="container">
		<div class="row">
			<div class="col align-items-stretch">
				<div class="<?php echo $class . '__content'; ?>">
					<h2 class="text-white"><?php echo $headline; ?></h2>
					<span class="subheadline text-white"><?php echo $subheadline; ?></span>
					<a class="pill-btn__fill--primary" href="<?php echo $cta['link']; ?>">
						<?php echo $cta['text']; ?>
					</a>
				</div>
			</div>
		</div>
		<div class="row <?php echo empty( $class ) ? 'bg-rolling-hills__row-2' : $class . '__row-2'; ?>">
			<div class="col text-white">
				<?php echo $row_2; ?>
			</div>
		</div>
	</div>
</section>