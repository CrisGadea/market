<h1>Detail of order</h1>

<?php if (isset($order)): ?>
		<?php if(isset($_SESSION['admin'])): ?>
			<h3>Change status from order</h3>
			<form action="<?=base_url?>order/status" method="POST">
				<input type="hidden" value="<?=$order->id?>" name="order_id"/>
				<select name="status">
					<option value="confirm" <?=$order->status == "confirm" ? 'selected' : '';?>>Pendiente</option>
					<option value="preparation" <?=$order->status == "preparation" ? 'selected' : '';?>>In preparation</option>
					<option value="ready" <?=$order->status == "ready" ? 'selected' : '';?>>Ready to ship</option>
					<option value="sended" <?=$order->status == "sended" ? 'selected' : '';?>>Sended</option>
				</select>
				<input type="submit" value="Change status" />
			</form>
			<br/>
		<?php endif; ?>

		<h3>Direction from shipping</h3>
		Province: <?= $order->province ?>   <br/>
		City: <?= $order->location ?> <br/>
		Direction: <?= $order->direction ?>   <br/><br/>

		<h3>Data from order:</h3>
		State: <?=Utils::showStatus($order->status)?> <br/>
		Order Number: <?= $order->id ?>   <br/>
		Total to buy: <?= $order->cost ?> $ <br/>
		Products:

		<table>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Unities</th>
			</tr>
			<?php while ($product = $products->fetch_object()): ?>
				<tr>
					<td>
						<?php if ($product->image != null): ?>
							<img src="<?= base_url ?>uploads/images/<?= $product->image ?>" class="img_kart" />
						<?php else: ?>
							<img src="<?= base_url ?>assets/img/camiseta.png" class="img_kart" />
						<?php endif; ?>
					</td>
					<td>
						<a href="<?= base_url ?>product/ver&id=<?= $product->id ?>"><?= $product->name ?></a>
					</td>
					<td>
						<?= $product->price ?>
					</td>
					<td>
						<?= $product->unities ?>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php endif; ?>