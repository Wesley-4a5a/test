

<h1>Update Fabriek</h1>
<hr />

<form action='index.php?controller=fabrieken&action=updateFabriek&id=<?php echo $_GET["id"]?>' method='POST'>
Fabrieks naam:<br /> <input type='text' name='naam' value="<?php echo $_GET['name'] ?>"/><br />
<input type='submit' value='Update' name='Update' />
</form>
