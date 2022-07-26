const formulario = document.getElementById("formulario"); //Accedemos al formulario
const input = document.querySelectorAll("#formulario input"); //Almacenamos los inputs en una variable
const select = document.querySelectorAll("#formulario select");
const date = document.querySelectorAll("#formulario date");
const textarea = document.querySelectorAll("#formulario textarea");
const expresiones = {
  nombre: /^[a-zA-ZÀ-ÿ\s]{3,15}$/,
  apellido: /^[a-zA-ZÀ-ÿ\s]{1,15}$/,
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^[2389]+\d{1,8}$/, //
  identidad:
    /^[01]{1}[0-8]{1}[012]{1}[\d]{1}[12]{1}[09]{1}[012789]{1}[\d]{1}[\d]{5}$/,
  direccion: /^[a-zA-ZÀ-ÿ0-9\s.,#-]{1,50}$/,
  cuentaBan: /^\d{8,15}$/,
  DescripcionCargo: /^[a-zA-ZÀ-ÿ\s.,#]{5,30}$/,
  Salario: /^\d+$/,
  DescripcionCiudad: /^[a-zA-ZÀ-ÿ\s.,#]{5,30}$/,
  DescripcionDepto: /^[a-zA-ZÀ-ÿ\s.,#]{5,30}$/,
  nombrec: /^[a-zA-ZÀ-ÿ\s]{12,50}$/,
  mensaje: /^[a-zA-ZÀ-ÿ0-9\s.,#-]{8,150}$/,
  contraseña: /^.{8,15}$/,
  user: /^[a-zA-Z0-9]{4,12}$/,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "Cedula":
      validarCampo(expresiones.identidad, e.target, "identidad");
      break;
    case "PrimerNombre":
      validarCampo(expresiones.nombre, e.target, "primerNombre");
      break;

    case "PrimerApellido":
      validarCampo(expresiones.apellido, e.target, "primerApellido");
      break;

    case "Correo":
      validarCampo(expresiones.correo, e.target, "correo");
      break;

    case "Telefono":
      validarCampo(expresiones.telefono, e.target, "telefono");
      break;

    case "Direccion":
      validarCampo(expresiones.direccion, e.target, "Direccion");
      break;

    case "CuentaBancaria":
      validarCampo(expresiones.cuentaBan, e.target, "cuentaBan");
      break;

    case "DescripcionCargo":
      validarCampo(expresiones.DescripcionCargo, e.target, "DescripcionCargo");
      break;

    case "Salario":
      validarCampo(expresiones.Salario, e.target, "Salario");
      break;

    case "DescripcionCiudad":
      validarCampo(
        expresiones.DescripcionCiudad,
        e.target,
        "DescripcionCiudad"
      );
      break;

    case "DescripcionDepto":
      validarCampo(expresiones.DescripcionDepto, e.target, "DescripcionDepto");
      break;

    case "Departamentos_idDepartamentos":
      validarSelect("Departamentos_idDepartamentos");
      break;

    case "Ciudades_idCiudades":
      validarSelect("Ciudades_idCiudades");
      break;

    case "Cargos_idCargos":
      validarSelect("Cargos_idCargos");
      break;

    case "FechaNacimiento":
      validarFecha("FechaNacimiento");
      break;

    case "Departamentos_idDepartamentos":
      validarSelect("Departamentos_idDepartamentos");
      break;

    case "nombre_contactanos":
      validarCampo(expresiones.nombrec, e.target, "nombre_contactanos");
      break;

    case "Mensaje":
      validarCampo(expresiones.mensaje, e.target, "Mensaje");
      break;
    case "contraseña":
      validarCampo(expresiones.mensaje, e.target, "contraseña");
      break;
    case "contraseña2":
      validarContraseña2();
      break;
    case "NombreUsuario":
      validarCampo(expresiones.user, e.target, "Usuario");
      break;
    case "contraseñaU":
      validarCampo(expresiones.contraseña, e.target, "contraseñaU");
      break;
    case "Empleado_idEmpleados":
      validarSelect("Empleado_idEmpleados");
      break;
  }
};
const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
  } else {
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
  }
};

const validarContraseña2 = () => {
  const inputContraseña1 = document.getElementById("contraseña");
  const inputContraseña2 = document.getElementById("contraseña2");

  if (inputContraseña1.value !== inputContraseña2.value) {
    document
      .getElementById(`grupo__contraseña2`)
      .classList.add("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__contraseña2 .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
  } else {
    document
      .getElementById(`grupo__contraseña2`)
      .classList.remove("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__contraseña2 .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
  }
};

const validarSelect = (select) => {
  var seleccion = document.getElementById(`${select}`);
  if (seleccion.value == 0 || seleccion == "") {
    document
      .getElementById(`grupo__${select}`)
      .classList.add("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__${select} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
  } else {
    document
      .getElementById(`grupo__${select}`)
      .classList.remove("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__${select} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
  }
};

const validarFecha = (date) => {
  var fecha = document.getElementById(`${date}`);
  if (fecha.value == "") {
    document
      .getElementById(`grupo__${date}`)
      .classList.add("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__${date} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
  } else {
    document
      .getElementById(`grupo__${date}`)
      .classList.remove("formulario__grupo-incorrecto");
    document
      .querySelector(`#grupo__${date} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
  }
};

input.forEach((input) => {
  input.addEventListener("keyup", validarFormulario); //Valida cada tecla apretada
  input.addEventListener("blur", validarFormulario);
});

select.forEach((select) => {
  select.addEventListener("blur", validarFormulario);
});

date.forEach((date) => {
  date.addEventListener("blur", validarFormulario);
});
function upperCase(input) {
  var x = document.getElementById(input).value;
  document.getElementById(input).value = x.toUpperCase();
}
function lowerCase(input) {
  var x = document.getElementById(input).value;
  document.getElementById(input).value = x.toLowerCase();
}
function soloLetras(e) {
  let key = e.keyCode || e.wich;
  let teclado = String.fromCharCode(key).toUpperCase();
  let letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ ÁÉÍÓÚ";
  let especiales = [8, 37, 38, 46, 164];
  let teclado_especial = false;
  for (let i in especiales) {
    if (key == especiales[i]) {
      teclado_especial = true;
      break;
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
      return false;
    }
  }
}

function soloLetrasYespeciales(e) {
  let key = e.keyCode || e.wich;
  let teclado = String.fromCharCode(key).toUpperCase();
  let letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ ÁÉÍÓÚ.#,- 1234567890";
  let especiales = [8, 37, 38, 46, 164];
  let teclado_especial = false;
  for (let i in especiales) {
    if (key == especiales[i]) {
      teclado_especial = true;
      break;
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
      return false;
    }
  }
}

function soloNumeros(e) {
  let key = e.keyCode || e.wich;
  let teclado = String.fromCharCode(key).toUpperCase();
  let letras = "1234567890";
  let especiales = [8, 37, 38, 46, 164];
  let teclado_especial = false;
  for (let i in especiales) {
    if (key == especiales[i]) {
      teclado_especial = true;
      break;
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
      return false;
    }
  }
}

function soloNumerosE(e) {
  let key = e.keyCode || e.wich;
  let teclado = String.fromCharCode(key).toUpperCase();
  let letras = "1234567890.";
  let especiales = [8, 37, 38, 46, 164];
  let teclado_especial = false;
  for (let i in especiales) {
    if (key == especiales[i]) {
      teclado_especial = true;
      break;
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
      return false;
    }
  }
}
