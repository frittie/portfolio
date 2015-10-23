<?php get_header();?>
<header>
	<h1>Frida Svensson</h1>
	<h2>Front-end developer</h2>
	<i class="fa fa-chevron-down"></i>
	<div class="circle"></div>
</header>

<div class="wrapper" id="wrapper">
	<section class="about" id="about">
		<div class="content">
			<?php
			$pages = get_posts(array(
				'post_type' => 'page',
				'meta_key' => '_wp_page_template',
				'meta_value' => 'templates/page-about.php'
				));
			foreach($pages as $page) {
			?>
			
			<h2><?php echo  apply_filters( 'the_title', $page->post_title ); ?></h2>

			<?php echo apply_filters( 'the_content', $page->post_content ); ?>

			<?php
			echo get_the_post_thumbnail($page->ID);	
			}
			?>
		</div>
	</section>

	<section class="what-i-do" id="work">
		<div class="content">
			<h2>Vad jag gör</h2>
			<div class="skills">
				<?php 
				$posts = new WP_Query(array(
				'post_type' => 'skills',
				'post_per_page' => -1
				));

				if($posts->have_posts()){
					while($posts->have_posts()){
						$posts->the_post();
						?>
						<div class="skills-info">
							<i class="fa fa-<?php the_field('icon'); ?>"></i>
							<h3><?php echo the_title(); ?></h3>
							<?php echo the_content(); ?>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</section>

	<section class="projects" id="projects">
		<div class="content">
			<h2>Projekt</h2>
			<p>Här kan ni ta del av några av mina tidigare projekt.</p>
			<div class="projects-container">
				<?php 
				$posts = new WP_Query(array(
				'post_type' => 'project',
				'post_per_page' => -1
				));

				if($posts->have_posts()){
					while($posts->have_posts()){
				?>
				<ul>
					<li class="project-image">
					<?php 
					$posts->the_post();
					?>
						<a href="<?php the_permalink(); ?>">
							<div class="project-description">
								<h4><?php the_title(); ?></h4>
								<?php the_excerpt(); ?>
								<button>Visa <i class="fa fa-angle-double-right"></i></button>
							</div>
							<?php
							if(has_post_thumbnail()) {
								echo the_post_thumbnail();
							}
							?>

						</a>
					</li>
				<?php
					}
				}
				?>
				</ul>			
			</div>
		</div>
	</section>

	<section class="contact" id="contact">
		<div class="content">
			<?php
			$pages = get_posts(array(
				'post_type' => 'page',
				'meta_key' => '_wp_page_template',
				'meta_value' => 'templates/page-contact.php'
				));
			foreach($pages as $page) {
			?>
			
			<h2><?php echo  apply_filters( 'the_title', $page->post_title ); ?></h2>

			<p><?php echo apply_filters( 'the_content', $page->post_content ); ?></p>
		
			<?php
			}
			?>

			<div class="social-media">
				<a href="mailto:frida.svensson@telia.com">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
					</span>
				</a>

				<a href="https://www.linkedin.com/profile/preview?vpa=pub&locale=sv_SE" target="_blank">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
					</span>
				</a>	

				<a href="https://instagram.com/frittie/" target="_blank">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
					</span>
				</a>

				<a href="https://www.facebook.com/fridaannasvensson" target="_blank">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</div>

			<p><i class="fa fa-copyright"></i> Frida Svensson 2015</p>
		</div>
	</section>
</div>

<?php get_footer();?>