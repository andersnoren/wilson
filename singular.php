<?php 

get_header();

if ( have_posts() ) : 
	while ( have_posts() ) : 

		the_post(); 

		?>
	
		<div class="posts">
	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php if ( has_post_thumbnail() ) : ?>
				
					<figure class="featured-media">
						
						<?php 
			
						the_post_thumbnail();
						
						if ( $image_caption = get_the_post_thumbnail_caption() ) : ?>
							<figcaption class="media-caption"><?php echo $image_caption; ?></figcaption>
						<?php endif; ?>
								
					</figure><!-- .featured-media -->
						
				<?php endif; ?>
			
				<div class="post-inner">

					<div class="post-header">

						<?php if ( get_the_title() ) : ?>

							<?php if ( is_singular() ) : ?>
								<h1 class="post-title"><?php the_title(); ?></h1>
							<?php else : ?>
								<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<?php endif; ?>

						<?php endif; ?>

						<?php wilson_meta(); ?>

					</div><!-- .post-header -->

					<?php if ( get_the_content() ) : ?>

						<div class="post-content">

							<?php 
							the_content();
							wp_link_pages(); 
							?>

						</div><!-- .post-content -->

					<?php endif; ?>
				
				</div><!-- .post-inner -->

			</article><!-- .post -->

		</div><!-- .posts -->

		<?php if ( is_single() ) : ?>
								
			<div class="post-meta-bottom">

				<div class="post-cat-tags">

					<p class="post-categories"><span><?php _e( 'Categories:', 'wilson' ); ?></span> <?php the_category( ', ' ); ?></p>

					<?php the_tags( '<p class="post-tags">' . __( 'Tags:', 'wilson' ) . ' ', ', ', '</p>'); ?>

				</div><!-- .post-cat-tags -->

				<?php

				$prev_post = get_previous_post();
				$next_post = get_next_post();

				if ( $prev_post || $next_post ) : ?>

					<nav class="post-nav archive-nav">

						<?php if ( $prev_post ) : ?>
							<a class="post-nav-older" href="<?php echo get_permalink( $prev_post->ID ); ?>">
								<?php echo '&laquo; ' . get_the_title( $prev_post ); ?>
							</a>
						<?php endif; ?>

						<?php if ( $next_post ) : ?>
							<a class="post-nav-newer" href="<?php echo get_permalink( $next_post->ID ); ?>">
								<?php echo get_the_title( $next_post ) . ' &raquo;'; ?>
							</a>
						<?php endif; ?>

					</nav><!-- .post-nav -->

				<?php endif; ?>

			</div><!-- .post-meta-bottom -->

		<?php endif; ?>
	
	<?php 
	
	comments_template( '', true );
	
	endwhile; 
endif;

get_footer(); 
