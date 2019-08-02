<?php
/**
 * @package Custom Theme
 */
?>

<article class="single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-wrapper">

		<h1 class="entry-title" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/custom-hr.svg')"> <?php the_title(); ?></h1>

		<div class="entry-content">

			<div class="img-block">
				<div class="single-post-featured-image img-wrapper grid-item <?php the_field('activate_extended_height_for_image');?>" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')"></div>
			</div>
			<div class="entry-text">
				<?php the_content(); ?>
			</div>
		</div><!-- .entry-content -->
	</div>
	
</article><!-- #post-## -->

<script>
jQuery(document).ready(function($){
    


$('#gnTrigger').on( 'click', function() {
    console.log("trigger clicked")
    $('nav.gn-menu-wrapper').addClass('gn-open-all')
});
 


});


</script>