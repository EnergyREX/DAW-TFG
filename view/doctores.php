<?php require_once '../controllers/DoctoresController.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctores</title>
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
  <h1>Doctores</h1>
  <?php require './componentes/sidebar.php' ?>

  <table>
    <tr>
      <th>DNI Doctor</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Direccion</th>
      <th>Número de teléfono</th>
      <th>Email</th>
      <th>Especialidad</th>
      <th>Fecha de Unión</th>
      <th>Disponibilidad</th>
      <th>Modificar</th>
      <th>Eliminar</th>
    </tr>
  <?php mostrarDoctores() ?>
  </table>
  <?php require './componentes/footer.php' ?>

</body>
</html>