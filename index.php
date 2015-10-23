<?php get_header();?>

<!-- Div för hela bloggen -->
<div class="blog">

	<?php get_sidebar(); ?>

	<!-- Div för blogginlägg -->
	<div class="blogposts">
		<?php 
		if(have_posts()){
			while(have_posts()){
				the_post(); //för att inte fastna i en evighetsloop
				?>

				<!-- Div för ett enskilt blogginlägg -->
				<div class="post">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h3>

					<!-- Div för datum -->
					<div class="date">
						<h5><?php echo get_the_date(); ?> | </h5> 
						<h5>Written by: <?php the_author_posts_link(); ?> | Category:  
						<?php 
						$categories = get_the_category();
						$separator = ", ";
						$output = '';

						if($categories){
							foreach ($categories as $category) {
								$output	.= '<a href=" ' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
							}

							echo trim($output, $separator);
						}	

					?>
					</h5>
						<!--<h5><?php the_category(); ?></h5>-->
					</div>
					<!-- #Div för datum -->

					<!-- Div för texten i blogginlägget -->
					<div class="text">
						<?php the_content(); ?>
						<?php
						if(has_post_thumbnail()){
							the_post_thumbnail('blog-image');
						}
						?>
					</div>
					<!-- #Div för texten i blogginlägget -->
					<?php
					$comments_count = wp_count_comments();
					?> 

					<p> 
						<a href="<?php the_permalink(); ?>">
							<?php comments_number(__('0 Comments', 'fridasportfolio'), __('1 Comment', 'fridasportfolio'), __('% Comments', 'fridasportfolio')); ?> 
						</a>
					<hr />
				</div> 
				<!-- #Div för ett enskilt blogginlägg -->
				<?php
			}
		}
	?>
	</div>
	<!-- #Div för blogginlägg -->

</div> <!-- #Div för hela bloggen -->

<!-- Div för paginering -->
<div class="pagination clearfix">
	<div class="previous"><h4><?php next_posts_link( __('Older posts' , 'fridasportfolio')); ?></h4></div>
	<div class="next"><h4><?php previous_posts_link( __('Newer posts' , 'fridasportfolio')); ?></h4></div>
</div>
<!-- #Div för paginering -->

<?php get_footer(); ?>