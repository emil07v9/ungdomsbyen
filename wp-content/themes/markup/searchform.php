<?php
/**
 * Custom search form
 *
 * @package Markup
 */
global $markup_theme_options;
$placeholder_text = esc_attr($markup_theme_options['markup_search_placeholder']);
?>
<form id="searchform" class="searchform d-flex flex-nowrap" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="search-field order-1" name="s" placeholder="<?php echo $placeholder_text; ?>" value="<?php echo get_search_query(); ?>">
	<button class="search_btn" type="submit" value="<?php echo get_search_query();?>"><i class="fa fa-search"></i></button>
</form>	