<?php
/**
 * Goto Top functions
 *
 * @since Markup 1.0.0
 *
 */

if (!function_exists('markup_go_to_top')) :
    function markup_go_to_top()
    {
    ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'markup'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
<?php
    } endif;
add_action('markup_go_to_top_hook', 'markup_go_to_top', 10, 1);