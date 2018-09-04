<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
				<h1 class="fade-1-4 uppercase"><?php esc_html_e('Whoops, 404!', 'somnus'); ?></h1>
				<a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go Back Home', 'somnus'); ?></a>
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
</section>

<?php get_footer();