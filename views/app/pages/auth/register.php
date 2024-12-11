<!--     
     $query->bindParam(':dni', $params['dni']);
    $query->bindParam(':name', $params['name']);
    $query->bindParam(':surname', $params['surname']);
    $query->bindParam(':address', $params['address']);
    $query->bindParam(':phone_number', $params['phone_number']);
    $query->bindParam(':email', $params['email']);
    $query->bindParam(':passwd', password_hash($params['passwd'], PASSWORD_BCRYPT));
    -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/app/css/reset.css">
    <link rel="stylesheet" href="./views/app/css/auth.css">
    <title>Auth - My Clinic</title>
    <script class="fa6" src="<?php echo FA6_URL ?>"></script>
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  </head>
<body>
  <main class="login">
    <form class="login__form" action="http://localhost/login" method="post">
      <div class="form__wrapper">
        <h1>Log in</h1>
        <input class="login__input" type="text" name="dni" placeholder="00000000Z" required>
        <input class="login__input" type="text" name="name" placeholder="name" required>
        <input class="login__input" type="text" name="surname" placeholder="surname" required>
        <input class="login__input" type="text" name="address" placeholder="Paul St. 1"  required>
        <input class="login__input" type="tel" name="phone" placeholder="000 000 000"  required>
        <input class="login__input" type="password" name="contrasena" placeholder="password"  required>
        <input class="login__input" type="password" name="contrasena" placeholder="password"  required>

  
        <p class="login__regis">Own an account? <a href="/login">Register now</a></p>
  
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
    <script src="./js/login.js"></script>
</body>
</html>