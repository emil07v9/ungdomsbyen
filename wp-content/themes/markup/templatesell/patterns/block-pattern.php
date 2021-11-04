<?php
/**
 * Register block patterns.
 * Include this file in your theme, and update image paths, prefix and text domain.
 *
 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
 */

/**
 * Make sure that block patterns are enabled before registering.
 * Requires WordPress version 5.5 or Gutenberg version 7.8.
 */
if ( function_exists( 'register_block_pattern' ) ) {


	/**
	 * Check if the register_block_pattern_category exists.
	 * Requires WordPress 5.5 or Gutenberg version 8.2.
	 */
	/**
	 * Register Block Pattern Category.
	 */
	if ( function_exists( 'register_block_pattern_category' ) ) {

		register_block_pattern_category(
			'markup',
			array( 'label' => esc_html__( 'Markup', 'markup' ) )
		);
	}

	/**
	 * Profile block with social links.
	*/
	/**
	 * Register the pattern.
	 */
	register_block_pattern(
		'markup/profile',
		array(
			'title'       => __( 'Author Profile', 'markup' ),
			'categories'  => array( 'markup' ),
			'keywords'    => array( __( 'Profile', 'markup' ), __( 'User', 'markup' ) ),
			'description' => __( 'A profile pattern with photo, text content, social media links and latest posts.', 'markup' ),
			'content'     => '
				<!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":33.33} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:image {"id":62,"sizeSlug":"large"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/author.jpg' ) ) . '" alt="" class="wp-image-62"/></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":66.66} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:heading {"className":"author_title"} -->
				<h2 class="author_title">Ashley Graham</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"author_designation"} -->
				<p class="author_designation"><em>Administrator</em></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p>At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from.</p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links -->
				<ul class="wp-block-social-links"><!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->

				<!-- wp:social-link {"url":"#","service":"facebook"} /-->

				<!-- wp:social-link {"url":"#","service":"twitter"} /-->

				<!-- wp:social-link {"url":"#","service":"instagram"} /-->

				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

				<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
				<!-- /wp:social-links --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->',
		)
	);

