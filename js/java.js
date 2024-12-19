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

    $(document).on('click', "#guardarPadrino", function (e) {
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
        if (confirm("¿Deseas eliminar el animal? Si eliminas el animal, automáticamente eliminaras los registros asociados a este.")) {
            const row = $(this).closest('tr');
            const id = row.attr("idAnimal");

            $.post("actions/obtenerAnimales.php", { action: 'delete', id: id }, function (response) {
                let data = JSON.parse(response);

                $("#mensajeModalBody").text(data.message);
                $("#mensajeModal").modal('show');

                if (data.status === '00') {
                    $("#mensajeModal").on('hidden.bs.modal', function () {
                        row.remove();

                        if ($("#bodyTabla tr").length === 0) {
                            $("#bodyTabla").html('<tr><td colspan="6">No hay animales disponibles</td></tr>');
                        }
                    });
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
            $("#mensajeModalBody").text(response.message);
            $("#mensajeModal").modal('show');

            if (response.status === '00') {
                $("#mensajeModal").on('hidden.bs.modal', function () {
                    window.location.href = "./gestionUsuarios.php";
                });
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
                $("#mensajeModalBody").text(response.message);
                $("#mensajeModal").modal('show');

                if (response.status === '00') {
                    $("#mensajeModal").on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }).fail(function () {
                // En caso de error en la solicitud AJAX
                alert("Error al procesar la solicitud");
            });
        }
    });





    //APADRINAR ANIMAL - CLIENTE
    $("#formApadrinarAnimal").on('submit', function (e) {
        e.preventDefault();

        $id = $("#idAnimalApadrinar").val();
        $montoDonar = $("#montoDonarForm").val();
        $frecuencia = "Mensual";

        $.post("actions/accionesApadrinamientos.php", {
            action: 'apadrinar',
            id: $id,
            montoDonar: $montoDonar,
            frecuencia: $frecuencia
        }, function (data, status) {
            let response = JSON.parse(data);
            $("#mensajeModalBody").text(response.message);
            $("#mensajeModal").modal('show');

            if (response.status === '00') {
                $("#mensajeModal").on('hidden.bs.modal', function () {
                    window.location.href = "./listadoAnimalesDisponibles.php";
                });
            }
        });
    });


    $("#formDonar").on("submit", function (event) {
        event.preventDefault(); // Prevenir el envío del formulario
        console.log("hola");
   
        // Capturar los datos del formulario
        $monto = $("#montoDonacion").val();
        $metodoPago = $("#metodoPago").val();
   
        // Validar campos antes de enviar
        if (!$monto || !$metodoPago) {
            alert("Por favor, completa todos los campos.");
            return;
        }
   
        // Enviar datos por POST
        $.post("actions/donacionesAcciones.php", {
            action: 'guardar',
            monto: $monto,
            metodoPago: $metodoPago
        }, function(data, status){
            let response = JSON.parse(data);    
            $("#mensajeModalBody").text(response.message);
            $("#mensajeModal").modal('show');

            if (response.status === '00') {
                $("#mensajeModal").on('hidden.bs.modal', function () {
                    location.reload();
                });
            }
        });
    });


    //ACTUALIZAR ADMINISTRADOR

    //MOSTRAR EL ADMIN
    function getAdmin() {

        $.post("actions/accionesUsuario.php", {
            action: 'getUsuario'
        }, function (data, status) {

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

        })
    };


    $("#formAdminActualizar").on('submit', function (e) {
        e.preventDefault();

        $nombreAdmin = $("#nombreAdmin").val();
        $apellido1Admin = $("#apellido1Admin").val();
        $apellido2admin = $("#apellido2Admin").val();
        $telefonoAdmin = $("#telefonoAdmin").val();
        $emailAdmin = $("#emailAdmin").val();
        $direccionAdmin = $("#direccionAdmin").val();
        $cantonAdmin = $("#cantonAdmin").val();
        $distritoAdmin = $("#distritoAdmin").val();
        $exactaAdmin = $("#exactaAdmin").val();


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
        }, function (data, status) {
            let response = JSON.parse(data);

            $("#mensajeModalBody").text(response.message);
            $("#mensajeModal").modal('show');

            if (response.status === '01') {
                $("#mensajeModal").on('hidden.bs.modal', function () {
                    window.location.href = "./login.php";
                });
            } else if (response.status === '00') {
                $("#mensajeModal").on('hidden.bs.modal', function () {
                    location.reload();
                });
            }
        });


    });



    $("#changePassword").on('submit', function (e) {
        e.preventDefault();
        $passwordHash = $("#passwordHash").val();
        $contraActual = $("#contrasena_actual").val();
        $nuevaContra = $("#nueva_contrasena").val();

        $.post("actions/accionesUsuario.php", {
            action: 'actualizarPassword',
            contraActual: $contraActual,
            newPassword: $nuevaContra,
            passwordHash: $passwordHash
        }, function (data, status) {
            let response = JSON.parse(data);
            $("#mensajeModalBody").text(response.message);
            $("#mensajeModal").modal('show');

            if (response.status === '00') {
                $("#mensajeModal").on('hidden.bs.modal', function () {
                    window.location.href = "./login.php";
                });
            }
        });
    })
    //CIERRE DEL FUNCTION

    $("#contactoForm").on('submit', function (e) {

        e.preventDefault();
        $nombre = $("#nombreConsulta").val();
        $apellido = $("#apellidoConsulta").val();
        $email = $("#emailConsulta").val();
        $mensaje = $("#mensajeConsulta").val();


        if (!$nombre || !$nombre || !$email || !$mensaje) {
            $("#mensajeModalBody").text('Debe completar todos los campos antes de enviar.');
            $("#mensajeModal").modal('show');
            return;
        } else {
            $.post("actions/contactoAcciones.php", {
                action: 'add',
                nombre: $nombre,
                apellido: $apellido,
                email: $email,
                mensaje: $mensaje
            }, function (data, status) {
                let response = JSON.parse(data);
                $("#mensajeModalBody").text(response.message);
                $("#mensajeModal").modal('show');

                if (response.status === '00') {
                    $("#mensajeModal").on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            });
        }

    });


    $("#finalizarApadrinamiento").on('submit', function (e) {
        e.preventDefault();
        $idAnimal = $("#idAnimalFinalizar").val();
        $.post("actions/accionesApadrinamientos.php", {
            action: 'desactivarApadrinamiento',
            id: $idAnimal
        }, function (data, status) {
            let response = JSON.parse(data);

            $("#mensajeModalBody").text(response.message);
            $("#mensajeModal").modal('show');

            if (response.status === '00') {
                $("#mensajeModal").on('hidden.bs.modal', function () {
                    location.reload();
                });
            }
        }
        );
    })


    $("#tourAgregar").on('submit', function(e) {
        e.preventDefault();
    
        var formData = new FormData(this); // Recoge los datos del formulario
    
        $.ajax({
            url: 'actions/guardar_tour.php',  // El archivo PHP que maneja la inserción
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',  // Esperamos un objeto JSON como respuesta
            success: function(data) {
                // Muestra el mensaje en el modal
                $('#mensajeModalBody').text(data.message);
    
                // Mostrar el modal de Bootstrap
                $('#mensajeModal').modal('show');  // Abre el modal usando jQuery
    
                // Redirigir después de cerrar el modal
                $('#mensajeModal').on('hidden.bs.modal', function () {
                    if (data.status === '00') {
                        window.location.href = './gestionTours.php'; // Redirigir en caso de éxito
                    } else {
                        window.location.href = './agregarTour.php'; // Redirigir en caso de error
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Ocurrió un error al procesar la solicitud.');
            }
        });
    });
    
    // $('#tourEditar').submit(function(e) {
    //     e.preventDefault(); // Evita el envío tradicional del formulario
    
    //     var formData = new FormData(this); // Obtén los datos del formulario
    
    //     // Utilizar $.ajax para manejar correctamente FormData
    //     $.ajax({
    //         url: 'editarTour.php', // Archivo PHP que procesará la solicitud
    //         type: 'POST', // Método HTTP
    //         data: formData, // Datos del formulario
    //         processData: false, // Necesario para enviar FormData correctamente
    //         contentType: false, // Evita que jQuery establezca el encabezado "Content-Type"
    //         success: function(data) {
    //             try {
    //                 let response = JSON.parse(data); // Convertir respuesta a JSON
    
    //                 if (response.status === "00") {
    //                     // Si la actualización fue exitosa
    //                     $('#mensajeModalBody').text(response.message); // Mensaje de éxito
    //                     $('#mensajeModal').modal('show');
    //                 } else {
    //                     // Si hubo un error
    //                     $('#mensajeModalBody').text(response.message); // Mensaje de error
    //                     $('#mensajeModal').modal('show');
    //                 }
    //             } catch (error) {
    //                 console.error('Error al parsear JSON:', error);
    //                 $('#mensajeModalBody').text("Error inesperado en la respuesta del servidor.");
    //                 $('#mensajeModal').modal('show');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             // Si hay un error en la solicitud
    //             console.error('Error:', error);
    //             $('#mensajeModalBody').text("Hubo un error al procesar la solicitud.");
    //             $('#mensajeModal').modal('show');
    //         }
    //     });
    // });
    
    $(document).on("click", "#eliminarTour", function () {
        if (confirm("¿Deseas eliminar el tour?")) {
            const row = $(this).closest('tr');
            const id = row.attr("id");
            console.log(id);
            $.post("actions/toursAcciones.php", { action: 'eliminar', id: id }, function (data, status) {
                let response = JSON.parse(data);
                console.log(response);
                $("#mensajeModalBody").text(response.message);
                $("#mensajeModal").modal('show');
    
                if (response.status === '00') {  // Usa response.status aquí
                    $("#mensajeModal").on('hidden.bs.modal', function () {
                        row.remove();  // Elimina la fila de la tabla
                        location.reload();  // Recarga la página para reflejar los cambios
    
                        if ($("#bodyTabla tr").length === 0) {
                            $("#bodyTabla").html('<tr><td colspan="6">No hay animales disponibles</td></tr>');
                        }
                    });
                }
            });
        }
    });
    

});