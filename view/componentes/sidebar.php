<?php 

echo (
  '<nav>
    <ul class="sidebar">
      <li>
      <div class="user__info">
        <img class="user__pfp" src="./public/admin.png">
        <h2 class="user__name">Admin</h2>
        <h4 class="user__role">Clinic - Admin</h4>
        <button class="user__btn">View Profile</button>
      </div></li>

      <li class="sidebar__link"><a class="sidebar__link" href="./index.php"><span class="link__icon"><i class="fa-solid fa-house"></i></span>Home</a></li>
      <li class="sidebar__link"><a class="sidebar__link" href="./pacientes.php"><span class="link__icon"><i class="fa-solid fa-notes-medical"></i></span>Pacientes</a></li>
      <li class="sidebar__link"><a class="sidebar__link" href="./doctores.php"><span class="link__icon"><i class="fa-solid fa-user-doctor"></i></span>Doctores</a></li>
      <li class="sidebar__link"><a class="sidebar__link" href="./asistentes.php"><span class="link__icon"><i class="fa-solid fa-user"></i></span>Asistentes</a></li>
      <li class="sidebar__link"><a class="sidebar__link" href="./citas.php"><span class="link__icon"><i class="fa-regular fa-calendar-check"></i></span>Citas</a></li>
      <li class="sidebar__link"><a class="sidebar__link" href="./tratamientos.php"><span class="link__icon"><i class="fa-solid fa-virus"></i></span>Tratamientos</a></li>
      <li class="sidebar__link"><a class="sidebar__link" href="./presupuestos.php"><span class="link__icon"><i class="fa-solid fa-check"></i></span>Presupuestos</a></li>
    </ul>
</nav>'
)

?>