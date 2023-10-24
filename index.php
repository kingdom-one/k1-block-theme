<?php
/**
 * Standard Archive Output
 */

get_header();
k1_enqueue_page_assets( 'archive' );
$content = new Content_Sections();
?>
<?php
$args = array(
	'has_background_image' => false,
	'alternate_headline'   => 'Free Resources',
	'subheadline'          => 'Jumpstart your ministry',
	'color_direction'      => 'left',
	'color'                => 'primary',
	'has_cta'              => false,
);
if ( is_category() ) {
	$args['alternate_headline'] = single_cat_title( '', false );
	$args['subheadline']        = single_cat_title( 'viewing posts in the ', false ) . ' category';
}
if ( is_tag() ) {
	$args['alternate_headline'] = single_tag_title( '', false );
	$args['subheadline']        = single_tag_title( 'viewing posts about ', false );

}
$content->hero_section( null, true, $args );
?>
<?php if ( have_posts() ) : ?>
<div class="container">
	<ul class="list-unstyled my-5 mx-0 post-container">
		<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<li class="post d-flex flex-column" data-permalink="<?php the_permalink(); ?>">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium', array( 'class' => 'post__image' ) );
			}
			?>
			<div class="post__content d-flex flex-column h-100">
				<h2 class="headline h4 text-primary--dark fs-2 mb-2 card-title"><?php echo get_the_title(); ?></h2>
				<div class="post__meta mb-5 fs-6 color-grey fw-bold">
					<span class="post__meta--date">Published <?php the_date( 'm/d/y' ); ?></span> in
					<?php echo get_the_term_list( $post->id, 'category', '', ', ' ); ?>
				</div>
				<p class="fs-5 mb-5"><?php echo get_the_excerpt(); ?></p>
				<div class="post__cta d-flex justify-content-between align-baseline mt-auto">
					<div class="post__cta--text">Read More</div>
					<div class="post__cta--icon">&rarr;</div>
				</div>
			</div>
			</a>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<?php else : ?>
<p>No posts found!</p>
<?php
endif;
get_footer();