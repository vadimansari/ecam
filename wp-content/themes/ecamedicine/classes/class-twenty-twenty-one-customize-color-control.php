<?php
/**
 * Customize API: WP_Customize_Color_Control class
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

/**
 * Customize Color Control class.
 *
 * @since Eca_Ecamedicine
 *
 * @see WP_Customize_Control
 */
class Twenty_Twenty_One_Customize_Color_Control extends WP_Customize_Color_Control {
	/**
	 * The control type.
	 *
	 * @since Eca_Ecamedicine
	 *
	 * @var string
	 */
	public $type = 'twenty-twenty-one-color';

	/**
	 * Colorpicker palette
	 *
	 * @since Eca_Ecamedicine
	 *
	 * @var array
	 */
	public $palette;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @since Eca_Ecamedicine
	 *
	 * @return void
	 */
	public function enqueue() {
		parent::enqueue();

		// Enqueue the script.
		wp_enqueue_script(
			'twentytwentyone-control-color',
			get_theme_file_uri( 'assets/js/palette-colorpicker.js' ),
			array( 'customize-controls', 'jquery', 'customize-base', 'wp-color-picker' ),
			wp_get_theme()->get( 'Version' ),
			false
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since Eca_Ecamedicine
	 *
	 * @uses WP_Customize_Control::to_json()
	 *
	 * @return void
	 */
	public function to_json() {
		parent::to_json();
		$this->json['palette'] = $this->palette;
	}
}
