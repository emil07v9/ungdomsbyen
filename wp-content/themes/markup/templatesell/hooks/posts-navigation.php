<?php
/**
 * Post Navigation Function
 *
 * @since Markup 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('markup_posts_navigation')) :
    function markup_posts_navigation()
    {
        global $markup_theme_options;
        $markup_pagination_option = $markup_theme_options['markup-pagination-options'];
        if ('numeric' == $markup_pagination_option) {
            echo "<div class='pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left"></i>', 'markup'),
                'next_text' => __('<i class="fa fa-angle-right"></i>', 'markup'),
            ));
            echo "</div>";
        } elseif ('ajax' == $markup_pagination_option) {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            if(paginate_links()) {
                echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . __('View More', 'markup') . "</div><div id='free-temp-post'></div></div>";
            }
            } else {
            return false;
        }
    }
endif;
add_action('markup_action_navigation', 'markup_posts_navigation', 10);