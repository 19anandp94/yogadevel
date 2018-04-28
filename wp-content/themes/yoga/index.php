<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package yoga
 */

get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'9' ); ?> col-md-9 col-sm-8">
          <?php 
    		  while(have_posts()){ the_post();
              get_template_part('content','');
    		  } ?>
          <div class="col-md-12 text-center">
      			<?php //Previous / next page navigation
      			the_posts_pagination( array(
      			'prev_text'          => __( '<i class="fa fa-arrow-left"></i>', 'yoga' ),
      			'next_text'          => __( '<i class="fa fa-arrow-right"></i>', 'yoga' ),
      			) ); ?>
          </div>
      </div>
	    <aside class="col-md-3 col-sm-4">
        <?php get_sidebar(); ?>
      </aside>
    </div>
	  
<?php get_header(); ?>

<br>
<!--Content-->
<div class="container">
    <div class="row">
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(120).jpg" class="img-fluid" alt="">
                    <a href="#">
                        <div class="mask"></div>
                    </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                    <!--Title-->
                    <h4 class="card-title">Mesmerizing Landscapes</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->
        </div>
        <!--First columnn-->

        <!--Second columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card wow fadeIn" data-wow-delay="0.4s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(123).jpg" class="img-fluid" alt="">
                    <a href="#">
                        <div class="mask"></div>
                    </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                    <!--Title-->
                    <h4 class="card-title">Trevelers Toolbox</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->
        </div>
        <!--Second columnn-->

        <!--Third columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card wow fadeIn" data-wow-delay="0.6s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(122).jpg" class="img-fluid" alt="">
                    <a href="#">
                        <div class="mask"></div>
                    </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                    <!--Title-->
                    <h4 class="card-title">Mountain Rivers</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->
        </div>
        <!--Third columnn-->
    </div>
</div>
<!--/.Content-->

              
              
  </div>
 </main>
<?php
get_footer();
?>