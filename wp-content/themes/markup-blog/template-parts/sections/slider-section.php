<?php 
/**
 * Markup Slider Function
 * @since Markup 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $markup_theme_options;
$slide_id = absint($markup_theme_options['markup-select-category']);
        $slick_args = array(
            'slidesToShow'      => 1,
            'slidesToScroll'    => 1,
            'dots'              => false,
            'arrows'            => false,
        );
      $args = array(
			'posts_per_page' => 2,
			'paged' => 1,
			'cat' => $slide_id,
			'post_type' => 'post'
		);
    ?>
  <div class="banner-section mt-5">
      <?php
  		$slider_query = new WP_Query($args);
  		if ($slider_query->have_posts()): ?>
      <div class="banner-slider">
  				<?php while ($slider_query->have_posts()) : $slider_query->the_post(); 
            if(has_post_thumbnail()){
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src( $image_id,'',true );
          ?>
  				
            <div class="sinlge-banner">
              <div class="banner-wrapper">
                <div class="banner-bg" style="background-image: url(<?php echo esc_url($image_url[0]);?>)"></div>
                  <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s">
                      <div class="post-cats mb-4">
                        <?php markup_entry_meta(); ?>
                      </div>
                      <h3 class="title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <div class="post-date">
                        <div class="entry-meta">
                          <i class="fa fa-user-o"></i><?php markup_posted_by(); ?>
                          <i class="fa fa-calendar-o"></i><?php markup_posted_on(); ?>
                          <i class="fa fa-book"></i>
                            <?php markup_blog_read_time(); ?>
                        </div>
                      </div>
                      <div data-animation="fadeInUp" data-delay="1s">
                        <?php the_excerpt(); ?>
                      </div>
                      <a href="<?php the_permalink(); ?>" class="read-more" data-animation="fadeInUp" data-delay="1.2s"><?php echo esc_html( 'Read More', 'markup-blog' ); ?> <i class="fa fa-long-arrow-right"></i>
                      </a>
                  </div>
              </div>
            </div>
          <?php } endwhile;
          wp_reset_postdata(); ?>
      </div>
      <?php endif; ?>
      <div class="banner-nav"></div>
  </div>