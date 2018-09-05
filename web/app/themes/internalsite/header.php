
<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="app/themes/internalsite/assets/css/main.css">
	<?php wp_head(); ?>

	<title class="title">Internalsite</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
		<img class= "clogo" src="app/themes/internalsite/img/logo.jpeg" alt="Company logo" >
			<b><a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a></b>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

                 <!-- start primary_menu -->
			<?php
				wp_nav_menu([
					'menu' => 'primary_menu',
					'container_class' => 'collapse navbar-collapse', // wrapping div class
					'container_id' => 'navbarNav', // wrapping div id
					'menu_class' => 'navbar-nav', // ul class
				]);
			?>

			<div class="search"><?php get_search_form()?></div>
			<!-- end primary_menu -->

		</div>
	</nav>
	<!-- end site header -->

    
