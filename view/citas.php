<?php require_once '../controllers/CitasController.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="./index.css">
<style>
  body {
    font-family: 'Inter', sans-serif;
}
</style>
</head>
<body>
  <h1>Citas</h1>
  <?php require './componentes/sidebar.php' ?>
  
  <div><input type="text"> <button>Buscar</button> <button>Filtro</button><button>Insertar paciente</button></div>
  <table>
    <tr>
      <th>Paciente</th>
      <th>Doctor</th>
      <th>Estado</th>
      <th>Motivo</th>
      <th>Día</th>
      <th>Hora</th>
    </tr>
    <?php mostrarCitas(); ?>
  </table>

  <div class="dialog__insert">
    <h1>Insertar un nuevo dato.</h1>
    <form action="./citas.php" method="post">
      <label for="paciente">Paciente</label>
      <input type="text" name="paciente">
      <label for="doctor">Doctor</label>
      <input type="text" name="doctor">
      <label for="estado">Estado</label>
      <input type="text" name="estado">
      <label for="motivo">Motivo</label>
      <input type="text" name="paciente">
      <label for="dia">Día</label>
      <input type="date" name="paciente">
      <label for="hora">Hora</label>
      <input type="datetime" name="hora">
      <button type="submit">Insertar</button>

    </form>
  </div>

  <?php require './componentes/footer.php' ?>
</body>
</html>