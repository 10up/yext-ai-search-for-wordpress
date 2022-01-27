<?php
/**
 * Base functions for creating a field for the admin settings page
 *
 * @package Yext\Admin\Fields
 */

namespace Yext\Admin\Fields\Type;

use Yext\Admin\Fields\Type\AbstractField;

/**
 * Field type color
 */
class ColorField extends AbstractField {

	/**
	 * Regex for access token validation on save.
	 */
	const FORMAT_REGEX = '/^(#)([a-fA-F0-9]){6}/';

	/**
	 * Field constructor
	 *
	 * @param string $id    Setting id
	 * @param string $title Setting title
	 * @param array  $args  Field args
	 */
	public function __construct( $id, $title, $args ) {
		$this->type = 'color';
		parent::__construct( $id, $title, $args );
	}


	/**
	 * Render the field used on settings.
	 *
	 * @return void
	 */
	public function render() {
		$value    = $this->value;
		$variable = isset( $this->variable ) ? $this->variable : '';
		$help     = isset( $this->help ) ? $this->help : '';

		printf(
			'<input
				type="color"
				name="%s"
				id="%s"
				value="%s"
				data-variable="%s"
				autocomplete="off">',
			esc_attr( $this->setting_name( $this->id ) ),
			esc_attr( $this->id ),
			esc_attr( $value ),
			esc_attr( $variable )
		);

		if ( $help ) {
			printf(
				'<p class="help-text">%s</p>',
				wp_kses_post( $help )
			);
		}
	}

	/**
	 * Sanitize field value
	 * Check if value matches the color format
	 *
	 * @param string $value  Field value
	 * @param string $id     Field ID
	 * @return string $value Sanitized fField value
	 */
	protected function sanitize_value( $value, $id = '' ) {
		$value = parent::sanitize_value( $value, $id );
		return 1 === preg_match( self::FORMAT_REGEX, $value ) ? $value : '';
	}
}
