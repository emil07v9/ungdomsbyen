<?php
/**
 * Added markup Page.
*/

/**
 * Add a new page under Appearance
 */
function markup_menu() {
	add_theme_page( __( 'Markup Options', 'markup' ), __( 'Markup Options', 'markup' ), 'edit_theme_options', 'markup-theme', 'markup_page' );
}
add_action( 'admin_menu', 'markup_menu' );

/**
 * Enqueue styles for the help page.
 */
function markup_admin_scripts( $hook ) {
	if ( 'appearance_page_markup-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'markup-admin-style', get_template_directory_uri() . '/templatesell/about/about.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'markup_admin_scripts' );

/**
 * Add the theme page
 */
function markup_page() {
	?>
	<div class="das-wrap">
		<div class="markup-panel">
			<div class="markup-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/templatesell/about/images/markup-logo.png' ); ?>" alt="Logo">
			</div>
			<a href="https://www.templatesell.com/item/markup-plus/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade Pro $49', 'markup' ); ?></a>
			<p>
			<?php esc_html_e( 'A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.', 'markup' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'markup' ); ?></a>
		</div>

		<div class="markup-panel">
			<div class="markup-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'markup' ); ?></h3>
				</div>
				<a href="http://www.docs.templatesell.net/markup" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Documentation - Click Here', 'markup' ); ?></a>
			</div>
		</div>
		<div class="markup-panel">
			<div class="markup-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'markup' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/markup/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'markup' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
