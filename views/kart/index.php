<h1>BuyKart</h1>

<?php if(isset($_SESSION['kart']) && count($_SESSION['kart']) >= 1): ?>
<table>
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>Price</th>
		<th>Unities</th>
		<th>Delete</th>
	</tr>
	<?php 
		foreach($kart as $index => $element): 
		$product = $element['product'];
	?>
	
	<tr>
		<td>
			<?php if ($product->image != null): ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->image ?>" class="img_kart" />
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" class="img_kart" />
			<?php endif; ?>
		</td>
		<td>
			<a href="<?= base_url ?>product/ver&id=<?=$product->id?>"><?=$product->name?></a>
		</td>
		<td>
			<?=$product->price?>
		</td>
		<td>
			<?=$element['unities']?>
			<div class="updown-unities">
				<a href="<?=base_url?>kart/up&index=<?=$index?>" class="button">+</a>
				<a href="<?=base_url?>kart/down&index=<?=$index?>" class="button">-</a>
			</div>
		</td>
		<td>
			<a href="<?=base_url?>kart/delete&index=<?=$index?>" class="button button-kart button-red">Remove product</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
</table>
<br/>
<div class="delete-kart">
	<a href="<?=base_url?>kart/delete_all" class="button button-delete button-red">Empty kart</a>
</div>
<div class="total-kart">
	<?php $stats = Utils::statsKart(); ?>
	<h3>Total price: <?=$stats['total']?> $</h3>
	<a href="<?=base_url?>order/do" class="button button-order">Make an order</a>
</div>

<?php else: ?>
	<p>The kart is empty, add some product</p>
<?php endif; ?>