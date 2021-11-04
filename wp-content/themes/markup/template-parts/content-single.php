<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Markup
 */
global $markup_theme_options;
$social_share = absint($markup_theme_options['markup-single-social-share']);
$image = absint($markup_theme_options['markup-single-page-featured-image']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if($image == 1 ){ ?>
            <div class="post-media">
                <?php markup_post_thumbnail(); ?>
            </div>
        <?php } ?>
        <div class="post-content">
            <div class="post-cats">
                <?php markup_entry_meta(); ?>
            </div>
            <?php
            if (is_singular()) :
                the_title('<h1 class="post-title entry-title">', '</h1>');
            else :
                the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                ?>
            <?php endif; ?>
            <div class="post-date">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <i class="fa fa-user-o"></i><?php  markup_posted_by(); ?>
                        <i class="fa fa-calendar-o"></i><?php markup_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </div>

            <div class="content post-excerpt entry-content clearfix">
                <?php
                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'markup'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                
                ));
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'markup'),
                    'after' => '</div>',
                
                ));
                ?>
            </div><!-- .entry-content -->
            <footer class="post-footer entry-footer">
                <div class="d-flex justify-content-between">
                    <?php if(has_tag()) { ?>
                        <div class="d-flex justify-content-start align-items-center post-tags"> 
                            <i class="fa fa-tag"></i> <?php markup_entry_tags_meta(); ?>
                        </div>
                    <?php } ?>
                    
                    <?php 
                    if( 1 == $social_share ){ ?>
                        <div class="d-flex justify-content-end">
                            <?php do_action( 'markup_social_sharing' ,get_the_ID() ); ?>
                        </div>
                    <?php } ?>
                </div>
            </footer><!-- .entry-footer -->
            <?php the_post_navigation(); ?>
            <?php 
            /**
             * markup_related_posts hook
             * @since Markup 1.0.0
             *
             * @hooked markup_related_posts -  10
             */
            do_action( 'markup_related_posts' ,get_the_ID() );
            ?>
            
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->