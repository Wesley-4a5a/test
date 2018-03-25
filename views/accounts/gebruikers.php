
  <div class="col-1">

  </div>
  <div class="col-10">

		<h1>Gebruikers</h1>

		<hr>

		<table class='table table-striped table-bordered table-hover' border='1'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Email</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($gebruikers as $row): ?>
				<tr>
					<td><?= $row->account_id ?></td>
					<td><?= $row->email ?></td>
					<td><a href='#'>Verander mij!</a></td>
					<td><a href='<?= APP_BASE_URL ?>/accounts/delete/<?= $row->account_id ?>'>Hang mij!</a></td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

  </div>
  <div class="col-1">

  </div>
