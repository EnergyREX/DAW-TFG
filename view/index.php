
<?php require '../config/config.inc.php' ?>
<?php require '../controllers/IndexPanelController.php' ?>
<?php $panel = new IndexPanelController(); ?>

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

   <main>
   <!-- Recuento de Pacientes totales, Card con Gráfico -->
   <!-- Recuento de Tratamientos, Card -->
   <!-- Próximas citas, Card. -->

   <div class="data">
    <h1>Este dashboard está en desarrollo. Por ahora, en Index no verás nada.</h1>
    <h2>Revisa las otras pestañas del sidebar.</h2>
  
  <div class="stats__cards">  
    <section class="card__citas">
      <h1>Citas actuales:</h1>
      <canvas class="citas__chart"></canvas>
    </section>

    <section class="card__doctores">
      <h1>Doctores actuales:</h1>
      <canvas class="doctores__chart"></canvas>
    </section>

    <section class="card__pacientes">
      <h1>Pacientes actuales:</h1>
      <canvas class="pacientes__chart"></canvas>
    </section>
    </div>
   </main>
    
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="./js//charts.js" type="module">

  const citas = document.querySelector('.citas__chart');
  const doctores = document.querySelector('.doctores__chart')
  const pacientes = document.querySelector('.pacientes__chart')

let numCitas = <?php echo $panel->citas(); ?>
let numDoctores = <?php echo $panel->doctores(); ?>
let numPacientes = <?php echo $panel->pacientes(); ?>
  </script>


  </body>
</html>