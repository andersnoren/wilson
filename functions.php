<?php


/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_setup' ) ) :
	function wilson_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );
		
		// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 
		set_post_thumbnail_size( 788, 9999 );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'video', 'aside', 'quote' ) );

		// HTML5 semantic markup.
		add_theme_support( 'html5', array( 'search-form' ) );
		
		// Title tag function
		add_theme_support( 'title-tag' );

		// Add nav menu
		register_nav_menu( 'primary', __( 'Primary Menu', 'wilson' ) );

		// Set content width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 788;
		
	}
	add_action( 'after_setup_theme', 'wilson_setup' );
endif;


/*	-----------------------------------------------------------------------------------------------
	REQUIRED FILES
	Include required files
--------------------------------------------------------------------------------------------------- */

// Include the Customizer class.
require get_template_directory() . '/inc/classes/class-wilson-customize.php';


/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_load_javascript_files' ) ) :
	function wilson_load_javascript_files() {

		$theme_version = wp_get_theme( 'wilson' )->get( 'Version' );

		wp_enqueue_script( 'wilson_global', get_template_directory_uri() . '/assets/js/global.js', array( 'jquery' ), $theme_version );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'wilson_load_javascript_files' );
endif;


/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_load_style' ) ) :
	function wilson_load_style() {

		$theme_version 	= wp_get_theme( 'wilson' )->get( 'Version' );
		$dependencies 	= array();

		wp_register_style( 'wilson_fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
		$dependencies[] = 'wilson_fonts';

		wp_enqueue_style( 'wilson_style', get_stylesheet_uri(), $dependencies, $theme_version, 'all' );

	}
	add_action( 'wp_enqueue_scripts', 'wilson_load_style' );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD EDITOR STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'wilson_add_editor_styles' ) ) :
	function wilson_add_editor_styles() {

		add_editor_style( array( 'assets/css/classic-editor-styles.css', 'assets/css/fonts.css' ) );
		
	}
	add_action( 'init', 'wilson_add_editor_styles' );
endif;


