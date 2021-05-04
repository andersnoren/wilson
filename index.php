<?php 

get_header();

if ( have_posts() ) : 
	
	$archive_title 			= get_the_archive_title();
	$archive_description 	= get_the_archive_description();
	
	if ( $archive_title || $archive_description ) : ?>
	
		<header class="archive-header">
		
			<?php if ( $archive_title ) : ?>
				<h1 class="archive-title"><?php echo $archive_title; ?></h1>
			<?php endif; ?>

			<?php if ( $archive_description ) : ?>
				<div class="archive-description contain-margins"><?php echo wpautop( $archive_description ); ?></div>
			<?php endif; ?>
			
		</header><!-- .archive-header -->
					
	<?php endif; ?>

	<div class="posts">
			
		<?php while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				<?php get_template_part( 'content', get_post_format() ); ?>
									
			</article><!-- .post -->
											
		<?php endwhile; ?>
	
	</div><!-- .posts -->

	<?php 
endif;

get_template_part( 'pagination' );

get_footer();

?>