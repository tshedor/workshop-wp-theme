<?php get_header(); ?>
<div class="row-fluid master-wrap clearfix">
	<div class="span7">
		<div class="std-wrap search">
			<h1><?php the_search_query(); ?> <span>Search Results</span></h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="wrap-item clearfix">
				<div class="meta" id="meta_home">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<span class="comments"><a href="<?php the_permalink() ?>#comments" title="<?php the_title(); ?> Comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></span>
					<span class="author">By <?php the_author_posts_link(); ?></span>
					<span class="date"><?php echo get_the_date('M. j, Y'); ?></span>

				</div>
				<?php get_the_image(array('image_class' => 'wrap-list', 'size' => 'thumbnail'));
					echo substr(strip_tags(strip_shortcodes(get_the_content())),0,210);
					echo ' <a href="'.get_permalink().'" title="'.get_the_title().'" alt="'.get_the_title().'">[...]</a>';
				 ?>
			</div>
	<?php endwhile; else: ?>
		<div class="no-results">
			<h2><?php _e('No Results'); ?></h2>
			<p><?php _e('Please feel free try again!'); ?></p>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>

		<div class="row-fluid clearfix">
			<div class="span12 page-navigation">
				<?php wp_pagenavi(); ?>
			</div>
		</div>
<?php get_footer(); ?>