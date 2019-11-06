<?php if (isset($product)): ?>
	<h1><?= $product->name ?></h1>
	<div id="detail-product">
		<div class="image">
			<?php if ($product->image != null): ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->image ?>" />
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" />
			<?php endif; ?>
		</div>
		<div class="data">
			<p class="description"><?= $product->description ?></p>
			<p class="price"><?= $product->price ?>$</p>
			<a href="<?=base_url?>kart/add&id=<?=$product->id?>" class="button">Buy</a>
		</div>
	</div>
<?php else: ?>
	<h1>This product does not exists</h1>
<?php endif; ?>