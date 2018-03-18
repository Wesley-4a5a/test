<h1>Fabrieken</h1>

<hr>

<p><a href='index.php?controller=Fabrieken&action=addForm'>Nieuwe Fabriek Toevoegen</a></p>

<hr>

<table class='table table-striped table-bordered table-hover'>
	<thead>
		<tr>
			<th>Id</th>
			<th>FabrieksNaam</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($fabriek as $row): ?>
		<tr>
			<td><?php echo $row->fabriek_id ?></td>
			<td><?php echo $row->naam ?></td>
			<td><a href='index.php?controller=fabrieken&action=update&id=<?php echo $row->fabriek_id ?>&name=<?php echo $row->naam?>'>Verander mij!</a></td>
			<td><a href='index.php?controller=fabrieken&action=delete&id=<?php echo $row->fabriek_id ?>'>Hang mij!</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
