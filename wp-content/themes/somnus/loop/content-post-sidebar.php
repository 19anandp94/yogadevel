<article id="post-<?php the_ID(); ?>" class="pt120 pt-xs-64 pb0">
	
	<div class="row mb48 mb-xs-24">
		<div class="col-sm-12 text-center">
			<?php the_title('<a href="'. get_permalink() .'"><h4 class="uppercase mb16">', '</h4></a><span class="fade-1-4">'. get_the_time(get_option('date_format')) .' </span>'); ?>
		</div>	
	</div><!--end of row-->
	
	<?php if( has_post_thumbnail() ) : ?>
		<div class="row mb48 mb-xs-24">
			<div class="col-sm-12">
				<?php the_post_thumbnail('full'); ?>
			</div>
		</div><!--end of row-->
	<?php endif; ?>

	<div class="row mb40 mb-xs-24">
		<div class="col-sm-10 col-sm-offset-1">
			<?php
				the_content();
				wp_link_pages();
			?>
		</div>
	</div><!--end of row-->

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 text-center">
			<a class="btn mb64 mb-xs-24" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','somnus'); ?></a>
			<hr class="mb0">
		</div>
	</div><!--end of row-->
		
</article>