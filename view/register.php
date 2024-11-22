<?php require_once '../config/config.inc.php' ?>
<?php 
  require_once '../controllers/SessionsController.php' ;
  $sessions = new SessionsController;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register in our site</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/login.css">
  <script src=<?php echo FA6_URL ?> crossorigin="anonymous"></script>
<style>
  body {
    font-family: 'Inter', sans-serif;
}
</style>
</head>
<body>
  <main class="login">
  <form class="login__form" action="./login.php" method="POST">
    <div class="form__wrapper">
      <div class="form__title">
        <h1>Register</h1>
      </div>
      <div>
        <input class="login__input" placeholder="Nombre" type="text" name="nombre"></input>
        <input class="login__input" placeholder="Apellidos"  type="text" name="apellidos"></input>
      </div>

      <div>
        <input class="login__input" type="text" name="usuario" placeholder="Usuario" required>
        <input class="login__input" type="text" name="direccion" placeholder="Avenida 0...">
      </div>
        <input class="login__input" type="email" name="email" placeholder="example@example.com">
        <div>
          <input class="login__input" type="tel" name="telefono" placeholder="+00 000 000 000">
          <input class="login__input" placeholder="12345678P" name="dni">
        </div>
      <div>
        <input class="login__input" type="password" name="passwd" placeholder="Contraseña">
        <input class="login__input" type="password" name="rpasswd" placeholder="Repetir Contraseña" required>
      </div>
      <p class="login__regis">Registred? <a href="./login.php">Login now</a></p>
    <button class="login__btn" type="submit">Login</button>
      <div class="other__login">
        <button class="login__via--google"><i class="fa-brands fa-google"></i></button>
        <button class="login__via--x"><i class="fa-brands fa-x-twitter"></i></button>
        <button class="login__via--facebook"><i class="fa-brands fa-facebook"></i></button>
      </div>
      <?php $sessions->register() ?>
    </div>
  </form>
  </main>
</body>
</html>