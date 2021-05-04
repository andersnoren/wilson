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
				<a href="<?php echo get_permalink( $post->ID ); ?>">
					<?php echo get_the_title( $post->ID );?> 
					<span>(<?php echo get_the_time( get_option( 'date_format' ), $post->ID ); ?>)</span>
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
				echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" ' . '>' . $tag->name . '</a></li>';
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