const citas = document.querySelector('.citas__chart');
const doctores = document.querySelector('.doctores__chart')
const pacientes = document.querySelector('.pacientes__chart')

  new Chart(citas, {
    type: 'doughnut',
    data: {
      datasets: [{
        label: 'Número de citas',
        data: [100],
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
        data: [100],
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
        data: [100],
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