<?php
/**
 * Masonry Start Class and Id functions
 *
 * @since Markup 1.0.0
 *
 */
if (!function_exists('markup_masonry_start')) :
    function markup_masonry_start()
    { ?>
        <div class="masonry-start"><div id="masonry-loop">
        
        <?php
    }
endif;
add_action('markup_masonry_start_hook', 'markup_masonry_start', 10, 1);

/**
 * Masonry end Div
 *
 * @since Markup 1.0.0
 *
 */
if (!function_exists('markup_masonry_end')) :
    function markup_masonry_end()
    { ?>
        </div>
        </div>
        
        <?php
    }
endif;
add_action('markup_masonry_end_hook', 'markup_masonry_end', 10, 1);