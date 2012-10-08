<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="language-markup">
<head profile="http://gmpg.org/xfn/11">
<!--[if lt IE 7]>      <html class="ie6"> <![endif]-->
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html>         <!--<![endif]-->    
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<title><?php if(!is_home()) { wp_title(''); echo " | "; } bloginfo('name'); if(is_home()) { echo " | "; bloginfo('description'); } ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=device-width, initial-scale=1.0" /> <meta name="description" content="<?php bloginfo('description') ?>"> <meta name="robots" content="all">
	<?php 
		if(is_single()){
			echo '<meta property="og:title" content="'.get_the_title().'" />';
			echo '<meta property="og:url" content="'.get_permalink().'" />';
			echo '<meta property="og:description" content="'.get_the_excerpt().'" />';
			echo '<meta property="og:type" content="article" />';
		} elseif((is_home()) || (is_archive())){
			echo '<meta property="og:title" content="'.get_bloginfo('name').'" />';
			echo '<meta property="og:url" content="'.get_bloginfo('url').'" />';
			echo '<meta property="og:description" content="'.get_bloginfo('description').'" />';
			echo '<meta property="og:type" content="website" />';
			echo '<link href="'.get_bloginfo('template_directory').'/css/add2home.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />';
			echo '<script src="'.get_bloginfo('template_directory').'/js/add2home.min.js" type="text/javascript"></script>';
		}
			echo '<meta property="og:site_name" content="'.get_bloginfo('name').'" />';
	?><meta name="copyright" content="<?php echo date('Y') ?> The University Daily Kansan"><link type="text/plain" rel="author" href="<?php bloginfo('template_directory'); ?>/humans.txt" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" /><link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" /><link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" /><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/css/images/favicon.ico" /><link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/css/images/apple.png" />

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prism.css" type="text/css"/>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" />

	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/prism.min.js" type="text/javascript" charset="utf-8"></script>

	<?php wp_head(); ?>
</head>
<body>

		<?php if(get_option('udk_breaking_news_story') != "") { $p = get_post(get_option('udk_breaking_news_story'));
			echo '<div class="row-fluid breaking-alert">
				<div class="span12">
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>';
						echo '<a href="'.get_permalink(get_option('udk_breaking_news_story')).'" title="'.$p->post_title.'"><strong>Breaking:</strong> '.$p->post_title.'</a>
					</div>
				</div>
			</div>';
		} ?>
	<?php if(!is_user_logged_in()){ ?>
	<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-668650-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
	<?php } ?>
	<div class="row-fluid clearfix">
		<div class="span2 left-nav">
			<div class="primary-left">
				<?php wp_nav_menu(array( 'theme_location' => 'top_menu', 'container' => '', 'items_wrap' => '<ul>%3$s</ul>', )); ?>
			</div>
		</div>
		<div class="span10">

