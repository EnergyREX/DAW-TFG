const dataTable = document.querySelector('.data__table')
const modalInsertContainer = document.querySelector('.modal')
const modalUpdateContainer = document.querySelector('.')

const xhttp = new XMLHttpRequest();

xhttp.open("GET", "http://localhost/appointments/getAll")
xhttp.send();

// Renders the table
xhttp.addEventListener('load', function() {
  try {
    console.log(JSON.parse(this.responseText))
    const responseData = JSON.parse(this.responseText)
    tableHTML = `
    <thead>
      <tr> 
        <td>ID</td>
        <td>Patient DNI</td>
        <td>Doctor DNI</td>
        <td>Hour</td>
        <td>Status</td>
        <td>Action</td>
      </tr> 
    </thead>
    <tbody>
    ${responseData.map(data => `
      <tr>
        <td class="data__cell--id">${data.id}</td>
        <td class="data__cell--patient">${data.patient_dni}</td>
        <td class="data__cell--doctor">${data.doctor_dni}</td>
        <td class="data__cell--hour">${data.hour}</td>
        <td class="data__cell--date">${data.date}</td>
        <td class="data__cell--status">${data.status}</td>
        <td>
          <button onclick="{Openinsert()}" type="button"><i class="fa-solid fa-pen-to-square"></i></button> 
          <button onclick="{Opendelete()}" type="button"><i class="fa-solid fa-trash"></i></button>
        </td>
      </tr>`)}
    </tbody>
    `
    dataTable.innerHTML = tableHTML;
  } catch {
    dataTable.innerHTML = "Error al cargar los datos.";
  }
})

isOpenModal = false;

document.querySelector('.btns__cancel').addEventListener('click', (event) => {
  event.preventDefault();
  Openinsert()
});

document.querySelector('.close__btn').addEventListener('click', (event) => {
  event.preventDefault();
  Openinsert()
});

// Insert data (shows modal)
function Openinsert() {
  if (!isOpenModal) {
    modalInsertContainer.style.display = "flex";
    isOpenModal = true;
  } else if (isOpenModal) {
    modalInsertContainer.style.display = "none";
    isOpenModal = false;
  }
}

document.querySelector('.btns__insert').addEventListener('click', (event) => {
  event.preventDefault();
  
});

// Update data (shows modal)
function OpenUpdate() {
  if (!isOpenModal) {
    modalInsertContainer.style.display = "flex";
    isOpenModal = true;
  } else if (isOpenModal) {
    modalInsertContainer.style.display = "none";
    isOpenModal = false;
  }
}


// Delete data (shows modal)