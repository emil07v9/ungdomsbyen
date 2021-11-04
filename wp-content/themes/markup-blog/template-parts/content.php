<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markup
 */
global $markup_theme_options;
$show_content_from = esc_attr($markup_theme_options['markup-content-show-from']);
$read_more = esc_html($markup_theme_options['markup-read-more-text']);
$masonry = esc_attr($markup_theme_options['markup-column-blog-page']);
$image_location = esc_attr($markup_theme_options['markup-blog-image-layout']);
$social_share = absint($markup_theme_options['markup-show-hide-share']);
$date = absint($markup_theme_options['markup-show-hide-date']);
$category = absint($markup_theme_options['markup-show-hide-category']);
$author = absint($markup_theme_options['markup-show-hide-author']);
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src( $image_id,'',true );
$classes = array(
    $masonry,
    'item-blog',
);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <div class="post-wrap <?php echo esc_attr($image_location); ?>">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <a href="<?php the_permalink(); ?>" class="post-image" style="background-image: url(<?php echo esc_url($image_url[0]);?>)"></a>
                
            </div>
        <?php } ?>
        <div class="post-content">
            <?php if($category == 1 ){ ?>
                <div class="post-cats">
                    <?php markup_entry_meta(); ?>
                </div>
            <?php } ?>
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                    the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    ?>
                <?php endif; ?>
            </div>
            <div class="post-meta">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="post-date">
                        <div class="entry-meta">
                            <?php
                            if($author == 1 ){
                                ?>
                                <i class="fa fa-user-o"></i>
                              <?php
                                markup_posted_by();
                            }
                            if($date == 1 ){ ?>
                                <i class="fa fa-calendar-o"></i>
                              <?php  markup_posted_on(); 
                             }
                            ?>
                            <i class="fa fa-book"></i>
                            <?php markup_blog_read_time(); ?>
                        </div><!-- .entry-meta -->
                    </div>
                <?php endif; ?>
            </div>
            <div class="post-excerpt entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'markup-blog'),
                    'after' => '</div>',
                ));
                ?>
                <div class="d-flex justify-content-between align-items-center">
                    <!-- read more -->
                    <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                        <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> 
                        <i class="fa fa-long-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                    <div class="meta_bottom">
                        <?php 
                        if( 1 == $social_share ){
                            do_action( 'markup_social_sharing' ,get_the_ID() );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post- -->