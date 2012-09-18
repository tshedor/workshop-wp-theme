<?php get_header(); ?>
<div class="row-fluid">
	<div class="span12">
		<?php if(have_posts()) : ?>
	
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1><?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1>Tagged <?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1>Archive for <?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1>Archive for <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1>Author Archive</h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1>Blog Archives</h1>
		<?php } ?>
			
		<?php $count = 0; while(have_posts()) : the_post();
		if($count == 0){ ?>
		<div class="row-fluid clearfix archive-featured-item">
			<div class="span8">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
				<div class="meta">
					By <?php the_author_posts_link(); ?> | <?php echo get_the_date('F j, Y'); ?>
				</div>
				<div class="excerpt row-fluid clearfix">
					<div class="span6">
						<?php if ( function_exists( 'get_the_image' ) ) $get_the_image_as_array = get_the_image( array( 'image_scan' => true, 'size' => 'medium', 'format' => 'array') ); ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory') ?>/functions/timthumb.php?h=260&amp;w=370&amp;zc=1&amp;src=<?php echo $get_the_image_as_array['url']; ?>" alt="<?php echo $get_the_image_as_array['alt']; ?>" class="archive_feature" /></a>
					</div>
					<div class="span6">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
			<div class="span4 cat-description">
				<?php echo category_description(); ?>
				<a href="<?php bloginfo('url') ?>/issues/01/30/<?php single_cat_title(); ?>" title="<?php echo str_replace(" ", "-", single_cat_title("", false)); ?>"><?php single_cat_title(); ?></a>
			</div>
		</div>
		<?php } else { ?>
		<?php if($count == 1) {
			echo '<div class="row-fluid archive-item-row">';
		} ?>
			<div class="span4">
				<div class="archive-item">
				<div>
					<?php if ( function_exists( 'get_the_image' ) ) $get_the_image_as_array = get_the_image( array( 'image_scan' => true, 'size' => 'medium', 'format' => 'array') ); ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory') ?>/functions/timthumb.php?h=220&amp;w=370&amp;zc=1&amp;src=<?php echo $get_the_image_as_array['url']; ?>" alt="<?php echo $get_the_image_as_array['alt']; ?>" class="archive_thumb" /></a>
			</div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
			<div class="meta">
				by <?php the_author_posts_link(); ?>
			<br />
				<?php echo get_the_date('F j, Y'); ?> | <?php comments_number(); ?>
			</div>
			<?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">Read More</a>
		</div>
		</div>

		<?php if($count % 3 == 0) {
			echo '</div>';
			echo '<div class="row-fluid">';
		} } ?>

		<?php $count++; if(($count == wp_count_posts()) && ($count % 3 != 0)) { echo '</div>'; }endwhile; else : ?>

		<div class="post">
		
			<h2>Page Not Found</h2>
			
			<p>Looks like the page you're looking for isn't here anymore. Try browsing the <a href="">categories</a>, <a href="">archives</a>, or using the search box below.</p>
			
			<?php include(TEMPLATEPATH.'/searchform.php'); ?>
		
		</div> <!-- .post -->

		<?php endif; ?>
	
			
		<div class="row-fluid clearfix">
			<div class="span12 page-navigation">
				<?php wp_pagenavi(); ?>
			</div>
		</div>
</div>
</div>
<?php get_footer(); ?>