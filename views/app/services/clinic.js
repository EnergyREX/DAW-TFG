const baseURL = 'http://localhost';

async function getData(route, data = {}) {
  let url = `${baseURL}${route}`
  try {
    const res = await fetch(url, {
      method: 'GET',
      mode: 'no-cors',
    })
  } catch (e) {
    console.log(e);
  }
}

console.log("clinic.js");
