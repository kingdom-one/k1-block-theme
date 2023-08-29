<?php
/** Key Services Render */

?>
<aside class="top-talent-groups">
	<div class="container">
		<div class="row justify-content-center">
			<?php
				$icons = array(
					array(
						'title' => 'H.R.',
						'file'  => 'hr',
					),
					array(
						'title' => 'Finance',
						'file'  => 'finance',
					),
					array(
						'title' => 'Marketing & <br> Communications',
						'file'  => 'marcom',
					),
					array(
						'title' => 'Staffing',
						'file'  => 'staffing',
					),
				);
				foreach ( $icons as $icon ) {
					$filename = "tg-{$icon['file']}-icon";
					$svg      = k1_get_svg_asset( $filename, true, false );
					echo "<div class='icon col-12 col-lg-3 my-5 my-lg-0'><img class='icon__svg' src='{$svg}' /><span class='icon__label'>{$icon['title']}</span></div>";
				}
				?>
		</div>
	</div>
</aside>