/* ---------------------------------------------------------------------------------------------
   REGISTER SIDEBARS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_sidebar_registration' ) ) :
	function wilson_sidebar_registration() {

		$shared_args = array(
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>'
		);

		register_sidebar( array_merge( $shared_args, array(
			'name'            => __( 'Sidebar', 'wilson' ),
			'id'              => 'sidebar',
			'description'     => __( 'Widgets in this area will be displayed in the sidebar.', 'wilson' ),
		) ) );
		
		register_sidebar( array_merge( $shared_args, array(
			'name'            => __( 'Footer A', 'wilson' ),
			'id'              => 'footer-a',
			'description'     => __( 'Widgets in this area will be displayed in the left column in the footer.', 'wilson' ),
		) ) );	
		
		register_sidebar( array_merge( $shared_args, array(
			'name'            => __( 'Footer B', 'wilson' ),
			'id'              => 'footer-b',
			'description'     => __( 'Widgets in this area will be displayed in the right column in the footer.', 'wilson' ),
		) ) );

	}
	add_action( 'widgets_init', 'wilson_sidebar_registration' );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD CLASSES TO PAGINATION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_next_posts_link_attributes' ) ) : 
	function wilson_next_posts_link_attributes() {

		return 'class="post-nav-older"';

	}
	add_filter( 'next_posts_link_attributes', 'wilson_next_posts_link_attributes' );
endif;

if ( ! function_exists( 'wilson_previous_posts_link_attributes' ) ) : 
	function wilson_previous_posts_link_attributes() {

		return 'class="post-nav-newer"';

	}
	add_filter( 'previous_posts_link_attributes', 'wilson_previous_posts_link_attributes' );
endif;


/* ---------------------------------------------------------------------------------------------
   BODY AND POST CLASSES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_the_content' ) ) :
	function wilson_the_content( $content ) {

		// On the archives template, append the content for that template.
		if ( is_page_template( 'template-archives.php' ) ) {
			ob_start();
			include( locate_template( 'inc/template-archives-content.php' ) );
			$content .= ob_get_clean();
		}
		
		return $content;

	}	
	add_filter( 'the_content', 'wilson_the_content' );
endif;


/* ---------------------------------------------------------------------------------------------
   CUSTOM MORE LINK TEXT
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_custom_more_link' ) ) :
	function wilson_custom_more_link( $more_link, $more_link_text ) {

		return str_replace( $more_link_text, __( 'Continue reading', 'wilson' ), $more_link );

	}
	add_filter( 'the_content_more_link', 'wilson_custom_more_link', 10, 2 );
endif;


/* ---------------------------------------------------------------------------------------------
   POST META FUNCTION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_meta' ) ) :
	function wilson_meta() {

		if ( is_page() ) return;

		?>
		
		<div class="post-meta">
		
			<span class="post-date"><a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
			
			<span class="date-sep"> / </span>
				
			<span class="post-author"><?php the_author_posts_link(); ?></span>
			
			<?php if ( comments_open() ) : ?>
			
				<span class="date-sep"> / </span>
				
				<?php comments_popup_link( '<span class="comment">' . __( '0 Comments', 'wilson' ) . '</span>', __( '1 Comment', 'wilson' ), __( '% Comments', 'wilson' ) ); ?>
			
			<?php endif; ?>
			
			<?php if ( is_sticky() && ! has_post_thumbnail() ) : ?> 
			
				<span class="date-sep"> / </span>
			
				<?php _e( 'Sticky', 'wilson' ); ?>
			
			<?php endif; ?>
			
			<?php if ( current_user_can( 'manage_options' ) ) : ?>
			
				<span class="date-sep"> / </span>
							
				<?php edit_post_link( __( 'Edit', 'wilson' ) ); ?>
			
			<?php endif; ?>
									
		</div><!-- .post-meta -->

		<?php

	}
endif;


/* ---------------------------------------------------------------------------------------------
   WILSON COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_comment' ) ) :
    function wilson_comment( $comment, $args, $depth ) {
        
        switch ( $comment->comment_type ) :
        
            case 'pingback' :
            case 'trackback' : 
				?>

                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <?php _e( 'Pingback:', 'wilson' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'wilson' ), '<span class="edit-link">(', ')</span>' ); ?>
                </li>
                
                <?php 
				break;
                
            default : 
				
				global $post;
				
				?>
                
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

                    <div id="comment-<?php comment_ID(); ?>" class="comment">

                        <div class="comment-meta comment-author vcard">

                            <?php echo get_avatar( $comment, 120 ); ?>

                            <div class="comment-meta-content">

                                <?php printf( '<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    ( $comment->user_id === $post->post_author ? '<span class="post-author">' . __( '(Post author)', 'wilson' ) . '</span>' : '' )
                                ); ?>

                                <p><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'wilson' ), get_comment_date(), get_comment_time() ); ?></a></p>

                            </div><!-- .comment-meta-content -->

                        </div><!-- .comment-meta -->

                        <div class="comment-content post-content">

                            <?php if ( $comment->comment_approved == '0' ) : ?>

                                <p class="comment-awaiting-moderation"><?php _e( 'Awaiting moderation', 'wilson' ); ?></p>

                            <?php endif; ?>

                            <?php comment_text(); ?>

                            <div class="comment-actions">

								<?php
								
								edit_comment_link( __( 'Edit', 'wilson' ), '', '' );

								comment_reply_link( array_merge( $args, array( 
									'depth'      => $depth, 
									'max_depth'  => $args['max_depth'],
									'reply_text' => __( 'Reply', 'wilson' )
								) ) ); 

                                ?>

                                <div class="clear"></div>

                            </div><!-- .comment-actions -->

                        </div><!-- .comment-content -->

                    </div><!-- #comment-## -->

                </li>
                
                <?php 
				break;

        endswitch;

    }
endif;


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE TITLE

	@param	$title string		The initial title
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_filter_archive_title' ) ) :
	function wilson_filter_archive_title( $title ) {

		$paged 			= get_query_var( 'paged', 1 );
		$max_num_pages 	= get_query_var( 'max_num_pages' );

		// On home, show no title
		if ( is_home() && $paged <= 1 ) {
			$title = '';

		// On paged home, show the page count
		} else if ( is_home() && $paged > 1 ) {
			global $wp_query;
			$title = sprintf( __( 'Page %1$s of %2$s', 'wilson' ), $paged, $wp_query->max_num_pages );
		}

		// On search, show the search query.
		elseif ( is_search() ) {
			$title = sprintf( _x( 'Search: %s', '%s = The search query', 'wilson' ), '&ldquo;' . get_search_query() . '&rdquo;' );
		}

		return $title;

	}
	add_filter( 'get_the_archive_title', 'wilson_filter_archive_title' );
endif;


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE DESCRIPTION

	@param	$description string		The initial description
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_filter_archive_description' ) ) :
	function wilson_filter_archive_description( $description ) {
		
		// On search, show a string describing the results of the search.
		if ( is_search() ) {
			global $wp_query;
			if ( $wp_query->found_posts ) {
				/* Translators: %s = Number of results */
				$description = sprintf( _nx( 'We found %s result for your search.', 'We found %s results for your search.',  $wp_query->found_posts, '%s = Number of results', 'wilson' ), $wp_query->found_posts );
			} else {
				$description = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'wilson' );
			}
		}

		return $description;

	}
	add_filter( 'get_the_archive_description', 'wilson_filter_archive_description' );
