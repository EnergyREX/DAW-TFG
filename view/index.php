<?php session_start() ?>
<?php $root = $_SERVER['DOCUMENT_ROOT']  ?>
<?php require_once "$root/config/config.inc.php" ?>
<?php require_once "$root/controllers/IndexPanelController.php" ?>
<?php ?>
<?php $panel = new IndexPanelController(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/main.css">
  <script src=<?php echo FA6_URL ?> crossorigin="anonymous"></script>
<style>
  body {
    font-family: 'Inter', sans-serif;
}
</style>
</head>
  <body>
  <?php require_once './componentes/sidebar.php'; renderizarSidebar($_SESSION['rol']); ?>

   <main>

   <div class="data">
    <h1>Dashboard</h1>

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