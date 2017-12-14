<form method="get" class="searchform" action="<?php echo home_url(); ?>" id="searchform">
    <input type="search" value="" placeholder="<?php _e( 'Search form', 'wilson' ); ?>" name="s" id="s" /> 
    <a href="javascript:{}" onclick="document.getElementById( 'searchform' ).submit(); return false;" title="Search" class="searchsubmit"><?php _e( 'Submit', 'wilson' ); ?></a>
</form>