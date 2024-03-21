const form = document.getElementsByTagName("form")[0];

const email = document.getElementById("email");
const password = document.getElementById("password");


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

  function showError(){
    if (!email.validity.valid || !password.validity.valid){
        alert("Usuario o contraseña incorrectos");
    }
  }