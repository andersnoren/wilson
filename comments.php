<?php 

if ( post_password_required() ) {
	return;
}  

if ( have_comments() ) : ?>

    <div class="comments">

        <h2 class="comments-title" id="comments">
            <?php 
			$comment_count = count( $wp_query->comments_by_type['comment'] );
			printf( _n( '%s Comment', '%s Comments', $comment_count, 'wilson' ), $comment_count );
			?>
        </h2>

        <ol class="commentlist">
            <?php 
            wp_list_comments( array( 
                'callback'  => 'wilson_comment',
                'type'      => 'comment'
            ) ); 
            ?>
        </ol><!-- .commentlist -->

        <?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>

            <div class="pingbacks">

                <div class="pingbacks-inner">

                    <h2 class="pingbacks-title">
                        <?php
						$pingback_count = count( $wp_query->comments_by_type['pings'] );
                        printf( _n( '%s Pingback', '%s Pingbacks', $pingback_count, 'wilson' ), $pingback_count ); ?>
                    </h2>

                    <ol class="pingbacklist">
                        <?php 
                        wp_list_comments( array(  
                            'callback'  => 'wilson_comment',
                            'type'      => 'pings'
                        ) ); 
                        ?>
                    </ol><!-- .pingbacklist -->

                </div><!-- .pingbacks-inner -->

            </div><!-- .pingbacks -->

        	<?php 
		endif;

		$previous_comments_link = get_previous_comments_link( __( '&laquo; Older<span> Comments</span>', 'wilson' ) );
		$next_comments_link 	= get_next_comments_link( __( 'Newer<span> Comments</span> &raquo;', 'wilson' ) );
		
		if ( $previous_comments_link || $next_comments_link ) : ?>

            <nav class="comment-nav-below" role="navigation">
                <?php echo $previous_comments_link; ?>
				<?php echo $next_comments_link; ?>
            </nav><!-- .comment-nav-below -->

        	<?php 
		endif;
		?>

    </div><!-- .comments -->

	<?php 
endif;

if ( comments_open() || pings_open() ) {
	comment_form( array(
		'title_reply_before'	=> '<h2 id="reply-title" class="comment-reply-title h3">',
		'title_reply_after'		=> '</h2>'
	) );
}
