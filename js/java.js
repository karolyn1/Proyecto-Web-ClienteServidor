$(function () {
    $("#tablaTodosPadrinos").hide();
    getAllAnimals();
    getPadrinosActivos();
    getPadrinos();
    getAnimalesDisponibles();
    getClientes();
    getAdmin();
    //ALERTA PARA EL REGISTRO
    function mostrarAlertaCorreoExistente() {
        alert("El correo ya está registrado.");
        window.location.href = 'registro.php';
    }

    //-----------------------------------------------------
    //GESTION DE PADRINOS 
    //OBTENER
    function getPadrinosActivos() {
        $.post("actions/accionesApadrinamientos.php", {
            action: 'mostrar',
        },
            function (data, status) {
                let response = JSON.parse(data);
                if ($("#bodyPadrinos tr").length === 0) {
                    $("#bodyPadrinos").html('<tr><td colspan="8">No hay apadrinamientos activos</td></tr>');
                }
                if (response.status === '00') {
                    console.log(response);
                    let respuesta = '';
                    response.padrinos.forEach((element) => {
                        respuesta += `
                    <tr id="${element.ID}">
                        <td>${element.NombreAnimal}</td>
                        <td>${element.Raza}</td>
                        <td>${element.NombrePadrino}</td>
                        <td>${element.FechaApadrinamiento}</td>
                        <td>${element.FechaFin}</td>
                        <td>$${element.Monto}</td>
                        <td>${element.Frecuencia}</td>
                        <td>
                            <button class="btn-editar" id="btnEditarPadrino" data-id="${element.ID}">
                                Editar
                            </button>
                            <button class="btn-eliminar" id="btnEliminarPadrino" data-id="${element.ID}">Eliminar</button>
                        </td>
                    </tr>
                `;
                    });
                    console.log(respuesta);
                    $("#bodyPadrinos").html(respuesta || '<tr><td colspan="8">No hay apadrinamientos activos disponibles</td></tr>');
                }
            });
    }

    function getPadrinos() {
        $.post("actions/accionesApadrinamientos.php", {
            action: 'mostrarTodos',
        },
            function (data, status) {
                let response = JSON.parse(data);
                if ($("#bodyPadrinosTodos tr").length === 0) {
                    $("#bodyPadrinosTodos").html('<tr><td colspan="8">No hay apadrinamientos registrados</td></tr>');
                }
                if (response.status === '00') {
                    console.log(response);
                    let respuesta = '';
                    response.padrinos.forEach((element) => {
                        respuesta += `
    <tr id="${element.ID}">
        <td>${element.NombreAnimal}</td>
        <td>${element.Raza}</td>
        <td>${element.NombrePadrino}</td>
        <td>${element.FechaApadrinamiento}</td>
        <td>${element.FechaFin}</td>
        <td>$${element.Monto}</td>
        <td>${element.Frecuencia}</td>
        <td estado="${element.Estado}">
            ${element.Estado !== "0" ? `
                <button class="btn-editar" id="btnEditarPadrino" data-id="${element.ID}">
                    Editar
                </button>
                <button class="btn-eliminar" id="btnEliminarPadrino" data-id="${element.ID}">
                    Eliminar
                </button>
            ` : ''}
        </td>
    </tr>
`;

                    });
                    console.log(respuesta);
                    $("#bodyPadrinosTodos").html(respuesta || '<tr><td colspan="8">No hay apadrinamientos registrados</td></tr>');
                }
            });
    }

    //FILTROS

    $(document).on('click', '#padrinosActivos', function
        () {
        $("#tablaPadrinos").show();
        $("#tablaTodosPadrinos").hide();
    }
    );

    $(document).on('click', '#todosPadrinos', function
        () {
        $("#tablaPadrinos").hide();
        $("#tablaTodosPadrinos").show();
    }
    );


    //IR A LA PAGINA DE EDITAR
    $(document).on("click", "#btnEditarPadrino", function () {
        const element = $(this).closest('tr');
        const ID = element.attr("ID");

        // Redirige a la página de edición con el ID del animal en la URL
        window.location.href = `./editarApadrinamiento.php?ID=${ID}`;
    });

    //ELIMINAR APADRINAMIENTO
    $(document).on('click', "#btnEliminarPadrino", function () {
        $.post("actions/accionesApadrinamientos.php", {
            action: 'eliminar',
            id: $(this).data('id')
        }, function (data, status) {
            let response = JSON.parse(data);
            alert(response.message);
            if (response.status == '00') {
                location.reload();
            }
        });
    });


    //EDITAR
    $("#formEditarApadrinamiento").on('submit', function (e) {
        e.preventDefault();
        $id = $("#idApadrinamiento").val();
        $cuota = $("#MontoEditar").val();
        $frecuencia = $("#frecuenciaEditar").val();

        if ($cuota === 0 && $frecuencia === '') {
            alert("Por favor completa los datos antes de guardar");
        } else {
            $.post("actions/accionesApadrinamientos.php", {
                action: 'editar',
                id: $id,
                monto: $cuota,
                frecuencia: $frecuencia
            }, function (data, status) {
                let response = JSON.parse(data);
                alert(response.message);
                if (response.status == '00') {
                    window.location.href = "./gestionPadrinos.php";
                }
            });
        }

    })

    //AGREGAR APADRINAMIENTO
    function getAnimalesDisponibles() {
        $.post("actions/accionesApadrinamientos.php", {
            action: 'obtenerAnimalesDisponibles',
        },
            function (data, status) {
                let response = JSON.parse(data);
                if ($("#animalesDisponibles tr").length === 0) {
                    $("#animalesDisponibles").html('<tr><td colspan="4">No hay animales disponibles</td></tr>');
                }
                if (response.status === '00') {
                    console.log(response);
                    let respuesta = '';
                    response.animales.forEach((element) => {
                        respuesta += `
                           <tr id="animalSeleccionado" class="fila-animal" data-id="${element.id}">
                        <td>${element.id}</td>
                            <td>${element.nombreAnimal}</td>
                            <td>${element.especie}</td>
                            <td>${element.fechaNacimiento}</td>
                        </tr>
                    `;
                    });
                    console.log(respuesta);
                    $("#animalesDisponibles").html(respuesta || '<tr><td colspan="4">No hay animales disponibles</td></tr>');
                }
            });
    }

    function getClientes() {
        $.post("actions/accionesApadrinamientos.php", {
            action: 'obtenerUsuariosDisponibles',
        },
        function (data) {
            let response;
            try {
                response = JSON.parse(data);
            } catch (error) {
                console.error("Error al parsear JSON:", error);
                alert("Hubo un problema al obtener los datos.");
                return;
            }
    
            if (response.status === '00') {
                console.log(response);
                let respuesta = '';
                response.usuarios.forEach((element) => {
                    respuesta += `
                        <tr id="usuarioSeleccionado" class="fila-usuario" data-id="${element.id}">
                            <td>${element.id}</td>
                            <td>${element.nombre}</td>
                           
                        </tr>
                    `;
                });
    
                $("#usuariosDisponibles").html(respuesta || '<tr><td colspan="3">No hay usuarios disponibles</td></tr>');
            } else {
                $("#usuariosDisponibles").html('<tr><td colspan="3">No hay usuarios disponibles</td></tr>');
            }
        });
    }
    

    $(document).on('click', '.fila-usuario', function () {
        let selectedId = $(this).data('id');
        $(".fila-usuario").removeClass("selected");
        $(this).addClass("selected");
        $("#usuarioSeleccionado").data('id', selectedId);
        alert("Usuario seleccionado con ID: " + selectedId);
    });

    $(document).on('click', '.fila-animal', function () {
        let selectedId = $(this).data('id');
        $(".fila-animal").removeClass("selected");
        $(this).addClass("selected");
        $("#animalSeleccionado").data('id', selectedId);
        alert("Animal seleccionado con ID: " + selectedId);
    });
    
    $(document).on('click',"#guardarPadrino", function (e) {
        e.preventDefault();
        
        let $idAnimal = $(".fila-animal").data('id');
        console.log($idAnimal);
        let $idUsuario = $(".fila-usuario").data('id');
        let $monto = $("#montoApadrinar").val();
        let $frecuencia = $("#frecuencia").val();
    
        if (!$idAnimal || !$idUsuario || !$monto || !$frecuencia) {
            alert("Debe completar todos los campos antes de continuar");
            return;
        } else {

            $.post("actions/accionesApadrinamientos.php", {
                action: 'agregar',
                monto: $monto,
                frecuencia: $frecuencia,
                idAnimal: $idAnimal,
                idUsuario: $idUsuario
            }, function (data) {
                let response;
                try {
                    response = JSON.parse(data);
                } catch (error) {
                    console.error("Error al parsear JSON:", error);
                    alert("Hubo un problema con la respuesta del servidor.");
                    return;
                }
        
                alert(response.message);
                if (response.status === '00') {
                    window.location.href = './gestionPadrinos.php';
                }
            });
        }
    
    });
    


    //----------------------------------------------------------------
    //ANIMALES
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
                                        <button class="btn-editar" id="btnEditarAnimal" data-id="${element.ID_Animal}">Editar</button>
                                        <button class="btn-eliminar"  id="btnEliminarAnimal" data-id="${element.ID_Animal}">Eliminar</button>
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
                                <button class="btn-editar" id="btnEditarAnimal" data-id="${element.ID_Animal}">
                                    Editar
                                </button>
                                <button class="btn-eliminar" id="btnEliminarAnimal" data-id="${element.ID_Animal}">Eliminar</button>
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
    $(document).on("click", "#btnEliminarAnimal", function () {
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


    $(document).on("click", "#btnEditarAnimal", function () {
        const element = $(this).closest('tr');
        const idAnimal = element.attr("idAnimal");

        // Redirige a la página de edición con el ID del animal en la URL
        window.location.href = `editarAnimal2.php?idAnimal=${idAnimal}`;
    });


    //ACTUALIZAR EL ANIMAL

    // Llama a la función para obtener todos los animales
    getAllAnimals();

    //------------------------------------------------------------------------------------
    //GESTION DE DONACIONES

    //DESACTIVAR DONACIONES
    $('#desactivarDonaciones').on("submit", function (e) {
        console.log("funciona");
        $id = $("#donacion_id").val();
        e.preventDefault();
        $.post("actions/donacionesAcciones.php", {
            action: 'desactivar',
            id: $id
        }, function (data, status) {
            let response = JSON.parse(data);
            console.log(response.message);
            alert(response.message);
            if (response.status == '00') {
                location.reload();
            }
        }).fail(function () {
            alert("Error al procesar la solicitud.")
        });
    });

    //------------------------------------------------------------------------------------
    //GESTION DE USUARIOS

    //AGREGAR USUARIO
    $("#agregarUsuario").on("submit", function (e) {
        e.preventDefault();
        console.log("hola");
        $.post("actions/accionesUsuario.php", {
            action: 'add',
            nombre: $("#nombre").val(),
            apellido1: $("#apellido1").val(),
            apellido2: $("#apellido2").val(),
            correo: $("#correo").val(),
            telefono: $("#telefono").val(),
            password: $("#password").val(),
            rol: $("#rol").val()
        }, function (data, status) {
            let response = JSON.parse(data);
            alert(response.message);
            if (response.status === '00') {  // Verifica si la actualización fue exitosa
                // Redirigir a la página de gestión de usuarios
                window.location.href = "./gestionUsuarios.php";
            }
        }).fail(function () {
            alert("Error al procesar la solicitud.");
        });
    });


    //EDITAR USUARIO

    $("#actualizarUsuario").on("submit", function (e) {
        e.preventDefault();

        $.post("actions/accionesUsuario.php", {
            action: 'actualizar',
            id: $("#idUsuarioEditar").val(),
            nombre: $("#nombreEditar").val(),
            apellido1: $("#apellido1Editar").val(),
            apellido2: $("#apellido2Editar").val(),
            correo: $("#correoEditar").val(),
            telefono: $("#telefonoEditar").val(),
            rol: $("#rolEditar").val(),
            estado: $("#estadoEditar").val()
        }, function (data, status) {
            let response = JSON.parse(data);
            alert(response.message);
            if (response.status === '00') {  // Verifica si la actualización fue exitosa
                // Redirigir a la página de gestión de usuarios
                window.location.href = "./gestionUsuarios.php";
            }
        }).fail(function () {
            alert("Error al procesar la solicitud.");
        });
    });



    //ELIMINAR O DESACTIVAR USUARIO
    //ELIMINA SI ES ADMIN, DESACTIVA SI ES CLIENTE, ESTO PARA NO PERDER TRACKING DE DATOS DE DONACIONES, ETC
    $(document).on("click", "#eliminarUsuario", function () {


        let userId = $(this).data('id');
        console.log(userId);

        if (confirm("¿Estás seguro de eliminar este usuario?")) {
            $.post("actions/accionesUsuario.php", {
                action: 'eliminar',
                id: userId
            }, function (data, status) {
                let response = JSON.parse(data);
                alert(response.message);


                if (response.status === '00') {
                    location.reload();
                }
            }).fail(function () {
                // En caso de error en la solicitud AJAX
                alert("Error al procesar la solicitud");
            });
        }
    });




    // VALIDACIONES DEL FORMULARIO DE DONACIONES
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('form-donaciones');
        const submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', (e) => {
            let valid = true;

            // Deshabilitar el botón de envío al comenzar la validación
            submitButton.disabled = true;

            // Validar el campo nombre
            const nombre = document.getElementById('nombre');
            if (nombre.value.trim() === '') {
                alert('Por favor ingresa tu nombre completo.');
                valid = false;
            }

            // Validar el campo apellido1
            const apellido1 = document.getElementById('apellido1');
            if (apellido1.value.trim() === '') {
                alert('Por favor ingresa tu primer apellido.');
                valid = false;
            }

            // Validar el campo apellido2
            const apellido2 = document.getElementById('apellido2');
            if (apellido2.value.trim() === '') {
                alert('Por favor ingresa tu segundo apellido.');
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
            const phoneRegex = /^\d{8,15}$/; // Ejemplo: 8-15 dígitos
            if (!phoneRegex.test(telefono.value)) {
                alert('Por favor ingresa un número de teléfono válido.');
                valid = false;
            }

            // Validar campo "Otra cantidad" si está visible
            const otraCantidad = document.getElementById('otra-cantidad');
            if (otraCantidad.offsetHeight > 0 && otraCantidad.value <= 0) {
                alert('Por favor ingresa una cantidad válida.');
                valid = false;
            }

            if (!valid) {
                e.preventDefault(); // Prevenir envío si hay errores
            } else {
                // Si es válido, se puede proceder con el envío del formulario
                submitButton.disabled = false;
            }
        });
    });

    //APADRINAR ANIMAL - CLIENTE
    $("#formApadrinarAnimal").on('submit', function(e){
        e.preventDefault();

        $id= $("#idAnimalApadrinar").val();
        $montoDonar = $("#montoDonarForm").val();
        $frecuencia = "Mensual";

        $.post("actions/accionesApadrinamientos.php", {
            action: 'apadrinar',
            id: $id,
            montoDonar: $montoDonar,
            frecuencia: $frecuencia
        }, function(data, status){
            let response = JSON.parse(data);
            alert(response.message);
            if(response.status=='00'){
                window.location.href = "./listadoAnimalesDisponibles.php";
            }
        });
    });


    $("#form-donaciones").on("submit", function (e) {
        e.preventDefault(); // Evitar el envío predeterminado del formulario

        // Capturar los datos del formulario
        let monto = $("#otra-cantidad").val();
        let metodoPago = $("#metodo").val();

        // Validar campos antes de enviar
        if (!monto || !metodoPago) {
            alert("Por favor, completa todos los campos.");
            return;
        }

        // Enviar datos al servidor con $.ajax
        $.ajax({
            url: "actions/donacionesAcciones.php", // Ruta al archivo PHP
            type: "POST", // Método HTTP
            dataType: "json", // Especificar que se espera una respuesta JSON
            contentType: "application/json; charset=utf-8", // Indicar que se envían datos JSON
            data2: JSON.stringify({
                action: 'guardar', // Acción que se ejecutará en PHP
                monto: monto,
                metodoPago: metodoPago,
            }),
            success: function (response) {
                // Manejar la respuesta del servidor
                if (response.status === "00") {
                    // Mostrar modal de éxito
                    $('#donationModal').modal('show');
                } else {
                    // Mostrar mensaje de error
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                alert("Ocurrió un error al procesar tu donación. Intenta nuevamente.");
            },
        });
    });


    //ACTUALIZAR ADMINISTRADOR

    //MOSTRAR EL ADMIN
    function getAdmin() {
        
        $.post("actions/accionesUsuario.php", {
            action: 'getUsuario' 
        }, function (data, status) {
            try {
                let response = JSON.parse(data); // Parsear la respuesta JSON
                console.log(response);
    
                if (response.status == '00') {
                    let user = response.users[0]; // Asumimos que data contiene un array con un solo usuario
                    console.log(user);
                    // Asignar valores a los campos correspondientes
                    $("#nombreAdmin").val(user.Nombre);
                    $("#apellido1Admin").val(user.Apellido1);
                    $("#apellido2Admin").val(user.Apellido2);
                    $("#telefonoAdmin").val(user.Telefono);
                    $("#emailAdmin").val(user.Correo);
                    $("#direccionAdmin").val(user.Provincia);
                    $("#cantonAdmin").val(user.Canton);
                    $("#distritoAdmin").val(user.Distrito);
                    $("#exactaAdmin").val(user.Direccion);
                    $("#passwordHash").val(user.Password);
                } else {
                    console.error("Error en la respuesta: ", response.users);
                    alert("No se pudo obtener la información del administrador. Por favor, inténtelo de nuevo.");
                }
            } catch (error) {
                console.error("Error al procesar la respuesta: ", error);
                alert("Ocurrió un error al intentar obtener los datos del administrador.");
            }
        })
    };


    $("#formAdminActualizar").on('submit', function(e){
        e.preventDefault();

        $nombreAdmin = $("#nombreAdmin").val();
        $apellido1Admin = $("#apellido1Admin").val();
        $apellido2admin =  $("#apellido2Admin").val();
        $telefonoAdmin =  $("#telefonoAdmin").val();
        $emailAdmin =  $("#emailAdmin").val();
        $direccionAdmin =  $("#direccionAdmin").val();
        $cantonAdmin =  $("#cantonAdmin").val();
        $distritoAdmin =  $("#distritoAdmin").val();
        $exactaAdmin =  $("#exactaAdmin").val();


        $.post("actions/accionesUsuario.php", {
            action: 'updateAdmin',
            nombre: $nombreAdmin,
            apellido1: $apellido1Admin,
            apellido2: $apellido2admin,
            telefono: $telefonoAdmin,
            correo: $emailAdmin,
            direccion: $exactaAdmin,
            canton: $cantonAdmin,
            distrito: $distritoAdmin,
            provincia: $direccionAdmin
        }, function(data, status){
          let response = JSON.parse(data);
          console.log(response);
            alert(response.message);
            if(response.status === '01'){
                window.location.href = "./login.php";
            }

        });


    });



    $("#changePassword").on('submit', function(e){
        e.preventDefault();
        $passwordHash = $("#passwordHash").val();
        $contraActual = $("#contrasena_actual").val();
        $nuevaContra =  $("#nueva_contrasena").val();

        $.post("actions/accionesUsuario.php", {
            action: 'actualizarPassword',
            contraActual: $contraActual,
            newPassword: $nuevaContra,
            passwordHash: $passwordHash
        }, function(data, status){
            let response = JSON.parse(data);
            alert(response.message);
            if(response.status=='00'){
                window.location.href = "./login.php";
            }
        });
    })
    //CIERRE DEL FUNCTION

        


});