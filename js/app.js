let buscador = document.querySelector('.form-input');
let buscador_error = document.querySelector('.error');

function buscarDatos()
{

    let mensajesError = [];

    if (buscador.value == null || buscador.value == '')
    {
        mensajesError.push('Ingrese Pais, porfavor');
        return false;
    }

    buscador_error.innerHTML = mensajesError.join(', ');

}