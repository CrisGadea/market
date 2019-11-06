<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>T-Shirt Market</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="log">
					<img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="<?=base_url?>">
						T-Shirt Market
					</a>
				</div>
			</header>

			<!-- MENU -->
			<?php $categories = Utils::showCategories(); ?>
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=base_url?>">Index</a>
					</li>
					<?php while($cat = $categories->fetch_object()): ?>
						<li>
							<a href="<?=base_url?>category/ver&id=<?=$cat->id?>"><?=$cat->name?></a>
						</li>
					<?php endwhile; ?>
				</ul>
			</nav>

			<div id="content">