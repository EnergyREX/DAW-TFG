<?php require_once '../controllers/TratamientoController.php' ?>
<!DOCTYPE html>
<html lang="es">
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
<?php 
  require "./componentes/modalsTratamiento.php";
  renderModalInsert();
  renderModalUpdate();
  renderDeleteModal();
?>
  <?php require './componentes/sidebar.php' ?>


  <div class="data">
  <div class="data__control"><input type="text"> <button>Buscar</button> <button>Filtro</button> <button class="insert__btn"><i class="fa-solid fa-plus"></i></button> </div>
  <table class="data__table">
    <tr class="table__header">
      <th>ID Cita</th>
      <th>Paciente</th>
      <th>Nombre</th>
      <th>Doctor</th>
      <th>Nombre</th>
      <th>Estado</th>
      <th>Motivo</th>
      <th>Día</th>
      <th>Hora</th>
      <th>Modificar</th>
      <th>Eliminar</th>
    </tr>
    <?php mostrarTratamientos(); ?>
  </table>
  </div>
  <script src="./js/tratamientos.js"></script>
</body>
</html>