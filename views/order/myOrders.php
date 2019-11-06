<?php if (isset($management)): ?>
	<h1>Orders management</h1>
<?php else: ?>
	<h1>My orders</h1>
<?php endif; ?>
<table>
	<tr>
		<th>Order number</th>
		<th>Cost</th>
		<th>Date</th>
		<th>Status</th>
	</tr>
	<?php
	while ($ped = $orders->fetch_object()):
		?>

		<tr>
			<td>
				<a href="<?= base_url ?>order/detail&id=<?= $ped->id ?>"><?= $ped->id ?></a>
			</td>
			<td>
				<?= $ped->cost ?> $
			</td>
			<td>
				<?= $ped->date ?>
			</td>
			<td>
				<?=Utils::showStatus($ped->status)?>
			</td>
		</tr>

	<?php endwhile; ?>
</table>