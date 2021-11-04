<?php
/**
 * Markup Promo Unique
 * @since Markup 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $markup_theme_options;
$promo_cat = absint($markup_theme_options['markup-promo-select-category']);

if( $promo_cat > 0 && is_home() )
{ ?>
    <div class="markup-promo-section">
        <?php if ( is_front_page() && is_home() )
        {  ?>
            <div class="container">
                <div class="row promo-section promo-one">
                    <?php
                    $args = array(
                        'cat' => $promo_cat ,
                        'posts_per_page' => 3,
                        'order'=> 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    
                    if($query->have_posts()):                        
                        while($query->have_posts()):
                            $query->the_post();
                            ?> 
                            <div class="col-md-4">                           
                            <div class="item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    
                                    if(has_post_thumbnail())
                                    {
                                        
                                        $image_id  = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id,'',true);
                                        ?>
                                        
                                        <figure class="image-box" style="background-image: url(<?php echo esc_url($image_url[0]);?>)">
                                        </figure>
                                    <?php   } ?>
                                
                                    <div class="promo-content">    
                                        <div class="post-tags">
                                                <?php $posttags = get_the_tags();
                                                if( !empty( $posttags ))
                                                {
                                                    ?>
                                                    <?php
                                                    $count = 0;
                                                    if ( $posttags )
                                                    {
                                                        foreach( $posttags as $c_tag )
                                                        {
                                                            $count++;
                                                            if ( 1 == $count )
                                                            {
                                                                echo $c_tag->name;
                                                            }
                                                        }
                                                    } ?>
                                                <?php  }else{
                                                    $categories = get_the_category();
                                                    if ( ! empty( $categories ) ) {
                                                        echo esc_html( $categories[0]->name );
                                                    }
                                                } ?>
                                            </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php   }