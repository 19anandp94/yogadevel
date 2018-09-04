<?php $logo = get_option('custom_logo', EBOR_THEME_DIRECTORY . 'style/img/logo-dark.png'); ?>

<div class="nav-bar text-center">

	<div class="col-md-2 col-md-push-5 col-sm-12 text-center">
		<a href="<?php echo esc_url(home_url('/')); ?>">
			<img class="logo image-xxs" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" src="<?php echo esc_url($logo); ?>" />
		</a>
	</div>

	<div class="col-sm-12 col-md-5 col-md-pull-2">
		<?php
			if ( has_nav_menu( 'primary-right' ) ){
			    wp_nav_menu( 
			    	array(
				        'theme_location'    => 'primary-right',
				        'depth'             => 3,
				        'container'         => false,
				        'container_class'   => false,
				        'menu_class'        => 'menu pull-right'
			        )
			    );  
			} else {
				echo '<ul class="menu pull-right"><li><a href="'. admin_url('nav-menus.php') .'">Set up a navigation menu now</a></li></ul>';
			}
		?>
	</div>

	<div class="col-md-5 col-sm-12 pb-xs-24">
		<?php
			if ( has_nav_menu( 'primary' ) ){
			    wp_nav_menu( 
			    	array(
				        'theme_location'    => 'primary',
				        'depth'             => 3,
				        'container'         => false,
				        'container_class'   => false,
				        'menu_class'        => 'menu'
			        )
			    );  
			} else {
				echo '<ul class="menu"><li><a href="'. admin_url('nav-menus.php') .'">Set up a navigation menu now</a></li></ul>';
			}
		?>
	</div>
	
</div>

<div class="module widget-handle mobile-toggle right visible-sm visible-xs">
	<i class="ti-menu"></i>
</div>