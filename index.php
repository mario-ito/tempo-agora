<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php echo get_bloginfo('description') ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body>
	<div id="container">
		<h1><?php bloginfo('name'); ?></h1>
		<h2><?php bloginfo('description'); ?></h2>
		<input id="city" type="text"></input>
		<div id="weather" class="preloader">
			<h3></h3>
			<div id="city_weather">
				<span id="temperature"></span>
				<span id="icon"></span>
				<span id="description"></span>
			</div>
		</div>
	</div>
	<div id="image_credit">
		<a href="http://www.freepik.com">Photo by onlyyouqj / Freepik</a>
	</div>
</body>

</html>