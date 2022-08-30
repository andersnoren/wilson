		<footer class="footer section large-padding bg-dark clear" id="site-footer">

			<?php if ( is_active_sidebar( 'footer-a' ) || is_active_sidebar( 'footer-b' ) ) : ?>

				<div class="footer-widgets group">
			
					<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
						<div class="column column-1 left">
							<?php dynamic_sidebar( 'footer-a' ); ?>
						</div><!-- .column-1 -->
					<?php endif;?>
						
					<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
						<div class="column column-2 left">
							<?php dynamic_sidebar( 'footer-b' ); ?>
						</div><!-- .column-2 -->
					<?php endif; ?>

				</div><!-- .footer-widgets -->

			<?php endif; ?>

			<div class="credits">
				
				<p class="credits-left">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
				
				<p class="credits-right"><span><?php printf( __( 'Theme by %s', 'wilson'), '<a href="https://andersnoren.se">Anders Nor&eacute;n</a>' ); ?></span> &mdash; <a class="tothetop" href="#site-header"><?php _e( 'Up', 'wilson' ); ?> &uarr;</a></p>
				
			</div><!-- .credits -->
		
		</footer><!-- #site-footer -->
		
	</main><!-- #site-content -->
	
</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>