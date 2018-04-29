<?php
/**
 * @package yoga
 */ 
?>
<div class="yoga-breadcrumb-section" style='background: url("<?php echo( has_header_image() ? get_header_image() : get_theme_support( 'custom-header', 'default-image' ) ); ?>") ;
    left: 0;
    right: 0;
    padding:15px;
    height:600px;
    background-size:100%;  '>
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
			    <div class="yoga-breadcrumb-title">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>