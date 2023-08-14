<?php
/**
 * A Component Class that displays content a few different ways. All methods have an $args bypass and an $echo control where `false` returns the markup and `true` echoes the markup. The $args array also shows expected parameters.
 *
 * @param bool $acf class-wide control to use acf fields or standard WordPress field lookups (e.g. `get_field` vs `get_the_excerpt`). If true, excerpt will be set with `get_field('archive_content',$id)`. Defaults `true`
 *
 * @author KJ Roelke
 * @version 1.0.0
 */
class Content_Components {
	/**
	 * A headline element that has lots of optional parameters in the $args array.
	 *
	 * @param array $args Pass optional customizations
	 *
	 * ```php
	 * $args = array(
	 * 'headline_element'        => ?string default "h2",
	 * 'headline_class'          => ?string default "headline",
	 * 'subheadline_element'     => ?string default 'span');
	 * 'subheadline_class'       => ?string default 'subheadline');
	 * 'subheadline_content'     => ?string the subheadline content,
	 * ```
	 */
	public function headline( string $headline, bool $echo = true, array $args = array() ) {
		$default = array(
			'headline_element'    => 'h2',
			'headline_class'      => 'headline',
			'subheadline_element' => 'span',
			'subheadline_class'   => 'subheadline',
			'subheadline_content' => '',
		);

		$options = array_merge( $default, $args );
		extract( $options );
		$headline            = esc_textarea( $headline );
		$markup              = "<{$headline_element} class='{$headline_class}'>{$headline}</{$headline_element}>";
		$subheadline_content = acf_esc_html( $subheadline_content );
		if ( ! empty( $subheadline_content ) ) {
			$markup .= "<{$subheadline_element} class='{$subheadline_class}'>{$subheadline_content}</{$subheadline_element}>";
		}
		if ( $echo ) {
			echo $markup;
		} else {
			return $markup;
		}
	}

	/**
	 *  Generates an `<a>` or `<button>` based on whether or not a $link is passed. Recommended use with named parameters for simple configuration.
	 *
	 * @param array $options {
	 *
	 *      @var string $text         The button text
	 *      @var string $link         The button href
	 *      @var string $html_class   btn classes
	 *      @var bool $is_external    Is the link external?
	 * }
	 * @param bool  $echo Whether to echo or return the markup (default: true)
	 */
	public function cta_button( array $options = array(), bool $echo = true ) {
		$default = array(
			'text'        => 'Get Started',
			'link'        => '/get-started',
			'html_class'  => 'btn__primary--fill',
			'is_external' => false,
		);
		$options = array_merge( $default, $options );
		extract( $options );
		$link = esc_url( $link );
		$text = esc_textarea( $text );
		if ( empty( $link ) ) {
			$markup = "<button class='{$html_class}'>{$text}</button>";
		} else {

			$markup = ( $is_external ) ? "<a href='{$link}' target='_blank' rel='noopener noreferrer' class='{$html_class}'>{$text}</a>" : "<a href='{$link}' class='{$html_class}'>{$text}</a>";
		}

		if ( $echo ) {
			echo $markup;
		} else {
			return $markup;
		}
	}

	/**
	 * Renders a ul/ol of list items
	 *
	 * @param array  $list_items         an array of strings to become the `<li>`s
	 * @param string $item_class        a string to set list item htmlClass
	 * @param string $list_type         `ul` | `ol`
	 * @param bool   $echo                `echo` or `return` the markup
	 */
	public function bulleted_list( array $list_items, string $item_class = '', string $list_type = 'ul', bool $echo = true ) {
		$markup = "<{$list_type}>";
		foreach ( $list_items as $item ) {
			$item    = acf_esc_html( $item );
			$markup .= empty( $item_class ) ? "<li>{$item}</li>" : "<li class='{$item_class}'>{$item}</li>";
		}
		$markup .= "</{$list_type}>";
		if ( $echo ) {
			echo $markup;
		} else {
			return $markup;
		}
	}

	/** Generates the Lower layer of the hero section */
	public function get_hero_background( bool $has_background_image, string $color, string $color_direction, string|null $background_image = '' ):string {
		$class  = $has_background_image ? "hero__background color-{$color_direction}" : 'hero__background';
		$markup = "<div class='{$class}'>";
		if ( $has_background_image ) {
			$markup .= "<div class='hero__background--color' style='background-color:var(--color-{$color})'></div><div class='hero__background--lower' style='background-image:url({$background_image})'></div>";
		} else {
			$markup .= '<div class="hero__background--lower" style="background-color:var(--color-primary--dark);"></div>';
		}
		if ( $has_background_image ) {
			$markup .= '<div class="hero__background--upper"></div>';
		}
		$markup .= '</div>';
		return $markup;
	}

	/** Gets the content layer of the Hero Section */
	public function get_hero_content( string $headine, string $subheadline, bool $has_cta, array $cta_options = array() ) : string {
		$markup  = "<div class='hero__content container d-flex flex-column align-items-stretch'><div class='row'><div class='col-1 align-self-start h-auto position-relative d-none d-md-block'>" . k1_get_svg_asset( 'leaves-3', false, false ) . "</div><div class='position-relative d-flex flex-column col-11'>";
		$markup .= $this->headline(
			$headine,
			false,
			array(
				'headline_element'    => 'h1',
				'headline_class'      => 'hero__content--headline headline mb-5 display-1',
				'subheadline_content' => $subheadline,
				'subheadline_class'   => 'hero__content--subheadline subheadline',
			)
		);
		if ( $has_cta ) {
			$markup .= $this->cta_button(
				array(
					'text'       => $cta_options['cta_text'],
					'link'       => $cta_options['cta_link'],
					'html_class' => 'hero__content--btn btn__primary--fill mt-5',
				),
				false
			);
		}
		$markup .= '</div></div></div>';
		return $markup;
	}
}