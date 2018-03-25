
  <div class="col-1">

  </div>
  <div class="col-10">

		<h1>Producten</h1>

		<hr>

		<p><a href='<?php echo APP_BASE_URL ?>/Products/addForm'>Nieuwe Product Toevoegen</a></p>

		<hr>

		<table class='table table-striped table-bordered table-hover' border='1'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Product</th>
					<th>Prijs</th>
					<th>Fabriek</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($product as $row): ?>
				<tr>
					<td><?= $row->product_id ?></td>
					<td><a href='<?= APP_BASE_URL ?>/products/productDetails/<?= $row->product_id ?>'><?= $row->product ?></a></td>
					<td><?= $row->prijs ?></td>
					<td><?= $row->naam ?></td>
					<td><a href='<?= APP_BASE_URL ?>/products/update/<?= $row->product_id ?>'>Verander mij!</a></td>
					<td><a href='<?= APP_BASE_URL ?>/products/delete/<?= $row->product_id ?>'>Hang mij!</a></td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

  </div>
  <div class="col-1">

  </div>
