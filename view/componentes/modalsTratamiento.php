<?php 

function renderModalInsert() {
    echo ('<div class="modal__insert">
    <div class="modal__content">
        <h1 class="modal__title">Insertar un nuevo dato</h1>
        <button class="close__btn"><i class="fa-solid fa-x"></i></button>
        <form class="modal__form" action="./tratamientos.php" method="post"> 
            <label class="form__label" for="nombre">Nombre</label>
            <input class="form__input" type="text" name="nombre">
            
            <label class="form__label" for="precio">Precio</label>
            <input class="form__input" type="number" name="precio">
            
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
            <h1 class="modal__title">Insertar un nuevo dato</h1>
            <button class="close__btn"><i class="fa-solid fa-x"></i></button>
            <form class="modal__form" action="./tratamientos.php" method="post">
            
                <label class="form__label" for="nombre">Nombre</label>
                <input class="form__input" type="text" name="nombre">
                
                <label class="form__label" for="precio">Precio</label>
                <input class="form__input" type="number" name="precio">
                
                <div class="form__btns">
                    <button class="form__btn-update" type="submit">Update</button>
                </div>
                
                <input type="hidden" value="update" name="method">
                <input type="hidden" value="" name="id" id="updateId">
            </form>
        </div>
       </div>');
}

function renderDeleteModal() {
    echo ('<div class="modal__delete">
    <div class="modal__content">
      <button class="close__btn"><i class="fa-solid fa-x"></i></button>  
      <h1 class="modal__title-delete">¿Seguro que quieres eliminar esta entrada?</h1>
    <form class="modal__form" method="POST" action="./tratamientos.php">
      <div class="form__btns">
      <button class="form__btn-delete" type="submit">Eliminar</button>
      <input type="hidden" value="delete" name="method">
      <input type="hidden" value="" name="id" id="deleteId">
      </div>
    </form>
    </div>
  </div>');
}

?>