<?php require_once '../controllers/PacientesController.php' ?>
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
  require "./componentes/modalsPaciente.php";
  renderModalInsert();
  renderModalUpdate();
  renderDeleteModal();
?>
  <?php require './componentes/sidebar.php' ?>


  <div class="data">
  <div><input type="text"> <button>Buscar</button> <button>Filtro</button> <button class="insert__btn"><i class="fa-solid fa-plus"></i></button> </div>
  <table class="data__table">
    <tr class="table__header">
      <th>DNI</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Modificar</th>
      <th>Eliminar</th>
    </tr>
    <?php mostrarPacientes(); ?>
  </table>
  </div>
  <script src="./js/pacientes.js"></script>
</body>
</html>