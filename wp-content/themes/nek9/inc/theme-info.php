<?php
/**
 * nek9sar info page
 *
 * @package nek9sar
 */


add_action('admin_menu', 'nek9sar_theme_info');

function nek9sar_theme_info() {
	add_theme_page('nek9sar WordPress Theme Information', 'nek9sar Info', 'edit_theme_options', 'nek9sar-info', 'nek9sar_info_display_content');
}


function nek9sar_info_display_content() { ?>
	
	<div class="nek9sar-theme-info">
		<?php 
			$nek9sar_details = wp_get_theme();
			$version = $nek9sar_details->get( 'Version' ); 
			$name = $nek9sar_details->get( 'Name' ); 
			$description = $nek9sar_details->get( 'Description' ); 
		?>
		<div class="nek9sar-info-header">
			<h1 class="nek9sar-info-title">
				<?php echo strtoupper( $name ) . ' ' . $version; ?>
			</h1>
		</div>
		<div class="nek9sar-info-body">
			<div class="nek9sar-theme-description">
				<p>
					<?php echo $description; ?>
				</p>
			</div>
			<div class="nek9sar-info-blocks">
				<div class="nek9sar-info-block aw-n-margin">
					<span class="dashicons dashicons-visibility"></span>
					<a href="<?php echo esc_url('http://themezhut.com/demo/nek9sar/'); ?>" target="_blank"><?php _e( 'View Demo', 'nek9sar' ); ?></a>
				</div>
				<div class="nek9sar-info-block">
					<span class="dashicons dashicons-book-alt"></span>
					<a href="<?php echo esc_url('http://themezhut.com/nek9sar-theme-documentation/'); ?>" target="_blank"><?php _e( 'Documentation', 'nek9sar' ); ?></a>
				</div>
				<div class="nek9sar-info-block">
					<span class="dashicons dashicons-businessman"></span>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/nek9sar'); ?>" target="_blank"><?php _e( 'Get Support', 'nek9sar' ); ?></a>
				</div>
				<div class="nek9sar-info-block aw-n-margin">
					<span class="dashicons dashicons-admin-generic"></span>
					<a href="<?php echo admin_url('customize.php'); ?>"><?php _e( 'Customize Site', 'nek9sar' ); ?></a>
				</div>
				<div class="nek9sar-info-block">
					<span class="dashicons dashicons-awards"></span>
					<a href="<?php echo esc_url('http://themezhut.com/themes/nek9sar-pro/'); ?>" target="_blank"><?php _e( 'nek9sar Pro', 'nek9sar' ); ?></a>
				</div>
				<div class="nek9sar-info-block">
					<span class="dashicons dashicons-search"></span>
					<a href="<?php echo esc_url('http://themezhut.com/demo/nek9sar-pro/'); ?>" target="_blank"><?php _e( 'nek9sar Pro Demo', 'nek9sar' ); ?></a>
				</div>

			</div>
		</div>
	</div>

<?php }

add_action( 'admin_menu', 'nek9sar_options_menu_item' );

function nek9sar_options_menu_item() {
	add_theme_page( 'nek9sar Options', 'Theme Options', 'manage_options', 'theme-options', 'nek9sar_options_page', 'dashicons-admin-generic', 100 ); 
}

function nek9sar_options_page() { ?>
	<div class="nek9sar-theme-info nek9sar-options">
		<p><?php _e( 'As per the new guidelines to remove theme options panels of the themes that are available on WordPress.org, we have completely removed the "Theme Options" panel with the new nek9sar 2.0 update. All the settings and options are now located in the theme customizer. Go to <b>"Appearence > Customize"</b> to find the Customizer or please use the "Contact Us" link below if you have run into any issues with the update.', 'nek9sar' ); ?></p>
		<p><a href="<?php echo admin_url('customize.php'); ?>"><?php _e( 'Go to customizer.', 'nek9sar' ); ?></a></p>
		<a href="<?php echo esc_url('http://themezhut.com/contact/'); ?>" target="_blank"><?php _e( 'Contact Us', 'nek9sar' ); ?></a>
	</div>
<?php }