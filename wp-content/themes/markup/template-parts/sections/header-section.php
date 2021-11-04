<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Markup
 */
$GLOBALS['markup_theme_options'] = markup_get_options_value();
global $markup_theme_options;
$enable_social = absint($markup_theme_options['markup_enable_top_header_social']);
$search_header = absint($markup_theme_options['markup_enable_search']);
$ads_header = esc_url($markup_theme_options['markup_enable_advertisement']);
$ads_link = esc_url($markup_theme_options['markup_link_advertisement']);
$logo_position = esc_attr($markup_theme_options['markup_logo_position_option']);
?>
<header class="header-1 header-mobile d-md-block d-lg-none">		
	<section class="main-header">
		<?php $header_image = esc_url(get_header_image());
			$header_class = ($header_image == "") ? '' : 'header-image';
		?>
		<div class="head_one py-0 <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
			<div class="container">
				<div class="row align-items-center">
					<div class="<?php echo esc_attr($logo_position); ?> col-12">
						<div class="logo text-center">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							endif;
							$markup_description = get_bloginfo( 'description', 'display' );
							if ( $markup_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $markup_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-logo -->
					</div>
					
				</div>
			</div>
		</div>
		<div class="menu-area border-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 d-flex align-items-center justify-content-between">
						<nav id="site-navigation" class="site-navigation">
							<div class="hamburger-menu">
								<button class="bar-menu">
									<span></span>
								</button>
							</div>
							<div class="main-menu menu-caret">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container' => 'ul',
									'menu_class'      => ''
								));
								?>
							</div>
						</nav><!-- #site-navigation -->
						<div class="header-right d-flex align-items-center justify-content-end">
							<?php if( $enable_social == 1 ){ ?>
								<div class="social-links">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_id'        => 'social-menu',
											'menu_class'     => 'markup-social-menu',
										) );
									?>
								</div>
							<?php } ?>
							<?php if( 1 == $search_header ){ ?>
								<div class="search">
									<i class="fa fa-search"></i>
									<div class="box-search">
											<?php //echo get_search_form(); ?>
											<form id="searchform" class="searchform d-flex flex-nowrap" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
												<input type="text" class="search-field order-1" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
												<button class="search_btn" type="submit" value="Search"><i class="fa fa-search"></i></button>
											</form>				
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
					
					<?php if(!empty($ads_header)): ?>
						<div class="<?php echo esc_attr($logo_position); ?> col-sm-8 text-right">
							<div class="add__banner">
							    <a href="<?php echo esc_url($ads_link); ?>" target="_blank">
							        <img src="<?php echo esc_url($ads_header); ?>" alt="">
							    </a>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</setion><!-- #masthead -->
</header>

<header class="header-1 header-desktop d-none d-lg-block">	
	<?php $header_image = esc_url(get_header_image());
	$header_class = ($header_image == "") ? '' : 'header-image';
	?>
	<section class="main-header">
		<div class="head_one <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
			<div class="container">
				<div class="row align-items-center <?php echo esc_attr($logo_position); ?>">
					<div class="A col-sm-4 order-0 ">
						<?php if( $enable_social == 1 ){ ?>
							<div class="right-side">
								<div class="social-links">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_id'        => 'social-menu',
											'menu_class'     => 'markup-social-menu',
										) );
									?>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="B col-sm-4 order-2">
						<?php if( 1 == $search_header ){ ?>
								<div class="search-box d-flex justify-content-end">
									<?php echo get_search_form(); ?>		
							</div>
						<?php } ?>
					</div>
					<div class="C col-sm-4 order-1 text-center">
						<div class="logo">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							endif;
							$markup_description = get_bloginfo( 'description', 'display' );
							if ( $markup_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $markup_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-logo -->
					</div>
					
					<?php if(!empty($ads_header)): ?>
						<div class="D col-sm-12 order-3">
							<div class="add__banner">
							    <a href="<?php echo esc_url($ads_link); ?>" target="_blank">
							        <img src="<?php echo esc_url($ads_header); ?>" alt="">
							    </a>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="menu-area">
			<div class="container">					
				<nav id="site-navigation" class="site-navigation">
					<div class="main-menu menu-caret">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => 'ul',
							'menu_class'      => ''
						));
						?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</setion><!-- #masthead --> 
</header>

