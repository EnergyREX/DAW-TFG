<?php 

function renderModalInsert() {
    echo ('<div class="modal">
    <div class="modal__insert">
          <form class="modal__form">
          <button class="close__btn"><i class="fa-solid fa-x"></i></button>
            <h1>New appointment</h1>

            <div class="form__dni">
              <div class="form__input">
                <label for="dni">Doctor DNI</label>
                <input name="doctor_dni" id="doctor_dni" type="text" placeholder="00000000Z">
                <label for="patient_dni">Patient DNI</label>
                <input name="patient_dni" id="patient_dni" type="text" placeholder="00000000Z">
              </div>
            </div>

            <div class="form__input">
              <label for="hour">Hour</label>
              <input name="hour" id="hour" type="time" placeholder="00:00">

              <label for="hour">Date</label>
              <input name="hour" id="date" type="date">
            </div>

            <div class="form__input">
            <label for="status">Status</label>
            <select id="status" name="status">
              <option value="null">-- Select a status --</option>
              <option value="pending">Pending</option>
              <option value="confirmed">Confirmed</option>
              <option value="cancelled">Cancelled</option>
              <option value="completed">Completed</option>
            </select>
            </div>

            <div class="form__btns">
            <button class="btns__insert">Insert</button>
            <button class="btns__cancel">Cancel</button>
            </div>
          </form>
      </div>
  </div>');
}

function renderModalUpdate() {
    echo ('
        <div class="modal__update">
            <h1 class="modal__title">Modificar un dato</h1>
            <form class="modal__form">
            <button class="close__btn"><i class="fa-solid fa-x"></i></button>
              <h1>New appointment</h1>

              <div class="form__dni">
                <div class="form__input">
                  <label for="dni">Doctor DNI</label>
                  <input name="doctor_dni" id="doctor_dni" type="text" placeholder="00000000Z">
                  <label for="patient_dni">Patient DNI</label>
                  <input name="patient_dni" id="patient_dni" type="text" placeholder="00000000Z">
                </div>
              </div>

              <div class="form__input">
                <label for="hour">Hour</label>
                <input name="hour" id="hour" type="time" placeholder="00:00">

                <label for="hour">Date</label>
                <input name="hour" id="date" type="date">
              </div>

              <div class="form__input">
              <label for="status">Status</label>
              <select id="status" name="status">
                <option value="null">-- Select a status --</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
                <option value="completed">Completed</option>
              </select>
              </div>

              <div class="form__btns">
              <button class="btns__insert">Insert</button>
              <button class="btns__cancel">Cancel</button>
              </div>
            </form>
        </div>');
}

function renderDeleteModal() {
    echo ('<div class="modal__delete">
    <div class="modal__content">
      <button class="close__btn"><i class="fa-solid fa-x"></i></button>  
      <h1 class="modal__title-delete">¿Seguro que quieres eliminar esta entrada?</h1>
    <form class="modal__form" method="POST" action="./asistentes.php">
      <div class="form__btns">
      <button class="form__btn-delete" type="submit">Eliminar</button>
        <input type="hidden" value="delete" name="method">
        <input type="hidden" value="" name="dni" id="deleteId">
      </div>
    </form>
    </div>
  </div>');
}

?>