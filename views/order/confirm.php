<?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'complete'): ?>
	<h1>Your order has been confirmed</h1>
	<p>
		Your order has been successfully saved, once you make the transfer
Bank to account 7382947289239ADD with the cost of the order, will be processed and shipped.
	</p>
	<br/>
	<?php if (isset($order)): ?>
		<h3>Data from order:</h3>

		Number of order: <?= $order->id ?>   <br/>
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

<?php elseif (isset($_SESSION['order']) && $_SESSION['order'] != 'complete'): ?>
	<h1>Your order could NOT be processed</h1>
<?php endif; ?>
