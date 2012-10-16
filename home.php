<?php get_header();

	query_posts('cat=5'); while (have_posts()) : the_post();
		get_template_part( 'loop', 'single' );
	endwhile; wp_reset_query();

get_footer(); ?>