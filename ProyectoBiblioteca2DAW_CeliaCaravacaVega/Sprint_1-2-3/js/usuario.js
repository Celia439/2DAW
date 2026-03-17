let usuario = {
    guardarUsuario: function () {
        $(".btn-registrar").on("click", function () {
            e.preventDefault(); // evita que el form recargue la página

            let datos = {
                nombre: $("#usr_nom").val(),
                apellido: $("#usr_ape").val(),
                dni: $("#usr_dni").val(),
                email: $("#usr_cor").val(),
                password: $("#usr_pass").val(),
                telefono: $("#usr_tel").val(),
                direccion: $("#usr_dir").val(),
                rol: $("#usr_rol").val(),
                estado: $("#usr_est").val()
            };
            //TODO: crear un modal para mostrar el resultado 
            $.ajax({
                url: "../../php/usuarios/insertarUsuario.php",
                type: "POST",
                data: datos,
                dataType: "json",
                success: function (respuesta) {
                    if (respuesta.ok) {
                        alert("Usuario registrado correctamente");
                        $("#modalNuevoUsuario").modal("hide");
                    } else {
                        alert("Error: " + respuesta.error);
                    }
                },
                error: function () {
                    alert("Error en la comunicación con el servidor");
                }
            });
        });

    }
};