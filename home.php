<?php get_header();
	echo '<div class="row-fluid clearfix centered"><h1 class="mast">';
	bloginfo('name');
	echo '</h1><h2 class="tagline">';
	bloginfo('description');
	echo '</h2></div>';

	query_posts('posts_per_page=10'); while (have_posts()) : the_post();
		get_template_part( 'loop', 'single' );
	endwhile; wp_reset_query();

get_footer(); ?>