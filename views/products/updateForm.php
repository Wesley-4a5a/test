

<h1>Update Product</h1>
<hr />
<?php
foreach($product as $row){ ?>
<form action='<?= APP_BASE_URL ?>/products/updateProduct/' method='POST'>
Product ID:<br /> <input type='text' name='id' value="<?= $row->product_id ?>"/><br />
Product naam:<br /> <input type='text' name='product' value="<?= $row->product ?>"/><br />
Prijs:<br /> <input type="number" step="0.01" name='prijs' value="<?= $row->prijs ?>"/><br />
<input type='submit' value='Update' name='Update' />
</form>
<?php } ?>
