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
    

<br>

<!--EMBED YOUTUBE VIDEO-->
 <div class="row">
        <div class="section-header text-center">
            <h2>
                HOW IT WORKS
            </h2>
        </div>
        <!-- 16:9 aspect ratio -->
        <div class="col-md-6 col-md-offset-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/LHLhaKn5gn8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>
<br>
<!--Dynamic cards for listing training classes information-->
<?php 
$args = array(
'orderby'          => 'date',
'order'            => 'ASC',
'posts_per_page'   => 3,
'category_name'  => 'yoga-trainings'
);

// The Query
$query2 = new WP_Query( $args );

if ( $query2->have_posts() ) {
    // The Loop
while ( $query2->have_posts() ) {
    $query2->the_post();
    ?>
    <!--Auto generated columnn-->
    <div class="col-lg-4">
        <!--Card-->
        <div class="card wow fadeIn" data-wow-delay="0.2s">

            <!--Card image-->
            <div class="view overlay hm-white-slight">
                <img src="<?php echo the_post_thumbnail_url('medium');?>" class="img-fluid" alt="">
                <a href="<?php echo get_permalink() ?>">
                    <div class="mask"></div>
                </a>
            </div>
            <!--/.Card image-->

            <!--Card content-->
            <div class="card-block">
                <!--Title-->
                <h4 class="card-title"><?php  echo get_the_title(); ?></h4>
                <!--Text-->
                <p class="card-text"><?php echo get_the_excerpt();?></p>
                <a href="<?php echo get_permalink() ?>" class="btn btn-outline-primary waves-effect">Read more</a>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->
    </div>
    <!--/.Auto generated columnn-->
    <?php
}
wp_reset_postdata();
} ?>
<!--/.Dynamic query listing posts from "cards" category-->
              

              
              
  </div>
 </main>
<?php
get_footer();
?>