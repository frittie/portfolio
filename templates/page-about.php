<?php
/*
Template Name: Om mig
*/
?>
<?php get_header();?>


	<div class="about">
		<div class="info_about">
			<p>
				<?php
					if (have_posts()) {
						while(have_posts()){
						the_post();
						the_content(); 
						}
					}						
				?>
			</p>
		</div>
	</div>
	<div class="img_about">
		
	</div>
	</div>

<?php get_footer(); ?>




