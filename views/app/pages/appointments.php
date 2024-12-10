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
      <input type="text"><button><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
      <div>
        <button class="btn__filter"><i class="fa-solid fa-filter"></i></button>
        <button class="btn__insert"><i class="fa-solid fa-plus"></i></button>
        <button class="btn__reload"><i class="fa-solid fa-rotate-right"></i></button>
      </div>
    </div>

    <table class="main__table"></table>

    <div class="main__fcontrol">
      Showing (ammount)
    </div>
  </main>
  <script src="./views/app/services/appointments.js"></script>
  <script src="./views/app/services/sidebar.js"></script>
</body>
</html>