<?php
/**
 * The template for displaying the content.
 * @package yoga
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="yoga-blog-post-box"> 
		<?php
		$post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'img-responsive' );
		if ( !empty( $post_thumbnail_url ) ) {
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="yoga-blog-thumb">
					<?php echo esc_url($post_thumbnail_url); ?>
			<span class="yoga-blog-date"><?php echo get_the_date('M'); ?> <?php echo get_the_date('j,'); ?> <?php echo get_the_date('Y'); ?></span>
        </a>
		<?php
		}
		?>
		<article class="small"> 
			<h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_title(); ?> </a> </h1>

			<div class="yoga-blog-category">
			<a class="au-icon" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_attr_e('by','yoga'); ?>
				<?php the_author(); ?>
				</a>
				
				<?php   $cat_list = get_the_category_list();
				if(!empty($cat_list)) { ?>
				<?php the_category(', '); ?>
				<?php } ?>
				
			</div>
			
			<?php
				the_content(__('Read More','yoga'));
			?>
			
				<?php wp_link_pages( array( 'before' => '<div class="link">' . __( 'Pages:', 'yoga' ), 'after' => '</div>' ) ); ?>
		</article>
	</div>
</div>