const citas = document.querySelector('.citas__chart');
const doctores = document.querySelector('.doctores__chart')
const pacientes = document.querySelector('.pacientes__chart')

let numCitas;
let numDoctores;
let numPacientes;

  new Chart(citas, {
    type: 'doughnut',
    data: {
      datasets: [{
        label: 'Número de citas',
        data: [10],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        legend: {
          display: true,
          position: 'top'
        }
      },
      scales: {
        x: {
          display: false
        },
        y: {
          display: false
        }
      }
    }
  });


  new Chart(doctores, {
    type: 'doughnut',
    data: {
      datasets: [{
        label: 'Número de doctores',
        data: [10],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        legend: {
          display: true,
          position: 'top'
        }
      },
      scales: {
        x: {
          display: false
        },
        y: {
          display: false
        }
      }
    }
  });


  new Chart(pacientes, {
    type: 'doughnut',
    data: {
      datasets: [{
        label: 'Número de pacientes',
        data: [10],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        legend: {
          display: true,
          position: 'top'
        }
      },
      scales: {
        x: {
          display: false
        },
        y: {
          display: false
        }
      }
    }
  });