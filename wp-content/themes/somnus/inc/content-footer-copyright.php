<?php $copyright = get_option('copyright', '<a href="http://www.tommusrhodus.com">Somnus Premium WordPress Theme by TommusRhodus</a>'); ?>

<?php if( $copyright ) : ?>
	<footer class="footer-2 bg-dark pt16 pb16 text-center">
		<div class="col-sm-8 col-sm-offset-2 text-center">
			<span class="fade-1-4">
				<?php echo wp_kses_post($copyright); ?>
			</span>
		</div>
	</footer>
<?php endif; ?>