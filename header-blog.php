<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
	<title>
		<?php
		//echo bloginfo('name');
		//echo wp_title();
		if(is_archive()) {
			echo ucfirst(trim(wp_title('', false))) . ' - ';
		} else
		if(!(is_404()) && (is_single()) || (is_page())) {
			$title = wp_title('', false);
			if(!empty($title)) {
				echo $title . ' - ';
			}
		} else
		if(is_404()) {echo 'Nie znaleziono strony';	}
		if(is_home()) {
			bloginfo('name');
			echo ' - ';
			bloginfo('description');
		} else {echo bloginfo('name');}
		global $paged;
		if($paged > 1) {echo ' - strona ' . $paged;}
		?>
	</title>
	<script src="//cdnjs.cloudflare.com/ajax/libs/headjs/1.0.3/head.min.js"></script>
	<script>window.head || document.write("<script src='js/lib/head.js'>\x3C/script>");</script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" media="screen">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog.css" media="screen">
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/ie/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/ie/respond.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class()?>>
<div class="wrap">
	<nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="45">
	<div class="navbar-container container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-epanstwo.svgz" data-img="<?php echo get_template_directory_uri(); ?>/images/logo-epanstwo.png" width="187" height="63" alt="Fundacja ePanstwo"></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'menu_class' => 'nav navbar-nav navbar-right',
					'container' => '',
				)
			); ?>
			<ul class="navbar-language">
				<?php
				$blog_id = get_current_blog_id();
				 if($blog_id==2) :?>
					<li>wersja polska</li>
					<li><a href="/en">english version</a></li>
				<?php endif; ?>
				<?php if($blog_id==3) :?>
					<li><a href="/pl">wersja polska</a></li>
					<li>english version</li>
				<?php endif; ?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
	<div class="navbar-blog">
		<div class="navbar-blog-container container">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'blog-menu',
					'menu_class' => 'navbar-blog-sub',
					'container' => '',
				)
			); ?>
		</div>
	</div>
	</nav>