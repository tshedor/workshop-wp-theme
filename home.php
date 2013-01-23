<?php get_header();

	$qh = new WP_Query('cat=5'); while ($qh->have_posts()) : $qh->the_post();
		get_template_part( 'functions/loop', 'single' );
	endwhile;

get_footer(); ?>