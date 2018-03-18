<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php foreach($product as $row):?>
      <h1><?php echo $row->product ?></h1>
      Productnaam: <?php echo $row->product ?><br />
      Prijs: <?php echo $row->prijs ?><br />
      Fabriek: <?php echo $row->naam ?><br /><br />

  <?php endforeach; ?>
  <?php foreach($voorraad as $row):?>
    Opslag Locatie: <?php echo $row->locatie ?><br />
    Voorraad: <?php echo $row->voorraad ?><br /><br />
  <?php endforeach; ?>
  <a href="index.php?controller=products&action=overview"><button>Terug</button></a>
  </body>
</html>
