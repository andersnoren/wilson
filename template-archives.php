<?php
/*
Template Name: Archive template
*/
?>

<?php get_header(); ?>

<div class="content">
		
	<div class="posts">
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="post">
			
				<div class="post-inner">
														
					<div class="post-header">
												
					    <h1 class="post-title"><?php the_title(); ?></h1>
					    				    
				    </div><!-- .post-header -->
				   				        			        		                
					<div class="post-content">
								                                        
						<?php the_content(); ?>
						
						<div class="archive-box">
												
                            <h3><?php _e( 'Last 30 Posts', 'wilson' ); ?></h3>

                            <ul>
                                <?php 
                                
                                $posts = get_posts( array(
                                    'post_status'       => 'publish',
                                    'posts_per_page'    => 30,
                                ) );

                                foreach( $posts as $post ) : ?>
                                
                                    <li>
                                        <a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php the_title_attribute( array( 'post' => $post->ID ) ); ?>">
                                            <?php echo get_the_title( $post->ID );?> 
                                            <span>(<?php the_time( get_option( 'date_format' ), $post->ID ); ?>)</span>
                                        </a>
                                    </li>
                                    
                                <?php endforeach; ?>

                            </ul>

                            <h3><?php _e( 'Archives by Categories', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_list_categories( 'title_li=' ); ?>
                            </ul>

                            <h3><?php _e( 'Archives by Tags', 'wilson' ); ?></h3>

                            <ul>

                                <?php
                                
                                $tags = get_tags();

                                if ( $tags ) {
                                    foreach ( $tags as $tag ) {
                                       echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( 'View all posts in %s', 'wilson' ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li>';
                                    }
                                } 
                                
                                ?>

                            </ul>

                            <h3><?php _e( 'Contributors', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_list_authors(); ?> 
                            </ul>

                            <h3><?php _e( 'Archives by Year', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_get_archives( 'type=yearly' ); ?>
                            </ul>

                            <h3><?php _e( 'Archives by Month', 'wilson' ); ?></h3>

                            <ul>
                                <?php wp_get_archives( 'type=monthly' ); ?>
                            </ul>

                            <h3><?php _e( 'Archives by Day', 'wilson' ) ?></h3>

                            <ul>
                                <?php wp_get_archives( 'type=daily' ); ?>
                            </ul>
		            
			            </div><!-- .archive-box -->
			            
			            <?php if ( current_user_can( 'manage_options' ) ) : ?>
																		
							<p><?php edit_post_link( __( 'Edit', 'wilson' ) ); ?></p>
						
						<?php endif; ?>
															            			                        
					</div><!-- .post-content -->
											
					<div class="clear"></div>
									
				</div><!-- .post-inner -->
	
			</div><!-- .post -->
			
			<?php if ( comments_open() ) : ?>
			
				<?php comments_template( '', true ); ?>
			
			<?php endif; ?>
		
		<?php endwhile; else: ?>

			<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "wilson" ); ?></p>
	
		<?php endif; ?>
	
	</div><!-- .posts -->
	
<?php get_footer(); ?>