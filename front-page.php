<?php
/**
 * The Front Page
 */

get_header();
$content = new Content_Sections();
k1_enqueue_page_assets( 'frontPage' );
?>
<main class="site-content">
	<?php the_content();?>
</main>
<?php
get_footer();