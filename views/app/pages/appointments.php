<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./views/app/css/reset.css">
  <link rel="stylesheet" href="./views/app/css/layout.css">
  <link rel="stylesheet" href="./views/app/css/sidebar.css">
  <link rel="stylesheet" href="./views/app/css/dataTable.css">
  <script class="fa6" src="<?php echo FA6_URL ?>"></script>
  <title>Appointments - My Clinic</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
  <aside class="header"></aside>
  <main>
    <a href="/dashboard">Dashboard </a><i class="fa-solid fa-chevron-right"></i><a href="/appointments"> Appointments</a>
    <table class="data__table"></table>
  </main>
  <script src="./views/app/services/appointments.js"></script>
  <script src="./views/app/services/sidebar.js"></script>
  <script src="./views/app/services/getConfig.js"></script>
</body>
</html>