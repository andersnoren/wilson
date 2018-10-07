<?php 

if ( post_password_required() ) {
	return;
}  

if ( have_comments() ) : ?>

    <div class="comments">

        <h2 class="comments-title" id="comments">

            <?php 
            $comment_count = count( $wp_query->comments_by_type['comment'] );
            printf( _n( '%s Comment', '%s Comments', $comment_count, 'wilson' ), $comment_count ); ?>

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

                    <h3 class="pingbacks-title">
                    
                        <?php 
                        $pingback_count = count( $wp_query->comments_by_type['pings'] );
                        printf( _n( '%s Pingback', '%s Pingbacks', $pingback_count, 'wilson' ), $pingback_count ); ?>

                    </h3>

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

        <?php endif; ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

            <div class="comment-nav-below" role="navigation">

                <div class="post-nav-older"><?php previous_comments_link( __( '&laquo; Older<span> Comments</span>', 'wilson' ) ); ?></div>

                <div class="post-nav-newer"><?php next_comments_link( __( 'Newer<span> Comments</span> &raquo;', 'wilson' ) ); ?></div>

                <div class="clear"></div>

            </div><!-- .comment-nav-below -->

        <?php endif; ?>

    </div><!-- .comments -->

<?php endif;

if ( ! comments_open() && ! is_page() ) : ?>

    <p class="nocomments"><?php _e( 'Comments are closed.', 'wilson' ); ?></p>

<?php endif;

comment_form();

?>