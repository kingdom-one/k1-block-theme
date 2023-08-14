<?php
/**
 * A Component Class that displays content a few different ways. All methods have an $args bypass and an $echo control where `false` returns the markup and `true` echoes the markup. The $args array also shows expected parameters.
 *
 * @author KJ Roelke
 * @version 1.0.0
 */

require_once get_template_directory() . '/inc/component-classes/class-content-components.php';
class Content_Sections extends Content_Components {

	/**
	 * Gets the Hero `<section>` with class 'hero'. Optional Background Image or color.
	 *
	 * @param array $args Expects an associative array:
	 * ```php
	 *  $args = array(
	 * 'has_background_image' => bool,
	 * 'background_image'     => ?string the URL for CSS `background-image`,
	 * 'headline'             => string,
	 * 'subheadline'          => ?string,
	 * 'has_cta'              => bool,
	 * 'cta_link'             => ?string the url,
	 * 'cta_text'             => string,
	 * );
	 * ```
	 */

	public function hero_section( int $post_id = null, $echo = true, array $args = array() ) {
		if ( empty( $post_id ) ) {
			extract( $args );
		} else {
			$hero = get_field( 'hero', $post_id );
			extract( $hero );
		}
		$headline = empty( $alternate_headline ) ? get_the_title( $post_id ) : $alternate_headline;
		$markup   = '<section class="hero d-flex align-items-center" id="hero">';
		if ( ! isset( $background_image ) ) {
			$background_image = null;
		}
		$markup .= $this->get_hero_background( $has_background_image, $color, $color_direction, $background_image );
		$markup .= $this->get_hero_content( $headline, $subheadline, $has_cta, $cta_options );
		$markup .= '</section>';

		if ( $echo ) {
			echo $markup;
		} else {
			return $markup;
		}
	}

	/**
	 * Generate two-column layout with text and media
	 *
	 * @param array $options The options for the two-column layout
	 * ```php
	 * $options = array(
	 *  'split'            => array( 6, 6 ),
	 *  'headline'         => '',
	 *  'headline_element' => 'h2',
	 *  'headline_class'   => 'headline',
	 *  'content'          => '',
	 *  'content_wrapper'  => 'div',
	 *  'content_class'    => 'mb-5',
	 *  'cta'              => array ?? null,
	 *  'cta_class'        => 'btn__primary--fill',
	 *  'media_type'       => 'photo' | 'video' | 'svg'
	 *  'reverse'          => false,
	 *  'image'            => null | array | string,
	 * );
	 * ```
	 * @param bool  $echo Whether to echo or return the markup (default: true)
	 *
	 * @return string The markup for the two-column layout
	 */
	public function two_col_text_and_media( array $options, bool $echo = true ) {
		$default = array(
			'split'            => array( 6, 6 ),
			'headline'         => '',
			'headline_element' => '',
			'headline_class'   => '',
			'content'          => '',
			'content_wrapper'  => 'div',
			'content_class'    => 'mb-5',
			'cta'              => null,
			'cta_class'        => 'btn__primary--fill',
			'media_type'       => 'photo',
			'reverse'          => false,
			'image'            => null,
		);

		$options = array_merge( $default, $options );

		extract( $options );
		$container_classes = 'two-col row justify-content-between align-items-center' . ( $reverse ? ' flex-row-reverse' : '' );
		$container_start   = "<div class='{$container_classes}'>";
		$div_end           = '</div>';
		$col_1_start       = "<div class='two-col__col-1 col-lg-{$split[0]} position-relative" . ( 'svg' === $media_type ? ' align-self-start' : '' ) . "'>";
		$col_2_start       = "<div class='two-col__col-2 col-lg-{$split[1]}'>";
		$col_1_content     = '';

		if ( $image ) {
			if ( 'svg' === $media_type ) {
				$col_1_content = $image;
			} elseif ( 'photo' === $media_type ) {
				$col_1_content = "<figure class='two-col__image'>";
				if ( 'string' === gettype( $image ) ) {
					$alt            = $alt ?? '';
					$col_1_content .= "<img src={$image} alt='{$alt}'} />";
				} else {
					$alt            = esc_attr( $image['alt'] );
					$srcset         = wp_get_attachment_image_srcset( $image['ID'] );
					$col_1_content .= "<img src={$image['sizes']['two-col']} alt='{$alt}'} srcset='{$srcset}' />";
				}
				$col_1_content .= '</figure>';
			}
		} elseif ( 'video' === $media_type ) {
			$col_1_content = "<figure class='two-col__video'>Video!</figure>";
		}

		$headline_args = array(
			'subheadline_content' => $content,
			'subheadline_element' => $content_wrapper,
			'subheadline_class'   => $content_class,
		);

		if ( ! empty( $headline_element ) ) {
			$headline_args['headline_element'] = $headline_element;
		}

		if ( ! empty( $headline_class ) ) {
			$headline_args['headline_class'] = $headline_class;
		}
		$col_2_content = $this->headline( $headline, false, $headline_args );

		if ( $cta ) {
			$btn_options    = array(
				'text'        => esc_textarea( $cta['title'] ),
				'link'        => esc_url( $cta['url'] ),
				'is_external' => $cta['target'] ?? false,
				'html_class'  => $cta_class,
			);
			$col_2_content .= $this->cta_button( $btn_options, false );
		}

		$markup = "
        {$container_start}
            {$col_1_start}{$col_1_content}{$div_end}
            {$col_2_start}{$col_2_content}{$div_end}
        {$div_end}";

		if ( $echo ) {
			echo $markup;
		} else {
			return $markup;
		}
	}

