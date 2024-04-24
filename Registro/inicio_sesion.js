const form = document.getElementsByTagName("form")[0];

const email = document.getElementById("email");
const password = document.getElementById("password");

//Comprobación de que email y contraseña cumplen los requisitos de campo
form.addEventListener("submit", function (event) {
    if (!email.validity.valid) {
      showError();
      event.preventDefault();
    }
    if (!password.validity.valid){
      showError();
      event.preventDefault();
    }
});
  //Muestra del error
  function showError(){
    if (!email.validity.valid || !password.validity.valid){
        alert("Usuario o contraseña incorrectos");
    }
  }