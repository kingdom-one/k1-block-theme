<?php
/**
 * Page: ERC
 *
 * @package KingdomOne
 */

$content = new Content_Sections();
k1_enqueue_page_style( 'employeeRetentionCredit' );
?>
<section class="money-back">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-10">
				<h2>Ministries that partner with Kingdom One have received on average more than $250,000 in ERC funds.</h2>
				<p class="subheadline">The Federal Government has allocated money through the Employee Retention Credit (ERC)
					for organizations and ministries to persist through the pandemic based on employees retained.
					In just a few moments discover how much ERC your organization may qualify for.</p>
			</div>
		</div>
	</div>
</section>
<!-- <section class="calculator">
	<div class="container">
		<h3 class="color-erc-purple text-center headline">Estimate Your Employee Retention Credit Today!</h3>
		<p class="text-center">
			We’re so glad you’re interested in learning more about the Employee Retention Credit available to you through the Federal Government. Please complete this brief form so our ERC
			Team can connect with you for your next step in the ERC process.
		</p>
		ERC Calculator
</div>
</section> -->
<section class="erc-comparisons">
	<?php $content->get_color_background_layers( 'erc-comparisons', 'right', array( 'erc-comparisons-bg', 'webp' ) ); ?>
	<div class="container erc-comparisons__content position-relative z-2 py-5">
		<div class="row my-5">
			<div class="col">
				<h2 class="headline text-white mb-5">what is erc?</h2>
				<?php k1_get_svg_asset( 'leaves-3' ); ?>
				<p class="text-white">At Kingdom One we are driven by building meaningful relationships that help your organization become Courageous, Healthy, and Effective.
					There are several options for transactional solutions, but very few organizational advocates that will partner with the complexities of your unique situation. Here is
					what sets Kingdom One apart from other ERC partners:</p>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php
			$lists = array(
				'Kingdom One ERC+' => array( 'Financial <em>and</em> Ministry Professionals', 'Relational', 'Fees: Capped at 5%', '2 Hrs Finance/Accounting Consulting', '2 Hrs Human Resources Consulting', '4-Wk Transformational Finance Cohort', '4-Wk Healthy Staff Culture HR Cohort', 'Free Admission to K1 Events in 2023' ),
				"Others' ERC"      => array( 'Financial Professionals', 'Transactional', 'Fees: Upwards of 20%', 'Additional Charges Apply' ),
			);
			?>
			<?php foreach ( $lists as $list_title => $list ) : ?>
			<div class="col-lg-6 d-flex flex-column align-items-lg-center">
				<?php
				$is_second_list = "Others' ERC" === $list_title;
				$headline_class = $is_second_list ? 'erc-comparisons__list-2--headline' : 'erc-comparisons__list-1--headline';
				$list_class     = 'm-0 p-0 ' . ( $is_second_list ? 'erc-comparisons__list-2' : 'erc-comparisons__list-1' );
				$item_class     = 'list-unstyled text-lg-center m-0' . ( $is_second_list ? $list_class . '--item my-5 text-white-50' : $list_class . '--item my-5 text-white' );
				echo "<p class='{$headline_class} fw-bold'>{$list_title}</p>";

				$content->bulleted_list( $list, $item_class, 'ul', $list_class, true );
				?>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="row justify-content-center">
			<?php $content->cta_button(); ?>
		</div>
	</div>
</section>
<?php
get_template_part( 'template-parts/final-cta/content', 'erc', );