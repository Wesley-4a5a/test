<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Grid Testing</title>
    <link rel="stylesheet" type="text/css" href="<?= APP_BASE_URL ?>/assets\dist\css\style.css">
  </head>
  <body>

  <div class="col-12 header">
    <img class="logo" src="<?= APP_BASE_URL ?>/assets/images/kumapantsu.png" />
      <div class="login">
    <?php if($_SESSION['login'] === false){ ?>

        <form action='<?= APP_BASE_URL ?>/accounts/login' method='POST'>
          <input type="text" name='email' placeholder="Username"/>
          <input type="password" name='pass' placeholder="Password"/>
          <input type="submit" value="Login"/>
        </form>
        <a href=<?= APP_BASE_URL ?>/accounts/registreer><button>Registreren</button></a>

    <?php }else{ ?>
      Welkom <?= $_SESSION['email'];?>
      <form action='<?= APP_BASE_URL ?>/accounts/logout' method='POST'>
        <input type='submit' value='Uitloggen' />
      </form>
    <?php } ?>
      </div>
  </div>




  <div class="col-2 menu">
  <ul>
    <li><a href="<?= APP_BASE_URL ?>/pages/home"> Home</a></li>
    <li><a href="<?= APP_BASE_URL ?>/pages/about"> About</a></li>
    <?php if($_SESSION['login'] === true){ ?>
    <li><a href="<?= APP_BASE_URL ?>/products/overview"> Producten</a></li>
    <li><a href="<?= APP_BASE_URL ?>/voorraad/overview"> Voorraad</a></li>
    <li><a href="<?= APP_BASE_URL ?>/fabrieken/overview"> Fabrieken</a></li>
    <li><a href="<?= APP_BASE_URL ?>/accounts/gebruikers"> Gebruikers</a></li>
    <?php } ?>
  </ul>
  </div>
