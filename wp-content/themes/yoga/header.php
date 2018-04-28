<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package yoga
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="wrapper">
  <header class="yoga-standardhead">
  <!--==================== TOP BAR ====================-->
   <?php 
$yoga_topbar_enable = get_theme_mod('yoga_topbar_enable','true');
if($yoga_topbar_enable !='false')
{ ?>
   <div class="yoga-head-detail hidden-xs hidden-sm">
    <div class="container">  
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
          <ul class="info-left">
            <?php 
              $yoga_head_info_one = get_theme_mod('yoga_head_info_one');
              $yoga_head_info_two = get_theme_mod('yoga_head_info_two');
            ?>
            <li><?php echo esc_html($yoga_head_info_one); ?></li>
            <li><?php echo esc_html($yoga_head_info_two); ?></li>
          </ul>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
          <ul class="info-right">
          <li> <?php if( class_exists('woocommerce')) { ?><a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart','yoga' ); ?>" class="yoga-cart"> <i class="fa fa-shopping-bag"></i><span class="yoga-cart-count"> <span class="yoga-cart-item"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'yoga' ), WC()->cart->get_cart_contents_count() ) ); ?> </span>  </span></a> <?php } ?> </li>
        </ul>
        <?php if ( has_nav_menu( 'social' ) ) : ?>
          <nav class="yoga-social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'yoga' ); ?>">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'social',
                'menu_class'     => 'social-links-menu info-right',
                'depth'          => 1,
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>' . yoga_include_svg_icons( array( 'icon' => 'chain' ) ),
              ) );
            ?>
          </nav><!-- .social-navigation -->
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <?php } ?>
  <div class="yoga-main-nav">
    <nav class="navbar navbar-default navbar-wp">
      <div class="container"> 
        <!-- Start Navbar Header -->
        <div class="navbar-header col-md-3"> 
          <?php if(has_custom_logo()) {
        // Display the Custom Logo
        the_custom_logo();
        } else { ?>
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
            <span> <?php bloginfo('name'); ?> </span> <br>
            <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
              <span class="site-description"><?php echo $description; ?></span> 
            <?php endif;?></a><?php }?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php esc_attr_e('Toggle Navigation','yoga');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <!-- /End Navbar Header --> 
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbar-wp">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'yoga_custom_navwalker::fallback' , 'walker' => new yoga_custom_navwalker() ) ); ?>
        </div>
        <!-- /Navigation --> 
      </div>
    </nav>
  </div>
</header>