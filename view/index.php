
<?php require '../config/config.inc.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="./main.css">
  <script src=<?php echo FA6_URL ?> crossorigin="anonymous"></script>
<style>
  body {
    font-family: 'Inter', sans-serif;
}
</style>
</head>
  <body>
  <?php require './componentes/sidebar.php' ?>

   <!-- Recuento de citas, Card -->
   <!-- Recuento de Pacientes totales, Card con Gráfico -->
   <!-- Recuento de Tratamientos, Card -->
   <!-- Próximas citas, Card. -->

   <div class="data">
    <h1>Este dashboard está en desarrollo. Por ahora, en Index no verás nada.</h1>
    <h2>Revisa las otras pestañas del sidebar.</h2>
   </div>
    
  <?php require './componentes/footer.php' ?>
  </body>
</html>