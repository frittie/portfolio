<?php get_header();?>

<div class='single-project-wrapper'>
	<div class='single-project-content'>

		<?php
		if(have_posts()) {
			while(have_posts()) {
				the_post();
				?>
				<div class='single-project-text'>
					<h3> <?php the_title(); ?> </h3>
					<p><?php the_field('project_type'); ?></p>
					<?php the_content(); ?>
					<p><?php the_field('tools'); ?></p>
					
					<a href="javascript:history.go(-1)">
						<!-- Tillbakaknapp till frontpage -->
						<button class="back">
							<i class="fa fa-angle-double-left"></i>Tillbaka
						</button>
					</a>
					<?php if( get_field('project_link') ): ?>
						<a href="<?php the_field('project_link'); ?>" target="_blank"> 
						<button class="button2">Till hemsidan <i class="fa fa-angle-double-right"></i></button>
					</a>
					<?php endif; ?>
					
				</div>
				<div class='single-project-image'>
					<?php 
					$image = get_field('project_image');

					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
				<?php
		    }
		}
		?>
	</div>
</div>

<?php get_footer(); ?>