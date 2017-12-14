<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() ) : ?>

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

$comments_args = array(

    'comment_notes_before' => 
        '<p class="comment-notes">' . __( 'Your email address will not be published.', 'wilson' ) . '</p>',

    'comment_field' => 
        '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="6" required>' . '</textarea></p>',

    'fields' => apply_filters( 'comment_form_default_fields', array(

        'author' =>
            '<p class="comment-form-author">' .
            '<input id="author" name="author" type="text" placeholder="' . __( 'Name', 'wilson' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />' . '<label for="author">' . __( 'Author', 'wilson' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',

        'email' =>
            '<p class="comment-form-email">' . '<input id="email" name="email" type="text" placeholder="' . __( 'Email', 'wilson' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /><label for="email">' . __( 'Email', 'wilson' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',

        'url' =>
        '<p class="comment-form-url">' . '<input id="url" name="url" type="text" placeholder="' . __( 'Website', 'wilson' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">' . __( 'Website', 'wilson' ) . '</label></p>')
    ),
);

comment_form( $comments_args );

?>