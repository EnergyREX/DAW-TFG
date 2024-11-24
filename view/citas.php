<?php session_start() ?>
<?php require_once '../controllers/CitasController.php' ?>
<!DOCTYPE html>
<html lang="es">
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
<?php 
  require "./componentes/modalsCitas.php";
  renderModalInsert();
  renderModalUpdate();
  renderDeleteModal();
?>
  <?php require './componentes/sidebar.php' ?>


  <div class="data">
    <h1>Citas</h1>
    <div class="data__options"><span>Citas</span><input type="text" placeholder="Esto aún no tiene función"><button>Buscar</button> <button>Filtro</button> <button class="insert__btn"><i class="fa-solid fa-plus"></i></button> </div>  
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
      <th class="table__opt">Opciones</th>
    </tr>
    <?php $citas = new CitasController(); $citas->mostrar(); ?>
  </table>
  </div>
  <script src="./js/citas.js"></script>
</body>
</html>