endif;


/* ---------------------------------------------------------------------------------------------
   SPECIFY BLOCK EDITOR SUPPORT
------------------------------------------------------------------------------------------------ */

if ( ! function_exists( 'wilson_add_gutenberg_features' ) ) :
	function wilson_add_gutenberg_features() {

		/* Block Editor Features ------------- */

		add_theme_support( 'align-wide' );

		/* Block Editor Palette -------------- */

		$accent_color = get_theme_mod( 'accent_color', '#FF706C' );

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Accent', 'Name of the accent color in the Gutenberg palette', 'wilson' ),
				'slug' 	=> 'accent',
				'color' => $accent_color,
			),
			array(
				'name' 	=> _x( 'Black', 'Name of the black color in the Gutenberg palette', 'wilson' ),
				'slug' 	=> 'black',
				'color' => '#272F38',
			),
			array(
				'name' 	=> _x( 'Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'wilson' ),
				'slug' 	=> 'dark-gray',
				'color' => '#444',
			),
			array(
				'name' 	=> _x( 'Medium Gray', 'Name of the medium gray color in the Gutenberg palette', 'wilson' ),
				'slug' 	=> 'medium-gray',
				'color' => '#666',
			),
			array(
				'name' 	=> _x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'wilson' ),
				'slug' 	=> 'light-gray',
				'color' => '#888',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'wilson' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

		/* Block Editor Font Sizes ----------- */

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'wilson' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'wilson' ),
				'size' 		=> 16,
				'slug' 		=> 'small',
			),
			array(
				'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'wilson' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the Gutenberg editor.', 'wilson' ),
				'size' 		=> 18,
				'slug' 		=> 'regular',
			),
			array(
				'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'wilson' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'wilson' ),
				'size' 		=> 24,
				'slug' 		=> 'large',
			),
			array(
				'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'wilson' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'wilson' ),
				'size' 		=> 32,
				'slug' 		=> 'larger',
			),
		) );

	}
	add_action( 'after_setup_theme', 'wilson_add_gutenberg_features' );
endif;


/* ---------------------------------------------------------------------------------------------
   BLOCK EDITOR STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'wilson_block_editor_styles' ) ) :
	function wilson_block_editor_styles() {

		$theme_version 	= wp_get_theme( 'wilson' )->get( 'Version' );

		wp_register_style( 'wilson-block-editor-styles-font', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
		wp_enqueue_style( 'wilson-block-editor-styles', get_theme_file_uri( '/assets/css/block-editor-styles.css' ), array( 'wilson-block-editor-styles-font' ), $theme_version, 'all' );

	}
	add_action( 'enqueue_block_editor_assets', 'wilson_block_editor_styles', 1 );
endif;
