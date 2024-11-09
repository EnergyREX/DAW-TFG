const btnInsert = document.querySelector(".insert__btn");
const insertModal = document.querySelector(".modal__insert");
let isOpenInsert = false;

const btnsUpdate = document.querySelectorAll(".update__btn");
const updateModal = document.querySelector(".modal__update");
const idUpdate = document.getElementById("updateId");
let isOpenUpdate = false;

const btnsDelete = document.querySelectorAll(".delete__btn");
const deleteModal = document.querySelector(".modal__delete");
const idDelete = document.getElementById("deleteId");
let isOpenDelete = false;

const closeBtns = document.querySelectorAll(".close__btn");
const cancelBtns = document.querySelectorAll(".form__btn-cancel")

closeBtns.forEach(cBtn => {
    cBtn.addEventListener("click", () =>  {
        insertModal.style.display = "none";
        isOpenInsert = false;
      
        updateModal.style.display = "none"
        isOpenUpdate = false;

        deleteModal.style.display = "none"
        isOpenDelete = false;
    })
})

document.addEventListener('DOMContentLoaded', () => {
  const cancelBtn = document.querySelector('.form__btn-cancel');
  
  if (cancelBtn) {
    cancelBtn.addEventListener('click', (event) => {
      event.preventDefault();
      console.log("Cancel button clicked. Preventing form submission.");
    });
  }
});



btnInsert.addEventListener("click", () => {
  if (!isOpenInsert) {
    insertModal.style.display = "flex";
    isOpenInsert = true;
  } else {
    insertModal.style.display = "none";
    isOpenInsert = false;
  }
})

btnsUpdate.forEach(btn => {
  btn.addEventListener("click", () => {
    idUpdate.value = btn.getAttribute("data-id")
    if (!isOpenDelete) {
        updateModal.style.display = "flex";
        isOpenUpdate = true;
      } else {
        updateModal.style.display = "none";
        isOpenUpdate = false;
      }
  })
})

btnsDelete.forEach(btn => {
    btn.addEventListener("click", () => {
        idDelete.value = btn.getAttribute("data-id")
      if (!isOpenDelete) {
          deleteModal.style.display = "flex";
          isOpenDelete = true;
        } else {
          deleteModal.style.display = "none";
          isOpenDelete = false;
        }
    })
  })