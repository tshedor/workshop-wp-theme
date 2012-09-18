<?php wp_footer(); ?>
<div class="clearfix" id="footer">
			<div class="notice">
			<div class="row-fluid ie6-warning warning">
				<div class="span12">
					<div class="alert">
						<span class="headsup-icon"></span><strong>Internet Explorer 6 User</strong>: You are using an outdated and insecure browser. We do not support the use of Internet Explorer 6 and below. Please <a href="http://browsehappy.com/" title="Use an alternative browser">use an alternative browser</a>, install <a href="http://www.google.com/chromeframe/eula.html?prefersystemlevel=true" title="Google Chrome Frame">Google Chrome Frame</a>, or learn about why <a href="http://www.smashingmagazine.com/2012/07/10/dear-web-user-please-upgrade-your-browser/" title="Dear Web User: Please Upgrade Your Browser">using Internet Explorer 6 is dangerous</a>.
					</div>
				</div>
			</div>
			<div class="row-fluid ie-warning warning">
				<div class="span12">
					<div class="alert">
						<span class="headsup-icon"></span><strong>Internet Explorer User</strong>: You are using an outdated and insecure browser. In order to enjoy all the features of Kansan.com, please <a href="http://browsehappy.com/" title="Use an alternative browser">use an alternative browser</a> or install <a href="http://www.google.com/chromeframe/eula.html?prefersystemlevel=true" title="Google Chrome Frame">Google Chrome Frame</a>. <a href="http://www.smashingmagazine.com/2012/07/10/dear-web-user-please-upgrade-your-browser/" title="Dear Web User: Please Upgrade Your Browser">Learn more</a>
					</div>
				</div>
			</div>
			<noscript>
				<div class="row-fluid warning">
					<div class="span12">
						<div class="alert">
							<span class="headsup-icon"></span><strong>Javascript Disabled</strong>: Your Javascript is disabled. In order to enjoy all the features of Kansan.com, <a href="http://enable-javascript.com/" title="Enable Javascript">please enable Javascript</a> in your browser's settings.
						</div>
					</div>
				</div>
			</noscript>
		</div>
	<div class="row-fluid clearfix">
		<div class="span12">
			<div class="footer">
				<div class="row-fluid">
					<?php wp_nav_menu(array( 'theme_location' => 'global_menu', 'container' => '', 'items_wrap' => '<ul class="global-links hidden-phone clearfix">%3$s</ul>', )); ?>
				</div>
				<div class="row-fluid">
					<div class="span6">
						&nbsp;
					</div>
					<div class="span6">
						<div class="copyright">
							&copy; Copyright <a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>"><?php bloginfo('name') ?></a> <?php echo date('Y'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>
</div>
<!--[if lt IE 9]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script type="text/javascript" src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/compatability/IE9.js"></script>
<![endif]-->
<!--[if lt IE 7]>
	<script src="<?php bloginfo('template_directory'); ?>/js/compatability/IE7.js"></script>
	<link href="<?php bloginfo('template_directory'); ?>/css/fonts/fontello-ie7.css" type="text/css" rel="stylesheet" media="screen" />
<![endif]-->
<!--[if lt IE 8]>
	<script src="<?php bloginfo('template_directory'); ?>/js/compatability/IE8.js"></script>
<![endif]-->
</body>
</html>