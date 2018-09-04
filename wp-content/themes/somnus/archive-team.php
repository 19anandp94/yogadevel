<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php get_template_part('loop/loop', 'team'); ?>
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
</section>

<?php get_footer();