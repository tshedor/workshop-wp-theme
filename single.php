<?php get_header(); ?>
			<?php if(have_posts()) : while(have_posts()) : the_post();
				get_template_part( 'loop', 'single' );
				echo '<div id="comment-area">';
				comments_template();
				echo '</div>';
			endwhile; endif;
			?>
<link href="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-thumbs.min.js"></script>
<?php get_footer(); ?>
