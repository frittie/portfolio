<?php
/*
Template Name: Projekt
*/
?>
<?php get_header();?>

<div class="content_project">
	<?php
	$query = new WP_Query( array('post_type' => 'project', 'posts_per_page' => -1 ) );
		if($query->have_posts()) {
			while ($query->have_posts() ) {
			 	$query->the_post();
				?>
				<div class="project"><a href="<?php the_permalink(); ?>">
			 		<h3><?php the_title(); ?> </h3>
				<?php
				if(has_post_thumbnail()) {
					echo the_post_thumbnail('');
				}

				?>
	        	</div></a>
	       		<?php  
	    	}
	        wp_reset_postdata();
	                  
		}
	?>
</div>

<?php get_footer();?>




