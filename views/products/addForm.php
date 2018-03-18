<h1>Product Toevoegen</h1>
<hr>

<form  action="<?= APP_BASE_URL ?>/products/addProduct" method="POST">
Product naam:<br /> <input type='text' name='product' /><br />
Product Prijs:<br /> <input type="number" step="0.01" name='prijs' /><br />
Fabriek:<br />
<select name='fabriek'>
    	<?php foreach ($fabriek as $row){
        echo '<option value="'.$row->fabriek_id.'">' . $row->naam . '</option>';
      } ?>
</select><br />
<input type='submit'/>
</form>
