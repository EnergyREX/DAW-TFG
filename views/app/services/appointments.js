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
    <thead>
      <tr> 
        <td>ID</td>
        <td>Patient DNI</td>
        <td>Doctor DNI</td>
        <td>Hour</td>
        <td>Date</td>
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
          <button onclick="{OpenUpdate()}" type="button"><i class="fa-solid fa-pen-to-square"></i></button> 
          <button onclick="{OpenDelete()}" type="button"><i class="fa-solid fa-trash"></i></button>
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

function closeModal() {
  modalInsertContainer.style.display = "none";
  modalDeleteContainer.style.display = "none";
  modalUpdateContainer.style.display = "none";
  isOpenModal = false;
}

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
function OpenDelete() {
  if(!isOpenModal) {
    modalDeleteContainer.style.display = "flex";
    isOpenModal = true;
  } else if (isOpenModal) {
    modalDeleteContainer.style.display = "none";
    isOpenModal = false;
  }
}

const cancelBtns = document.querySelectorAll('.btns__cancel')

cancelBtns.forEach(cancelBtn => {
  cancelBtn.addEventListener('click', (event) => {
    event.preventDefault();
    closeModal()
  });
});

const closeBtns = document.querySelectorAll('.close__btn')

closeBtns.forEach(closeBtn => {
  closeBtn.addEventListener('click', (event) => {
    event.preventDefault();
    closeModal()
  });
});

document.querySelector('.btns__insert').addEventListener('click', (event) => {
  event.preventDefault();
  
});