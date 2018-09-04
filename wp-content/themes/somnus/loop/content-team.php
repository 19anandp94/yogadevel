<?php $email = get_post_meta($post->ID, '_ebor_the_email', 1); ?>

<div id="post-<?php the_ID(); ?>" class="col-sm-6 mb30" data-sr="enter bottom move 20px over .5s and scale 0% and wait 0s">

	<?php the_post_thumbnail('full'); ?>
	
	<div class="p32 pt32 bg-dark overflow-hidden">
	
		<?php the_title('<h4 class="uppercase mb8"><a href="'. get_permalink() .'">', '</a></h4>'); ?>
		
		<span class="inline-block mb80 mb-xs-80"><?php echo get_post_meta($post->ID, '_ebor_the_job_title', 1); ?></span>
		
		<?php if($email) : ?>
			<div class="mb32">
				<hr class="hidden-xs">
				<span><i class="ti-email">&nbsp;</i> <?php echo esc_html($email); ?></span>
			</div>
		<?php endif; ?>
		
	</div>	
					
</div>