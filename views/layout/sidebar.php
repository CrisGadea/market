<aside id="lat">

	<div id="kart" class="block_aside">
		<h3>My kart</h3>
		<ul>
			<?php $stats = Utils::statsKart(); ?>
			<li><a href="<?=base_url?>kart/index">Products (<?=$stats['count']?>)</a></li>
			<li><a href="<?=base_url?>kart/index">Total: <?=$stats['total']?> $</a></li>
			<li><a href="<?=base_url?>kart/index">Show the kart</a></li>
		</ul>
	</div>
	
	<div id="login" class="block_aside">
		
		<?php if(!isset($_SESSION['identity'])): ?>
			<h3>Enter the web</h3>
			<form action="<?=base_url?>user/login" method="post">
				<label for="email">Email</label>
				<input type="email" name="email" />
				<label for="password">Password</label>
				<input type="password" name="password" />
				<input type="submit" value="Send" />
			</form>
		<?php else: ?>
			<h3><?=$_SESSION['identity']->name?> <?=$_SESSION['identity']->surname?></h3>
		<?php endif; ?>

		<ul>
			<?php if(isset($_SESSION['admin'])): ?>
				<li><a href="<?=base_url?>category/index">Manage categories</a></li>
				<li><a href="<?=base_url?>product/manage">Manage products</a></li>
				<li><a href="<?=base_url?>order/manage">Manage orders</a></li>
			<?php endif; ?>
			
			<?php if(isset($_SESSION['identity'])): ?>
				<li><a href="<?=base_url?>order/my_orders">My orders</a></li>
				<li><a href="<?=base_url?>user/logout">Close Session</a></li>
			<?php else: ?> 
				<li><a href="<?=base_url?>user/register">Register now here</a></li>
			<?php endif; ?> 
		</ul>
	</div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="central">