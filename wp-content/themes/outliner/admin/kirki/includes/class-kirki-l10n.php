<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'outliner';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'outliner' ),
				'background-image'      => esc_attr__( 'Background Image', 'outliner' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'outliner' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'outliner' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'outliner' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'outliner' ),
				'inherit'               => esc_attr__( 'Inherit', 'outliner' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'outliner' ),
				'cover'                 => esc_attr__( 'Cover', 'outliner' ),
				'contain'               => esc_attr__( 'Contain', 'outliner' ),
				'background-size'       => esc_attr__( 'Background Size', 'outliner' ),
				'fixed'                 => esc_attr__( 'Fixed', 'outliner' ),
				'scroll'                => esc_attr__( 'Scroll', 'outliner' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'outliner' ),
				'left-top'              => esc_attr__( 'Left Top', 'outliner' ),
				'left-center'           => esc_attr__( 'Left Center', 'outliner' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'outliner' ),
				'right-top'             => esc_attr__( 'Right Top', 'outliner' ),
				'right-center'          => esc_attr__( 'Right Center', 'outliner' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'outliner' ),
				'center-top'            => esc_attr__( 'Center Top', 'outliner' ),
				'center-center'         => esc_attr__( 'Center Center', 'outliner' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'outliner' ),
				'background-position'   => esc_attr__( 'Background Position', 'outliner' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'outliner' ),
				'on'                    => esc_attr__( 'ON', 'outliner' ),
				'off'                   => esc_attr__( 'OFF', 'outliner' ),
				'all'                   => esc_attr__( 'All', 'outliner' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'outliner' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'outliner' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'outliner' ),
				'greek'                 => esc_attr__( 'Greek', 'outliner' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'outliner' ),
				'khmer'                 => esc_attr__( 'Khmer', 'outliner' ),
				'latin'                 => esc_attr__( 'Latin', 'outliner' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'outliner' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'outliner' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'outliner' ),
				'arabic'                => esc_attr__( 'Arabic', 'outliner' ),
				'bengali'               => esc_attr__( 'Bengali', 'outliner' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'outliner' ),
				'tamil'                 => esc_attr__( 'Tamil', 'outliner' ),
				'telugu'                => esc_attr__( 'Telugu', 'outliner' ),
				'thai'                  => esc_attr__( 'Thai', 'outliner' ),
				'serif'                 => _x( 'Serif', 'font style', 'outliner' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'outliner' ),
				'monospace'             => _x( 'Monospace', 'font style', 'outliner' ),
				'font-family'           => esc_attr__( 'Font Family', 'outliner' ),
				'font-size'             => esc_attr__( 'Font Size', 'outliner' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'outliner' ),
				'line-height'           => esc_attr__( 'Line Height', 'outliner' ),
				'font-style'            => esc_attr__( 'Font Style', 'outliner' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'outliner' ),
				'top'                   => esc_attr__( 'Top', 'outliner' ),
				'bottom'                => esc_attr__( 'Bottom', 'outliner' ),
				'left'                  => esc_attr__( 'Left', 'outliner' ),
				'right'                 => esc_attr__( 'Right', 'outliner' ),
				'center'                => esc_attr__( 'Center', 'outliner' ),
				'justify'               => esc_attr__( 'Justify', 'outliner' ),
				'color'                 => esc_attr__( 'Color', 'outliner' ),
				'add-image'             => esc_attr__( 'Add Image', 'outliner' ),
				'change-image'          => esc_attr__( 'Change Image', 'outliner' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'outliner' ),
				'add-file'              => esc_attr__( 'Add File', 'outliner' ),
				'change-file'           => esc_attr__( 'Change File', 'outliner' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'outliner' ),
				'remove'                => esc_attr__( 'Remove', 'outliner' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'outliner' ),
				'variant'               => esc_attr__( 'Variant', 'outliner' ),
				'subsets'               => esc_attr__( 'Subset', 'outliner' ),
				'size'                  => esc_attr__( 'Size', 'outliner' ),
				'height'                => esc_attr__( 'Height', 'outliner' ),
				'spacing'               => esc_attr__( 'Spacing', 'outliner' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'outliner' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'outliner' ),
				'light'                 => esc_attr__( 'Light 200', 'outliner' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'outliner' ),
				'book'                  => esc_attr__( 'Book 300', 'outliner' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'outliner' ),
				'regular'               => esc_attr__( 'Normal 400', 'outliner' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'outliner' ),
				'medium'                => esc_attr__( 'Medium 500', 'outliner' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'outliner' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'outliner' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'outliner' ),
				'bold'                  => esc_attr__( 'Bold 700', 'outliner' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'outliner' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'outliner' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'outliner' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'outliner' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'outliner' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'outliner' ),
				'add-new'           	=> esc_attr__( 'Add new', 'outliner' ),
				'row'           		=> esc_attr__( 'row', 'outliner' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'outliner' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'outliner' ),
				'back'                  => esc_attr__( 'Back', 'outliner' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'outliner' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'outliner' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'outliner' ),
				'none'                  => esc_attr__( 'None', 'outliner' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'outliner' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'outliner' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'outliner' ),
				'initial'               => esc_attr__( 'Initial', 'outliner' ),
				'select-page'           => esc_attr__( 'Select a Page', 'outliner' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'outliner' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'outliner' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'outliner' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'outliner' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
