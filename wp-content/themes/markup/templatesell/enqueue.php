<?php
/**
 * Enqueue scripts and styles.
 */
function markup_scripts() {

	/*google font  */
	global $markup_theme_options;
    /*body  */
    wp_enqueue_style('markup-body', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet', array(), null);
    /*heading  */
    wp_enqueue_style('markup-heading', '//fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null);
    /*Author signature google font  */
    wp_enqueue_style('markup-sign', '//fonts.googleapis.com/css2?family=Monsieur+La+Doulaise&display=swap', array(), null);
    
	
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.5.0' );
    //*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0' );

   /*Main CSS*/
    wp_enqueue_style( 'markup-style', get_stylesheet_uri() );

	/*RTL CSS*/
	wp_style_add_data( 'markup-style', 'rtl', 'replace' );

    $markup_pagination_option =  esc_attr($markup_theme_options['markup-pagination-options']);
    
    if( 'ajax' == $markup_pagination_option )  {
    	
    	wp_enqueue_script( 'markup-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0', true );
    }
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', array(), '20200412', true );

    $masonry =  esc_attr($markup_theme_options['markup-column-blog-page']);
    if( 'masonry-post' == $masonry || 'one-column' == $masonry)  {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'markup-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array('jquery'), '4.6.0', true );
   }

	wp_enqueue_script( 'markup-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '4.6.0', true  );
    

    
    /*Custom Script JS*/
	wp_enqueue_script( 'markup-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20200412', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'markup-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'markup-custom', 'markup_ajax', array(
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'paged'     => $paged,
        'max_num_pages'      => $max_num_pages,
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'View More', 'markup' ),
        'no_more_posts'        => __( 'No More', 'markup' ),
    ));

	wp_enqueue_script( 'markup-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $markup_theme_options;
	if( 1 == absint($markup_theme_options['markup-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'markup-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'markup_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function markup_block_styles() {
    wp_enqueue_style( 'markup-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ) );

    /*body  */
    wp_enqueue_style('markup-body', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet', array(), null);
    
    /*heading  */
    wp_enqueue_style('markup-heading', '//fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null);

    $markup_custom_css = '
    .editor-styles-wrapper p{ 
        font-family: Roboto;
        line-height: 1.5;
    }

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{font-family:Roboto Slab;} 
    ';

    wp_add_inline_style( 'markup-editor-styles', $markup_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'markup_block_styles' );


/**
 * Enqueue Style for block pattern.
 */
function prefer_blog_block_style() {

    /*Block Pattern*/
    if (is_admin()) {
        wp_enqueue_style( 'markup-block-style', get_template_directory_uri() . '/templatesell/patterns/block-style.css');
    }
}
add_action( 'enqueue_block_assets', 'prefer_blog_block_style');
