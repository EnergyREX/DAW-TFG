<?php session_start() ?>
<?php require_once '../controllers/AsistenteController.php' ?>
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
  require "./componentes/modalsAsistente.php";
  renderModalInsert();
  renderModalUpdate();
  renderDeleteModal();
?>
  <?php require './componentes/sidebar.php' ?>


  <div class="data">
    <h1>Asistentes</h1>
  <div class="data__options"><span>Asistentes</span><input type="text" placeholder="Esto aún no tiene función"><button>Buscar</button> <button>Filtro</button> <button class="insert__btn"><i class="fa-solid fa-plus"></i></button> </div>
  <table class="data__table">
    <tr class="table__header">
      <th class="table__title">DNI</th>
      <th class="table__title">Nombre</th>
      <th class="table__title">Apellidos</th>
      <th class="table__title">Direccion</th>
      <th class="table__title">Telefono</th>
      <th class="table__title">Email</th>
      <th class="table__title">Fecha de Unión</th>
      <th class="table__title">Disponibilidad</th>
      <th class="table__title">Opciones</th>
    </tr>
    <?php $asistente = new AsistenteController(); $asistente->mostrar(); ?>
  </table>
  </div>
  <script src="./js/asistentes.js"></script>
</body>
</html>