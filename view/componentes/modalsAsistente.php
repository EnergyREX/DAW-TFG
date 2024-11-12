<?php 

function renderModalInsert() {
    echo ('<div class="modal__insert">
    <div class="modal__content">
        <h1 class="modal__title">Insertar un nuevo dato</h1>
        <button class="close__btn"><i class="fa-solid fa-x"></i></button>
        <form class="modal__form" action="./asistentes.php" method="post">
            <label class="form__label" for="dni">DNI</label>
            <input class="form__input" type="text" name="dni">
            
            <label class="form__label" for="nombre">Nombre</label>
            <input class="form__input" type="text" name="nombre">

            <label class="form__label" for="apellidos">Apellidos</label>
            <input class="form__input" type="text" name="apellidos">

            <label class="form__label" for="direccion">Dirección</label>
            <input class="form__input" type="text" name="direccion">

            <label class="form__label" for="telefono">Telefono</label>
            <input class="form__input" type="text" name="telefono">

            <label class="form__label" for="email">Email</label>
            <input class="form__input" type="text" name="email">

            <label class="form__label" for="password">Password</label>
            <input class="form__input" type="password" name="password">

            <label class="form__label" for="especialidad">Especialidad</label>
            <input class="form__input" type="text" name="especialidad">

            <label class="form__label" for="fecha_union">Fecha de Unión</label>
            <input class="form__input" type="date" name="fecha_union">

            <label class="form__label" for="disponibilidad">Disponibilidad</label>
            <input class="form__input" type="text" name="disponibilidad">
            <div class="form__btns">
                <button class="form__btn-submit" type="submit">Insertar</button>
            </div>
            
            <input type="hidden" value="insert" name="method">
        </form>
    </div>
</div>');
}

function renderModalUpdate() {
    echo ('<div class="modal__update">
        <div class="modal__content">
            <h1 class="modal__title">Modificar un dato</h1>
            <button class="close__btn"><i class="fa-solid fa-x"></i></button>
            <form class="modal__form" action="./asistentes.php" method="post">

                <label class="form__label" for="dni">DNI</label>
                <input class="form__input" type="text" name="dni">
                
                <label class="form__label" for="nombre">Nombre</label>
                <input class="form__input" type="text" name="nombre">

                <label class="form__label" for="apellidos">Apellidos</label>
                <input class="form__input" type="text" name="apellidos">

                <label class="form__label" for="direccion">Dirección</label>
                <input class="form__input" type="text" name="direccion">

                <label class="form__label" for="telefono">Telefono</label>
                <input class="form__input" type="text" name="telefono">

                <label class="form__label" for="email">Email</label>
                <input class="form__input" type="text" name="email">

                <label class="form__label" for="especialidad">Especialidad</label>
                <input class="form__input" type="text" name="especialidad">

                <label class="form__label" for="fecha_union">Fecha de Unión</label>
                <input class="form__input" type="date" name="fecha_union">

                <label class="form__label" for="disponibilidad">Disponibilidad</label>
                <input class="form__input" type="text" name="disponibilidad">
                
                <div class="form__btns">
                    <button class="form__btn-update" type="submit">Update</button>
                </div>
                
                <input type="hidden" value="update" name="method">
                <input type="hidden" value="" name="dni_old" id="updateId">
            </form>
        </div>
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