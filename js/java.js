$(function () {
    getAllAnimals();

    //ALERTA PARA EL REGISTRO
    function mostrarAlertaCorreoExistente() {
        alert("El correo ya está registrado.");
        window.location.href = 'registro.php';
    }

    //FUNCIONES PARA EL CRUD DE ANIMALES EN ADMIN DASHBOAR

    $("#BuscarAnimal").keyup(() => {
        let search = $("#BuscarAnimal").val();

        if (search) {
            $.ajax({
                url: "actions/buscarAnimal.php",
                data: { search },
                type: "POST",
                success: function (response) {
                    if (!response.error) {
                        console.log(JSON.parse(response));
                        let animales = JSON.parse(response);
                        let respuesta = ``;
                        animales.forEach(element => {
                            respuesta += `
                                <tr idAnimal=${element.ID_Animal}>
                                    <td>${element.ID_Animal}</td>
                                    <td>${element.Nombre}</td>
                                    <td>${element.Raza}</td>
                                    <td>${element.Especie}</td>
                                    <td>${element.Apadrinado}</td>
                                    <td>
                                        <button class="btn-editar" data-id="${element.ID_Animal}">Editar</button>
                                        <button class="btn-eliminar" data-id="${element.ID_Animal}">Eliminar</button>
                                    </td>
                                </tr>
                            `;
                        });

                        $("#bodyTabla").html(respuesta);
                    }
                }
            });
        } else {
            // Si el campo de búsqueda está vacío, limpia el contenido de la tabla

            getAllAnimals();

        }


    });

    function getAllAnimals() {
        $.post("actions/obtenerAnimales.php", {
            action: 'getAll',
        },
            function (data, status) {
                let response = JSON.parse(data);
                if ($("#bodyTabla tr").length === 0) {
                    $("#bodyTabla").html('<tr><td colspan="6">No hay animales disponibles</td></tr>');
                }
                if (response.status === '00') {
                    console.log(response);
                    let respuesta = '';
                    response.animales.forEach((element) => {
                        respuesta += `
                        <tr idAnimal="${element.ID_Animal}">
                            <td>${element.ID_Animal}</td>
                            <td>${element.Nombre}</td>
                            <td>${element.Raza}</td>
                            <td>${element.Especie}</td>
                            <td>${element.Apadrinado}</td>
                            <td>
                                <button class="btn-editar" id="btnEditar" data-id="${element.ID_Animal}">
                                    Editar
                                </button>
                                <button class="btn-eliminar" data-id="${element.ID_Animal}">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    });
                    console.log(respuesta);
                    $("#bodyTabla").html(respuesta || '<tr><td colspan="6">No hay animales disponibles</td></tr>');
                }
            });
    }

    //ELIMINAR ANIMALES
    $(document).on("click", ".btn-eliminar", function () {
        if (confirm("¿Deseas eliminar el animal?")) {
            const row = $(this).closest('tr');
            const id = row.attr("idAnimal");

            $.post("actions/obtenerAnimales.php", { action: 'delete', id: id }, function (response) {
                let data = JSON.parse(response);

                if (data.status === "00") {
                    alert(data.message);
                    row.remove();


                    if ($("#bodyTabla tr").length === 0) {
                        $("#bodyTabla").html('<tr><td colspan="6">No hay animales disponibles</td></tr>');
                    }
                } else {
                    alert(data.message);
                }
            });
        }
    });


    $(document).on("click", ".btn-editar", function () {
        const element = $(this).closest('tr');
        const idAnimal = element.attr("idAnimal");

        // Redirige a la página de edición con el ID del animal en la URL
        window.location.href = `editarAnimal2.php?idAnimal=${idAnimal}`;
    });

   
    //ACTUALIZAR EL ANIMAL

    // Llama a la función para obtener todos los animales
    getAllAnimals();

}

);


//VALIDACIONES DEL FORMULARIO DE DONACIONES
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-donaciones');
    form.addEventListener('submit', (e) => {
        let valid = true;

    // Validar el campo nombre
    const nombre = document.getElementById('nombre');
    if (nombre.value.trim() === '') {
        alert('Por favor ingresa tu nombre completo.');
        valid = false;
    }

    // Validar correo electrónico
    const correo = document.getElementById('correo');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(correo.value)) {
        alert('Por favor ingresa un correo electrónico válido.');
        valid = false;
    }

    // Validar teléfono
    const telefono = document.getElementById('telefono');
    const telefonoRegex = /^[0-9]{8,15}$/;
    if (!telefonoRegex.test(telefono.value)) {
        alert('Por favor ingresa un número de teléfono válido.');
        valid = false;
    }

    // Validar cantidad
    if (cantidadSelect.value === 'otra' && otraCantidadInput.value === '') {
        alert('Por favor especifica una cantidad válida.');
        valid = false;
    }

    if (!valid) {
        e.preventDefault(); // Evitar el envío si no es válido
    }
});
});