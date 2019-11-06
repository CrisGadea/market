<h1>Products Management</h1>

<a href="<?=base_url?>product/create" class="button button-small">
	Create product
</a>

<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'complete'): ?>
	<strong class="alert_green">This product has been created successfully!</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != 'complete'): ?>	
	<strong class="alert_red">This product has not been created successfully</strong>
<?php endif; ?>
<?php Utils::deleteSession('product'); ?>
	
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">This product has been deleted successfully!</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">This product has not been deleted successfully</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
	
<table>
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>PRICE</th>
		<th>STOCK</th>
		<th>ACCIONS</th>
	</tr>
	<?php while($pro = $products->fetch_object()): ?>
		<tr>
			<td><?=$pro->id;?></td>
			<td><?=$pro->name;?></td>
			<td><?=$pro->price;?></td>
			<td><?=$pro->stock;?></td>
			<td>
				<a href="<?=base_url?>product/edit&id=<?=$pro->id?>" class="button button-gestion">Edit</a>
				<a href="<?=base_url?>product/delete&id=<?=$pro->id?>" class="button button-gestion button-red">Delete</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>
