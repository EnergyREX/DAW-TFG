<?php 

function renderModalInsert() {
    echo ('
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
            <button class="btns__confirm--insert">Confirm</button>
            <button class="btns__cancel">Cancel</button>
            </div>
          </form>
      </div>');
}

function renderModalUpdate() {
    echo ('
        <div class="modal__update">
            <form class="modal__form">
            <button class="close__btn"><i class="fa-solid fa-x"></i></button>
              <h1>Update an Appointment</h1>

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
              <button class="btns__confirm--update">Confirm</button>
              <button class="btns__cancel">Cancel</button>
              </div>
            </form>
        </div>');
}

function renderModalDelete() {
    echo ('
    <div class="modal__delete">
            <form class="modal__form">
            <button class="close__btn"><i class="fa-solid fa-x"></i></button>
              <h1>Confirm appointment deletion</h1>
              <p>You cannot revert this.</p>

              <div class="form__btns">
              <button class="btns__confirm--delete">Confirm</button>
              <button class="btns__cancel">Cancel</button>
              </div>
            </form>
        </div>');
}

?>