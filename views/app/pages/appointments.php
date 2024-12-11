<?php require_once('./views/app/components/modalsAppointments.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./views/app/css/reset.css">
  <link rel="stylesheet" href="./views/app/css/layout.css">
  <link rel="stylesheet" href="./views/app/css/sidebar.css">
  <link rel="stylesheet" href="./views/app/css/dataTable.css">
  <link rel="stylesheet" href="./views/app/css/modal.css">
  <script class="fa6" src="<?php echo FA6_URL ?>"></script>
  <title>Appointments - My Clinic</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
<?php renderModalInsert(); renderModalUpdate(); renderModalDelete(); ?>

  <aside class="header"></aside>

  <main>
    <div class="main__breadcrump">
      <a href="/dashboard">Dashboard </a>
      <i class="fa-solid fa-chevron-right"></i>
      <a href="/appointments"> Appointments</a>
    </div>

    <div class="main__ucontrol">
      <div>
      <input type="text"><button><i class="ucontrol__search fa-solid fa-magnifying-glass"></i></button>
      </div>
      <div class="ucontrol__btns">
        <button class="btns__filter"><i class="fa-solid fa-filter"></i></button>
        <button onclick="{OpenInsert()}" class="btn__insert"><i class="fa-solid fa-plus"></i></button>
        <button class="btns__reload"><i class="fa-solid fa-rotate-right"></i></button>
        <button onclick="postAppointment()" class="btns__test">Test</button>
      </div>
    </div>

    <table class="main__table"></table>

    <div class="main__fcontrol">
      Showing n
    </div>
  </main>
  <script src="./views/app/services/appointments.js"></script>
  <script src="./views/app/services/sidebar.js"></script>
  <script src="./views/app/services/modalManager.js"></script>
</body>
</html>