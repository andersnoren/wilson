<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>
	
	<body <?php body_class(); ?>>

		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open(); 
		}
		?>

		<a class="skip-link button" href="#site-content"><?php esc_html_e( 'Skip to the content', 'wilson' ); ?></a>
	
		<div class="wrapper">
	
			<header class="sidebar" id="site-header">
							
				<div class="blog-header">

					<?php 

					$custom_logo_id 	= get_theme_mod( 'custom_logo' );
					$legacy_logo_url 	= get_theme_mod( 'wilson_logo' );

					$blog_title 		= get_bloginfo( 'title' );
					$blog_description 	= get_bloginfo( 'description' );

					$blog_title_elem 	= ( ( is_front_page() || is_home() ) && ! is_page() ) ? 'h1' : 'div';
					
					if ( $custom_logo_id || $legacy_logo_url ) : 

						$custom_logo_url = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : $legacy_logo_url;
					
						?>
					
						<<?php echo $blog_title_elem; ?> class="blog-logo">
						
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" rel="home">
								<img src="<?php echo esc_url( $custom_logo_url ); ?>">
								<?php if ( $blog_title ) : ?>
									<span class="screen-reader-text"><?php echo $blog_title; ?></span>
								<?php endif; ?>
							</a>
							
						</<?php echo $blog_title_elem; ?>><!-- .blog-logo -->
				
					<?php elseif ( $blog_title || $blog_description ) : ?>
				
						<div class="blog-info">
						
							<?php if ( $blog_title ) : ?>
								<<?php echo $blog_title_elem; ?> class="blog-title">
									<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo $blog_title; ?></a>
								</<?php echo $blog_title_elem; ?>>
							<?php endif; ?>
							
							<?php if ( $blog_description ) : ?>
								<p class="blog-description"><?php echo $blog_description; ?></p>
							<?php endif; ?>
						
						</div><!-- .blog-info -->
						
					<?php endif; ?>

				</div><!-- .blog-header -->
				
				<div class="nav-toggle toggle">
				
					<p>
						<span class="show"><?php _e( 'Show menu', 'wilson' ); ?></span>
						<span class="hide"><?php _e( 'Hide menu', 'wilson' ); ?></span>
					</p>
				
					<div class="bars">
							
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						
						<div class="clear"></div>
						
					</div><!-- .bars -->
				
				</div><!-- .nav-toggle -->
				
				<div class="blog-menu">
			
					<ul class="navigation">
					
						<?php 
						
						if ( has_nav_menu( 'primary' ) ) {

							$menu_args = array( 
								'container'      => '',
								'items_wrap'     => '%3$s',
								'theme_location' => 'primary', 
							);

							wp_nav_menu( $menu_args ); 
                            
                        } else {

							$list_pages_args = array(
								'container' => '',
								'title_li'  => ''
							);

							wp_list_pages( $list_pages_args );
							
						}

						?>
												
					</ul><!-- .navigation -->
				</div><!-- .blog-menu -->
				
				<div class="mobile-menu">
						 
					<ul class="navigation">
					
						<?php
						if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( $menu_args ); 
                        } else {
                            wp_list_pages( $list_pages_args );
						}
						?>
						
					</ul>
					 
				</div><!-- .mobile-menu -->
				
				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

					<div class="widgets" role="complementary">
					
						<?php dynamic_sidebar( 'sidebar' ); ?>
						
					</div><!-- .widgets -->
					
				<?php endif; ?>
									
			</header><!-- .sidebar -->

			<main class="content" id="site-content">