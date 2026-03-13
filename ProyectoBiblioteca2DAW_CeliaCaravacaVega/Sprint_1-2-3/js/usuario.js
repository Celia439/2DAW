let usuario = {
    guardarUsuario: function () {
        $(".btn-registrar").on("click", function () {
            let nombre = document.getElementById("usr_nom").value;
            let apellido = document.getElementById("usr_ape").value;
            let dni = document.getElementById("usr_dni").value;
            let email = document.getElementById("usr_cor").value;
            let password = document.getElementById("usr_pass").value;
            let telefono = document.getElementById("usr_tel").value;
            let direccion = document.getElementById("usr_dir").value;
            let rol = document.getElementById("usr_rol").value;
            let estado = document.getElementById("usr_est").value;

        });

    }
};