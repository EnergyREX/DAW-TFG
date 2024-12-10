// Sidebar rendering depending on the session role.

let role = 4

// Admin: Staff (Admins, Doctor, Assistants), Patients, Treatments, Inventory, Appointments
const htmlAdmin = 
`
<nav class="sidebar">
<div class="sidebar__header">
  <h1 class="header__title">MyClinic</h1>
</div>

  <ul class="sidebar__body">
    <li class="sidebar__link"><a href="/patients"><i class="sidebar__icon fa-solid fa-house"></i></i>Patients</a></li>
    <li class="sidebar__collapsible">
    <span class="collapsible__trigger"><i class="sidebar__icon fa-solid fa-user-tie"></i>Staff <i class="sidebar__icon fa-solid fa-chevron-down"></i><span>
    <ul class="collapsible__links">
      <li class="sidebar__link"><a href="/admins">Admins</a></li>
      <li class="sidebar__link"><a href="/doctors">Doctors</a></li>
      <li class="sidebar__link"><a href="/assistants">Assitants</a></li>
    </ul>
    </li>
    <li class="sidebar__link"><a href="/patients"><i class="sidebar__icon fa-solid fa-user"></i>Patients</a></li>
    <li class="sidebar__link"><a href="/appointments"><i class="sidebar__icon fa-solid fa-calendar-check"></i>Appointments</a></li>
    <li class="sidebar__link"><a href="/treatments"><i class="sidebar__icon fa-solid fa-stethoscope"></i>Treatments</a></li>
    <li class="sidebar__link"><a href="/inventory"><i class="sidebar__icon fa-solid fa-warehouse"></i>Inventory</a></li>
    <li class="sidebar__link"><a href="/roles"><i class="sidebar__icon fa-regular fa-address-book"></i>Roles</a></li>
  </ul>

  <div class="sidebar__footer">
  <img class="footer__userImg" src="./views/public/admin.jpeg">
    <div class="footer__userinfo">
      <h3 class="userinfo__name">Capitán Perú</h3>
      <h3 class="userinfo__email">email@email.com</h3>
    </div>
  </div>
</nav>
`

// Doctors: Staff (Doctors, Assistants), Patients, Appointments, Treatments, Inventory
const htmlDoctor = 
`
<nav class="sidebar">
<div class="sidebar__header">
  <h1>MyClinic</h1>
</div>

  <ul class="sidebar__body">
    <li class="sidebar__dropdown">
    Staff
    <ul>
      <li><a href="/doctors">Doctors</a></li>
      <li><a href="/assistants">Assitants</a></li>
    </ul>
    </li>
    <li><a href="/patients">Patients</a></li>
    <li><a href="/appointments">Appointments</a></li>
    <li><a href="/treatments">Treatments</a></li>
    <li><a href="/inventory">Inventory</a></li>
  </ul>

  <div class="sidebar__footer">
  <img class="footer__userImg" src="">
    <div class="footer__userinfo">
      <h3 class="userinfo__name">John Doe</h3>
      <h3 class="userinfo__email">email@email.com</h3>
      <h3 class="userinfo__role">ROLE</h3>
    </div>
  </div>  
</nav>
`

// Assistants: Staff (Doctors, Assistants), Patients, Appointments, Treatments, Inventory
const htmlAssistant = 
`
<div class="sidebar__header">
  <h1>MyClinic</h1>
</div>

<nav class="sidebar">
  <ul class="sidebar__body">
    <li class="sidebar__dropdown">
    Staff
    <ul>
      <li><a href="/doctors">Doctors</a></li>
      <li><a href="/assistants">Assitants</a></li>
    </ul>
    </li>
    <li><a href="/patients">Patients</a></li>
    <li><a href="/appointments">Appointments</a></li>
    <li><a href="/treatments">Treatments</a></li>
    <li><a href="/inventory">Inventory</a></li>
  </ul>

    <div class="sidebar__footer">
  <img class="footer__userImg" src="">
    <div class="footer__userinfo">
      <h3 class="userinfo__name">John Doe</h3>
      <h3 class="userinfo__email">email@email.com</h3>
      <h3 class="userinfo__role">ROLE</h3>
    </div>
  </div>

</nav>
`

// Patients: Appointments Medic History
const htmlPatient = 
`
<nav class="sidebar">
  <div class="sidebar__header">
    <h1>MyClinic</h1>
  </div>

  <ul class="sidebar__body">
    <li><a href="/appointments">Appointments</a></li>
    <li><a href="/history">Medic history</a></li>
  </ul>

  <div class="sidebar__footer">
  <img class="footer__userImg" src="">
    <div class="footer__userinfo">
      <h3 class="userinfo__name">John Doe</h3>
      <h3 class="userinfo__email">email@email.com</h3>
      <h3 class="userinfo__role">ROLE</h3>
    </div>
  </div>
</nav>
`

const header = document.querySelector('.header');
const collapsibleTrigger = document.querySelector('.collapsible__trigger')

document.addEventListener('DOMContentLoaded', function() {
  switch (role) {
    case 1: 
    header.innerHTML = htmlPatient;
    break;
    case 2: 
    header.innerHTML = htmlAssistant;
    break;
    case 3:
    header.innerHTML = htmlDoctor;
    break;
    case 4:
    header.innerHTML = htmlAdmin;
    break;
  }
})



function collapsible() {

  // Click event when is clicked to show all links. 
collapsibleTrigger.addEventListener('click', () => {
  const links = document.querySelector('.collapsible__links');
  let isOpen = false;
  if (!isOpen) {
    links.style.display = 'block'
    isOpen = true;
  } else {
    links.style.display = 'none'
    isOpen = false;
  }
})
}



