<?php 

$post_format = get_post_format() ? get_post_format() : 'default';

if ( $post_format == 'default' && has_post_thumbnail() ) : ?>

	<figure class="featured-media">
	
		<?php if ( is_sticky() ) : ?><span class="sticky-post"><?php _e( 'Sticky post', 'wilson' ); ?></span><?php endif; ?>
				
		<a href="<?php the_permalink(); ?>">
		
			<?php 

			the_post_thumbnail();
			
			if ( $image_caption = get_the_post_thumbnail_caption() ) : ?>
				<figcaption class="media-caption"><?php echo $image_caption; ?></figcaption>
			<?php endif; ?>
			
		</a>
				
	</figure><!-- .featured-media -->
		
<?php endif; ?>

<div class="post-inner">

	<?php if ( in_array( $post_format, array( 'aside', 'quote' ) ) ) : ?>

		<div class="post-meta light">
		
			<span class="post-date"><a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
			
			<?php if ( is_sticky() ) : ?> 
				
				<span class="date-sep"> / </span>
			
				<?php _e( 'Sticky', 'wilson' ); ?>
			
			<?php endif; ?>
		
		</div><!-- .post-meta -->

	<?php else : ?>

		<header class="post-header">
			
			<h2 class="post-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			
			<?php wilson_meta(); ?>
			
		</header><!-- .post-header -->

	<?php endif; ?>

	<?php if ( get_the_content() ) : ?>
	
		<div class="post-content">
		
			<?php 
			the_content(); 
			wp_link_pages();
			?>

		</div><!-- .post-content -->

	<?php endif; ?>

</div><!-- .post-inner -->