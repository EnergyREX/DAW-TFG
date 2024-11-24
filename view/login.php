<?php require_once '../controllers/PacientesController.php' ?>
<?php $pacientes = new PacientesController(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in our site</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
  <form class="login__form" action="../controllers/UserController.php" method="post">
    <div class="form__wrapper">
      <h1>Log in</h1>
      <input class="login__input" type="text" name="email" placeholder="example@example.com" required>
      <input class="login__input" type="password" name="contrasena" placeholder="Contraseña"  required>

      <p class="login__regis">Not registred? <a href="./register.php">Register now</a></p>

      <input type="hidden" name="method" value="login">
    <button class="login__btn" type="submit">Login</button>
      <div class="other__login">

      <button class="login__via--google"><i class="fa-brands fa-google"></i></button>
      <button class="login__via--x"><i class="fa-brands fa-x-twitter"></i></button>
      <button class="login__via--facebook"><i class="fa-brands fa-facebook"></i></button>
      
      </div>
    </div>
  </form>
  </main>
</body>
</html>