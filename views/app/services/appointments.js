const dataTable = document.querySelector('.data__table')

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
        <td>Id</td>
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
        <td>${data.id}</td>
        <td>${data.patient_dni}</td>
        <td>${data.doctor_dni}</td>
        <td>${data.hour}</td>
        <td>${data.status}</td>
        <td>
          <button><i class="fa-solid fa-pen-to-square"></i></button> 
          <button><i class="fa-solid fa-trash"></i></button>
        </td>
      </tr>`)}
    </tbody>
    `
    dataTable.innerHTML = tableHTML;
  } catch {
    dataTable.innerHTML = "Error al cargar los datos.";
  }
})
