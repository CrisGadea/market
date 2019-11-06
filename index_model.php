<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>T-Shirt Market</title>
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
	<div id="container">
		<header id="header">
			<div id="log">
				<img src="assets/img/camiseta.png" alt="Camiseta Logo">
				<a href="index.php">
					<h1>T-Shirt Market</h1>
				</a>
			</div>
		</header>
		<main>
			<nav id="menu">
				<ul>
					<li>
						<a href="#">Index</a>
					</li>
					<li>
						<a href="#">Category 1</a>
					</li>
					<li>
						<a href="#">Category 2</a>
					</li>
					<li>
						<a href="#">Category 3</a>
					</li>
					<li>
						<a href="#">Category 4</a>
					</li>
					<li>
						<a href="#">Category 5</a>
					</li>
				</ul>
			</nav>
			<div id="content">
				<aside id="lat">
					<div id="login" class="block_aside">
						<h3>Enter</h3>
						<form action="#" method="post">
							<label for="email">Email</label>
							<input type="email" name="email" />
							<label for="password">Password</label>
							<input type="password" name="password" />
							<input type="submit" value="Send" />
						</form>
						<ul>
							<li><a href="#">My orders</a></li>
							<li><a href="#">manage orders</a></li>
							<li><a href="#">manage categories</a></li>
						</ul>
					</div>
				</aside>
				<div id="central">
					<h1>Featured Products</h1>
					
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Wide Blue T-shirt</h2>
						<p>30 euros</p>
						<a href="" class="button">Buy</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Wide Blue T-shirt</h2>
						<p>30 euros</p>
						<a href="" class="button">Buy</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Wide Blue T-shirt</h2>
						<p>30 euros</p>
						<a href="" class="button">Buy</a>
					</div>

				</div>
			</div>
		</main>
		<footer id="footer"><p>Developed by Cristian Gadea &copy; <?= date('Y') ?></p></footer>
	</div>
</body>
</html>