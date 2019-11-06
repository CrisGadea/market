<?php if (isset($_SESSION['identity'])): ?>
	<h1>Do order</h1>
	<p>
		<a href="<?= base_url ?>kart/index">Show the products and the price of order</a>
	</p>
	<br/>
	
	<h3>Shipping Address:</h3>
	<form action="<?=base_url.'order/add'?>" method="POST">
		<label for="province">Province</label>
		<input type="text" name="province" required />
		
		<label for="city">City</label>
		<input type="text" name="location" required />
		
		<label for="direction">Direction</label>
		<input type="text" name="direction" required />
		
		<input type="submit" value="Confirm order" />
	</form>
		
<?php else: ?>
	<h1>You need to be logged</h1>
	<p>You need to be logged on the web to be able  to place your order.</p>
<?php endif; ?>