	/**
	 * Vertical Card Layout with an image. $args overrides the `headline` settings
	 *
	 * @param array $args Expects an associative array:
	 * ```php
	 * $headline_args = array(
	 * 'headline_element'        => ?string default "h2",
	 * 'headline_class'          => ?string default "vertical-card__title",
	 * 'subheadline_element'     => ?string default 'p');
	 * 'subheadline_class'       => ?string default 'vertical-card__excerpt');
	 * 'subheadline_content'     => ?string the subheadline content,
	 * ```
	 */
	public function vertical_card( string $image_src, string $headline, string $excerpt, bool $echo = true, array $args = array() ) {
		$headline_args = array(
			'headline_class'      => 'vertical-card__title',
			'subheadline_element' => 'p',
			'subheadline_class'   => 'vertical-card__excerpt',
			'subheadline_content' => $excerpt,
		);

		$options = array_merge( $headline_args, $args );
		extract( $options );
		$card_image        = "<figure class='vertical-card__image'><img src={$image_src} /></figure>";
		$card_text_content = "<div class='vertical-card__content'>{$this->headline($headline, false,$options)}</div>";
		$markup            = "<div class='vertical-card'>{$card_image}{$card_text_content}</div>";
		if ( $echo ) {
			echo $markup;
		} else {
			return $markup;
		}
	}

	/** Generates the background layers for slanted backgrounds
	 *
	 * @link `~/src/styles/abstracts/mixins` see `background-layers` & `clip-path` mixins for associated SCSS params
	 *
	 * @param string $class the classname to prefix the CSS BEM-style classes with
	 * @param string $direction the direction of the clip path ( "right-bottom", "right-top", "left-bottom", "left-top", "left", "right", "zig-zag-left" )
	 * @param array  $bg_image args for `k1_get_image_asset_url( string $file, string $extension)`
	 */
	public function get_color_background_layers( string $class, string $direction, array $bg_image = array() ) {
		$layers  = "<div class='{$class}__background clip-color-{$direction}'>";
		$layers .= "<div class='{$class}__background--color'></div>";

		if ( empty( $bg_image ) ) {
			$layers .= "<div class='{$class}__background--lower'></div>";
		} else {
			$url     = k1_get_image_asset_url( $bg_image[0], $bg_image[1], 'bg-images', false );
			$layers .= "<div class='{$class}__background--lower'" . 'style="background-image:url(' . "'{$url}'" . ')"></div>';
			$layers .= "<div class='{$class}__background--upper'></div>";
		}
		$layers .= '</div>';
		echo $layers;
	}
}