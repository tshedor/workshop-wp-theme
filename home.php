<?php get_header();

	query_posts('posts_per_page=10'); while (have_posts()) : the_post();
		get_template_part( 'loop', 'single' );
	endwhile; wp_reset_query();

get_footer(); ?>