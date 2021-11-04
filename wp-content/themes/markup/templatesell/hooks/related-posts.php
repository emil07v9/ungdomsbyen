<?php
/**
 * Display related posts from same category
 *
 * @since Markup 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('markup_related_post')) :
    
    function markup_related_post($post_id)
    {
        
        global $markup_theme_options;
        $title = esc_html($markup_theme_options['markup-single-page-related-posts-title']);
        if (0 == $markup_theme_options['markup-single-page-related-posts']) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) {
                ?>
                <div class="related-posts clearfix">
                    <h2 class="widget-title">
                        <?php echo $title; ?>
                    </h2>
                    <div class="related-posts-list">
                        <?php
                        $markup_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $markup_featured_query = new WP_Query($markup_cat_post_args);
                        
                        while ($markup_featured_query->have_posts()) : $markup_featured_query->the_post();
                            ?>
                            <div class="show-3-related-posts">
                                <div class="post-wrap">
                                    <?php
                                    if (has_post_thumbnail() ):
                                        ?>
                                        <?php
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src( $image_id,'',true );
                                         ?>
                                        <figure class="post-media">
                                            <a href="<?php the_permalink() ?>" class="post-image" style="background-image: url(<?php echo esc_url($image_url[0]);?>)">
                                            </a>
                                        </figure>
                                        <?php
                                    endif;
                                    ?>
                                    <div class="post-content">
                                        <h2 class="post-title entry-title"><a
                                                    href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>                                      
                                            <div class="post-date">
                                                <div class="entry-meta">
                                                <i class="fa fa-user-o"></i><?php  markup_posted_by(); ?>
                                                <i class="fa fa-calendar-o"></i><?php markup_posted_on(); ?>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div> <!-- .related-post-block -->
                <?php
            }
        }
    }
endif;
add_action('markup_related_posts', 'markup_related_post', 10, 1);