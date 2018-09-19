<?php get_header(); ?>
<style type="text/css">
	.attatchment img{
	height: 300px !important;
}
</style>
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