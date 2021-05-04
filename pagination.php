<?php

$next_posts_link = get_next_posts_link( __( '&laquo; Older<span> posts</span>', 'wilson' ) );
$prev_posts_link = get_previous_posts_link( __( 'Newer<span> posts</span> &raquo;', 'wilson' ) );

if ( ! ( $next_posts_link || $prev_posts_link ) ) return;

?>

<nav class="archive-nav">
	<?php if ( $next_posts_link ) echo $next_posts_link; ?>
	<?php if ( $prev_posts_link ) echo $prev_posts_link; ?>
</nav><!-- .archive-nav -->