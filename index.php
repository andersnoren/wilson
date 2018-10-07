<?php get_header(); ?>

<div class="content">
																	                    
	<?php if ( have_posts() ) : 
		
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		
		if ( 1 < $paged ) : ?>
		
			<div class="page-title">
			
				<h4><?php printf( __( 'Page %1$s of %2$s', 'wilson' ), $paged, $wp_query->max_num_pages ); ?></h4>
				
			</div>
						
		<?php endif; ?>
	
		<div class="posts">
				
	    	<?php while ( have_posts() ) : the_post(); ?>
	    	
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    	
		    		<?php get_template_part( 'content', get_post_format() ); ?>
		    				    		
	    		</div><!-- .post -->
	    			        		            
	        <?php endwhile; ?>
        	                    
		<?php endif; ?>
		
	</div><!-- .posts -->
	
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	
		<div class="archive-nav">
					
			<?php echo get_next_posts_link( __( '&laquo; Older<span> posts</span>', 'wilson' ) ); ?>
						
			<?php echo get_previous_posts_link( __( 'Newer<span> posts</span> &raquo;', 'wilson' ) ); ?>
			
			<div class="clear"></div>
			
		</div><!-- .archive-nav -->
	
	<?php endif; ?>
			              	        
	<?php get_footer(); ?>