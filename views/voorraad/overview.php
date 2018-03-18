<h1>Voorraad</h1>

<hr>

<p><a href='<?= APP_BASE_URL ?>/Voorraad/addForm'>Nieuwe Product Toevoegen</a></p>

<hr>

<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Product</th>
			<th>Locatie</th>
			<th>Voorraad</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($voorraad as $row): ?>
		<tr>
			<td><?= $row->opslag_product_id ?></td>
			<td><?= $row->product ?></td>
			<td><?= $row->locatie ?></td>
			<td><?= $row->OPvoorraad ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
