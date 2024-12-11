
let isOpenModal = false;

// Closes all modals
function closeModal() {
  modalInsertContainer.style.display = "none";
  modalDeleteContainer.style.display = "none";
  modalUpdateContainer.style.display = "none";
  isOpenModal = false;
}

// Insert data (shows modal)
function OpenInsert() {
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
    modalUpdateContainer.style.display = "flex";
    isOpenModal = true;
  } else if (isOpenModal) {
    modalUpdateContainer.style.display = "none";
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

// Select all the cancel buttons and create an event for each
const cancelBtns = document.querySelectorAll('.btns__cancel')
cancelBtns.forEach(cancelBtn => {
  cancelBtn.addEventListener('click', (event) => {
    event.preventDefault();
    closeModal()
  });
});

// Select all close buttons and create an event for each
const closeBtns = document.querySelectorAll('.close__btn')
closeBtns.forEach(closeBtn => {
  closeBtn.addEventListener('click', (event) => {
    event.preventDefault();
    closeModal()
  });
});