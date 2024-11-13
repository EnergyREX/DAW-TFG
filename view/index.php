
<?php require_once '../config/config.inc.php' ?>
<?php require_once '../controllers/IndexPanelController.php' ?>
<?php require_once '../controllers/CitasController.php' ?>
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
  <?php require_once './componentes/sidebar.php' ?>

   <main>
   <!-- Recuento de Pacientes totales, Card con Gráfico -->
   <!-- Recuento de Tratamientos, Card -->
   <!-- Próximas citas, Card. -->

   <div class="data">
    <h1>Dashboard</h1>
  
  <div class="stats__cards">  
    <section class="card__citas">
      <canvas class="citas__chart"></canvas>
      <h1>Citas actuales: <?php echo $panel->citas(); ?></h1>
    </section>

    <section class="card__doctores">
      <canvas class="doctores__chart"></canvas>
      <h1>Doctores actuales: <?php echo $panel->doctores(); ?></h1>
    </section>

    <section class="card__pacientes">
      <canvas class="pacientes__chart"></canvas>
      <h1>Pacientes actuales: <?php echo $panel->pacientes(); ?></h1>
    </section>

    </div>  
    <section>
    <div class="data__options"><span>Citas confirmadas</span><input type="text" placeholder="Esto aún no tiene función"><button>Buscar</button> <button>Filtro</button></div>  
      <table class="data__table">
      <tr class="table__header">
        <th class="table__title">ID Cita</th>
        <th class="table__title">Paciente</th>
        <th class="table__title">Nombre</th>
        <th class="table__title">Doctor</th>
        <th class="table__title">Nombre</th>
        <th class="table__title">Estado</th>
        <th class="table__title">Motivo</th>
        <th class="table__title">Día</th>
        <th class="table__title">Hora</th>
      </tr>
    <?php $panel->citasConfirm(); ?>
  </table>

    </section>
   </main>
    
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