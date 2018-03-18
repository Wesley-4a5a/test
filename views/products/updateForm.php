

<h1>Update Product</h1>
<hr />

<form action='<?= APP_BASE_URL ?>/products/updateProduct/' method='POST'>
Product ID:<br /> <input type='text' name='id' value="<?= $_GET['id'] ?>"/><br />
Product naam:<br /> <input type='text' name='product' value="<?= $_GET['name'] ?>"/><br />
Prijs:<br /> <input type="number" step="0.01" name='prijs' value="<?= $_GET['prijs'] ?>"/><br />
<input type='submit' value='Update' name='Update' />
</form>
