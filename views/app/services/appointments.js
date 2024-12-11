const dataTable = document.querySelector('.main__table')
const modalInsertContainer = document.querySelector('.modal__insert')
const modalUpdateContainer = document.querySelector('.modal__update')
const modalDeleteContainer = document.querySelector('.modal__delete')

const xhttp = new XMLHttpRequest();

xhttp.open("GET", "http://localhost/appointments/getAll")
xhttp.send();

// Renders the table
xhttp.addEventListener('load', function() {
  try {
    console.log(JSON.parse(this.responseText))
    const responseData = JSON.parse(this.responseText)
    tableHTML = `
      <tr class="table__head"> 
        <td>ID</td>
        <td>Patient DNI</td>
        <td>Doctor DNI</td>
        <td>Hour</td>
        <td>Date</td>
        <td>Status</td>
        <td>Action</td>
      </tr> 
    ${responseData.map(data => `
      <tr>
        <td class="data__cell--id">${data.id}</td>
        <td class="data__cell--patient">${data.patient_dni}</td>
        <td class="data__cell--doctor">${data.doctor_dni}</td>
        <td class="data__cell--hour">${data.hour}</td>
        <td class="data__cell--date">${data.date}</td>
        <td class="data__cell--status">${data.status}</td>
        <td>
          <button class="action__update" onclick="{OpenUpdate()}" value="${data.id}" type="button"><i class="fa-solid fa-pen-to-square"></i></button> 
          <button class="action__delete" onclick="{OpenDelete()}" value="${data.id}" type="button"><i class="fa-solid fa-trash"></i></button>
        </td>
      </tr>`)}
    `
    dataTable.innerHTML = tableHTML;
  } catch {
    dataTable.innerHTML = "Error al cargar los datos.";
  }
})

// Manage the POST (adding a new) appointment.

function postAppointment() {
  const form = document.getElementById('insertForm')
  const formData = new FormData(form);
  const xhttp = new XMLHttpRequest();

  xhttp.onload = function() {
    if (xhttp.status === 200) {
      // El servidor respondió correctamente
      console.log('Respuesta del servidor: ', xhttp.responseText);
      // Aquí puedes realizar acciones adicionales, como mostrar un mensaje al usuario
    } else {
      // El servidor respondió con un error
      console.error('Error en la solicitud: ', xhttp.status, xhttp.statusText);
    }
  };

  console.log(formData)
  xhttp.open('POST', "http://localhost/appointments/new");
  xhttp.send(formData);
}

// Adding an event listener when clicked.
const confirmInsert = document.querySelector('.btns__confirm--insert');
confirmInsert.addEventListener('click', (event) => {
  event.preventDefault();
  postAppointment();
})

