		<div class="footer section large-padding bg-dark">
		
			<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
			
				<div class="column column-1 left">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-a' ); ?>
											
					</div><!-- .widgets -->
					
				</div><!-- .column-1 -->
				
			<?php endif;?>
				
			<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
			
				<div class="column column-2 left">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-b' ); ?>
											
					</div><!-- .widgets -->
					
				</div><!-- .column-2 -->
				
			<?php endif; ?>
			
			<div class="clear"></div>
		
		</div><!-- .footer -->
		
		<div class="credits">
		
			<div class="credits-inner">
			
				<p class="credits-left">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></p>
				
				<p class="credits-right"><span><?php printf( __( 'Theme by %s', 'wilson'), '<a href="http://www.andersnoren.se">Anders Nor&eacute;n</a>' ); ?></span> &mdash; <a title="<?php _e( 'To the top', 'wilson' ); ?>" class="tothetop"><?php _e( 'Up', 'wilson' ); ?> &uarr;</a></p>
				
				<div class="clear"></div>
			
			</div><!-- .credits-inner -->
			
		</div><!-- .credits -->
	
	</div><!-- .content -->
	
	<div class="clear"></div>
	
</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>