<?php get_header(); ?>
<div class="row-fluid">
	<div class="span12">
		<?php if(have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="centered"><?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="centered">Tagged <?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="centered">Archive for <?php the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="centered">Archive for <?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="centered">Archive for <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="centered">Author Archive</h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="centered">Blog Archives</h1>
		<?php } ?>

		<?php $count = 0;
		query_posts('order=ASC&cat='.get_query_var('cat'));
		while (have_posts()) : the_post();
		get_template_part( 'functions/loop', 'single' );
	endwhile; endif;

get_footer(); ?>
<?php get_footer(); ?>