/**
	 * Contact block with phone, email, map and form.
	 *
	 * Images are from fontawesome icons
	*/
	/**
	 * Register the pattern.
	 */
	register_block_pattern(
		'markup/contact',
		array(
			'title'       => __( 'Contact Form', 'markup' ),
			'categories'  => array( 'markup' ),
			'keywords'    => array( __( 'Contact', 'markup' ), __( 'User', 'markup' ) ),
			'description' => __( 'A contact form pattern with form, email ,phone, etc.', 'markup' ),
			'content'     => '
				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":40} -->
				<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading -->
				<h2>Contact Information</h2>
				<!-- /wp:heading -->

				<!-- wp:media-text {"mediaId":350,"mediaLink":"' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/email-icon.png' ) ) . '","mediaType":"image","mediaWidth":15,"verticalAlignment":"center"} -->
				<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center" style="grid-template-columns:15% auto"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/email-icon.png' ) ) . '" alt="" class="wp-image-350"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"className":"m_b_0 font-20"} -->
				<p class="m_b_0 font-20"><strong>Mail Information</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"m_b_0"} -->
				<p class="m_b_0">info@templatesell.com</p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:media-text -->

				<!-- wp:media-text {"mediaId":351,"mediaLink":"' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/map-icon.png' ) ) . '","mediaType":"image","mediaWidth":15,"verticalAlignment":"center"} -->
				<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center" style="grid-template-columns:15% auto"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/map-icon.png' ) ) . '" alt="" class="wp-image-351"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"className":"m_b_0 font-20"} -->
				<p class="m_b_0 font-20"><strong>Our Main Office Address</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"m_b_0"} -->
				<p class="m_b_0">FA - 154 Careon Street, California, USA</p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:media-text -->

				<!-- wp:media-text {"mediaId":352,"mediaLink":"' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/phone-icon.png' ) ) . '","mediaType":"image","mediaWidth":15,"verticalAlignment":"center"} -->
				<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center" style="grid-template-columns:15% auto"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/phone-icon.png' ) ) . '" alt="" class="wp-image-352"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"className":"m_b_0 font-20"} -->
				<p class="m_b_0 font-20"><strong>Call Us Now</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"m_b_0"} -->
				<p class="m_b_0">+435-64773728, +062-35363782</p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:media-text --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading -->
				<h2>Type Message</h2>
				<!-- /wp:heading -->

				<!-- wp:shortcode -->
				[contact-form-7 id="356" title="Contact form 1"]
				<!-- /wp:shortcode --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->

				',
		)
	);
	register_block_pattern(
		'markup/about',
		array(
			'title'       => __( 'About Us', 'markup' ),
			'categories'  => array( 'markup' ),
			'keywords'    => array( __( 'Contact', 'markup' ), __( 'User', 'markup' ) ),
			'description' => __( 'A contact form pattern with form, email ,phone, etc.', 'markup' ),
			'content'     => '
			<!-- wp:group -->
			<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:group -->
			<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
			<h2>Career Start</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Decommissioned planes are brought to this boneyard in Tucson, Arizona because of dry climate and hard desert soil. It’s easier to preserve the machines in dry air, and their wheels easily roll on the desert soil. Some of the planes come here to be modernized and get back into the air. Some become spare part donors. And some are recycled to get .</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"borderRadius":4,"backgroundColor":"black","textColor":"white"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-black-background-color has-text-color has-background" style="border-radius:4px">Read More</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"right","id":57,"sizeSlug":"large"} -->
			<div class="wp-block-image"><figure class="alignright size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p2.jpg' ) ) . '" alt="" class="wp-image-57"/></figure></div>
			<!-- /wp:image --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:group --></div></div>
			<!-- /wp:group -->
			',
		)
	);

	register_block_pattern(
		'markup/promo',
		array(
			'title'       => __( 'Promo', 'markup' ),
			'categories'  => array( 'markup' ),
			'keywords'    => array( __( 'Contact', 'markup' ), __( 'User', 'markup' ) ),
			'description' => __( 'A contact form pattern with form, email ,phone, etc.', 'markup' ),
			'content'     => '
			<!-- wp:group -->
			<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":151,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p3.jpg' ) ) . '" alt="" class="wp-image-151"/><figcaption>NUTRITION STRATEGIES</figcaption></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":150,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p4.jpg' ) ) . '" alt="" class="wp-image-150"/><figcaption>NUTRITION STRATEGIES</figcaption></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":149,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p5.jpg' ) ) . '" alt="" class="wp-image-149"/><figcaption>NUTRITION STRATEGIES</figcaption></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:group -->
			',
		)
	);

	register_block_pattern(
		'markup/left-image',
		array(
			'title'       => __( 'About Two', 'markup' ),
			'categories'  => array( 'markup' ),
			'keywords'    => array( __( 'Contact', 'markup' ), __( 'User', 'markup' ) ),
			'description' => __( 'A contact form pattern with form, email ,phone, etc.', 'markup' ),
			'content'     => '
				<!-- wp:group -->
				<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"left","id":19,"sizeSlug":"large"} -->
				<div class="wp-block-image"><figure class="alignleft size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p1.jpg' ) ) . '" alt="" class="wp-image-19"/></figure></div>
				<!-- /wp:image --></div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
				<h2>About Me</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Decommissioned planes are brought to this boneyard in Tucson, Arizona because of dry climate and hard desert soil. It’s easier to preserve the machines in dry air, and their wheels easily roll on the desert soil. Some of the planes come here to be modernized and get back into the air. Some become spare part donors. And some are recycled to get .</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div></div>
				<!-- /wp:group -->
			',
		)
	);

	register_block_pattern(
		'markup/grid',
		array(
			'title'       => __( 'Grid', 'markup' ),
			'categories'  => array( 'markup' ),
			'keywords'    => array( __( 'Contact', 'markup' ), __( 'User', 'markup' ) ),
			'description' => __( 'A contact form pattern with form, email ,phone, etc.', 'markup' ),
			'content'     => '
				<!-- wp:group -->
			<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"className":"col-bg"} -->
			<div class="wp-block-column col-bg"><!-- wp:image {"id":145,"sizeSlug":"full"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p6.jpg' ) ) . '" alt="" class="wp-image-145"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"align":"center","level":3} -->
			<h3 class="has-text-align-center">Title Here</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Decommissioned planes are brought to this boneyard in Tucson, Arizona because of dry climate and hard desert soil. It’s easier to preserve the machines in dry air, and their wheels easily roll on the desert soil.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"col-bg"} -->
			<div class="wp-block-column col-bg"><!-- wp:image {"id":145,"sizeSlug":"full"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p4.jpg' ) ) . '" alt="" class="wp-image-145"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"align":"center","level":3} -->
			<h3 class="has-text-align-center">Title Here</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Decommissioned planes are brought to this boneyard in Tucson, Arizona because of dry climate and hard desert soil. It’s easier to preserve the machines in dry air, and their wheels easily roll on the desert soil.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"col-bg"} -->
			<div class="wp-block-column col-bg"><!-- wp:image {"id":145,"sizeSlug":"full"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p2.jpg' ) ) . '" alt="" class="wp-image-145"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"align":"center","level":3} -->
			<h3 class="has-text-align-center">Title Here</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Decommissioned planes are brought to this boneyard in Tucson, Arizona because of dry climate and hard desert soil. It’s easier to preserve the machines in dry air, and their wheels easily roll on the desert soil.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:group -->
			',
		)
	);

	register_block_pattern(
		'markup/project',
		array(
			'title'       => __( 'Project', 'markup' ),
			'categories'  => array( 'markup' ),
			'keywords'    => array( __( 'Contact', 'markup' ), __( 'User', 'markup' ) ),
			'description' => __( 'A contact form pattern with form, email ,phone, etc.', 'markup' ),
			'content'     => '
				<!-- wp:group -->
				<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"className":"col-bg"} -->
				<div class="wp-block-column col-bg"><!-- wp:image {"id":112,"sizeSlug":"large"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p3.jpg' ) ) . '" alt="" class="wp-image-112"/></figure>
				<!-- /wp:image -->

				<!-- wp:buttons {"align":"center"} -->
				<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":4} -->
				<div class="wp-block-button"><a class="wp-block-button__link" style="border-radius:4px">Project</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"borderRadius":0,"backgroundColor":"white","textColor":"black"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background no-border-radius">JANUARY 05, 20</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons -->

				<!-- wp:heading {"align":"center"} -->
				<h2 class="has-text-align-center">Super Healthy Drinks</h2>
				<!-- /wp:heading -->

				<!-- wp:buttons {"align":"center"} -->
				<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":0,"backgroundColor":"white","textColor":"black"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background no-border-radius">READ MORE</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:column -->

				<!-- wp:column {"className":"col-bg"} -->
				<div class="wp-block-column col-bg"><!-- wp:image {"id":111,"sizeSlug":"large"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'templatesell/patterns/images/p5.jpg' ) ) . '" alt="" class="wp-image-111"/></figure>
				<!-- /wp:image -->

				<!-- wp:buttons {"align":"center"} -->
				<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":4} -->
				<div class="wp-block-button"><a class="wp-block-button__link" style="border-radius:4px">Project</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"borderRadius":0,"backgroundColor":"white","textColor":"black"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background no-border-radius">JANUARY 05, 20</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons -->

				<!-- wp:heading {"align":"center"} -->
				<h2 class="has-text-align-center">Super Healthy Drinks</h2>
				<!-- /wp:heading -->

				<!-- wp:buttons {"align":"center"} -->
				<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":0,"backgroundColor":"white","textColor":"black"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background no-border-radius">READ MORE</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div></div>
				<!-- /wp:group -->
			',
		)
	);
}
