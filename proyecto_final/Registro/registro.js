const form = document.getElementsByTagName("form")[0];

const nombre_completo = document.getElementById("nombre_completo");
const nombreError = document.querySelector("#nombre_completo + span.errorn");
const email = document.getElementById("email");
const emailError = document.querySelector("#email + span.error");
const repeat_email = document.getElementById("repeat_email");
const email2Error = document.querySelector("#repeat_email + span.error2");
const password = document.getElementById("password");
const pError = document.querySelector("#password + span.errorp");
const repeat_password = document.getElementById("repeat_password");
const pError2 = document.querySelector("#repeat_password + span.errorp2");

email.addEventListener("input", function (event) {

  if (email.validity.valid) {

    emailError.innerHTML = "";
    emailError.className = "error";
  } else {
    showError();
  }
});

form.addEventListener("submit", function (event) {
  if (!email.validity.valid) {
    showError();
    event.preventDefault();
  }
  if (repeat_email.value != email.value) {
    showError2();
    event.preventDefault();
  }
  if (!password.validity.valid){
    showError3();
    event.preventDefault();
  }
  if (password.value != repeat_password.value){
    showError4();
    event.preventDefault();
  }
  if (nombre_completo.value.length <= 0) {
    showErrorN();
    event.preventDefault();
  }
});

function showError() {
  if (email.validity.valueMissing) {
    emailError.textContent = "Debe introducir una dirección de correo electrónico.";
  } else if (email.validity.typeMismatch) {
    emailError.textContent = "El valor introducido debe ser una dirección de correo electrónico.";
  } else if (email.validity.tooShort) {
    emailError.textContent = `El correo electrónico debe tener al menos ${email.minLength} caracteres; ha introducido ${email.value.length}.`;
  }

  emailError.className = "error activo";
}

repeat_email.addEventListener("input", function(event) {
    if(repeat_email.value == email.value) {
        email2Error.innerHTML = "";
        email2Error.className = "error2";
    } else {
        showError2();
    }
});

function showError2() {
    if(repeat_email.value != email.value){
        email2Error.textContent = "Las dos direcciones deben ser iguales";
    }
    email2Error.className = "error2 activo";
}

password.addEventListener("input", function(event) {
    if(password.validity.valid){
        pError.innerHTML = "";
        pError.className = "error";
    } else {
        showError3();
    }
});

function showError3() {
    if (password.validity.valueMissing) {
        pError.textContent = "Debe introducir una contraseña.";
    } else if (password.validity.typeMismatch) {
        pError.textContent = "El valor introducido no puede contener esos caracteres.";
    } else if (password.validity.tooShort) {
        pError.textContent = `La contraseña debe tener al menos ${password.minLength} caracteres; ha introducido ${password.value.length}.`;
    }
    
      emailError.className = "error3 activo";
}

repeat_password.addEventListener("input", function(event) {
    if(repeat_password.value == password.value) {
        pError2.innerHTML = "";
        pError2.className = "error";
    } else {
        showError4();
    }
});

function showError4() {
    if(repeat_password.value != password.value){
        pError2.textContent = "Las dos contraseñas deben ser iguales.";
    }
    pError2.className = "error4 activo";
}

nombre_completo.addEventListener("input", function (event) {
    if (nombre_completo.value.length > 0) {
        nombreError.innerHTML = "";
        nombreError.className = "error";
    } else {
        showErrorN();
    }
});

function showErrorN() {
    if (nombre_completo.value.length <= 0) {
        nombreError.textContent = "Debe introducir un nombre.";
    }
    nombreError.className = "errorn activo";
}
