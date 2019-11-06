<h1>Some of our products</h1>

<?php while($product = $products->fetch_object()): ?>
	<div class="product">
		<a href="<?=base_url?>product/show&id=<?=$product->id?>">
			<?php if($product->image != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$product->image?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
			<?php endif; ?>
			<h2><?=$product->name?></h2>
		</a>
		<p><?=$product->price?></p>
		<a href="<?=base_url?>kart/add&id=<?=$product->id?>" class="button">Buy</a>
	</div>
<?php endwhile; ?>
