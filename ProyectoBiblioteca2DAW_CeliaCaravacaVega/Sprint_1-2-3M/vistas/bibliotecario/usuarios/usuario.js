/**
 * USUARIO.JS
 * Gestión de usuarios mediante AJAX
 */

let usuario = {
    /**
     * Inicializar eventos
     */
    init: function() {
        this.cargarUsuarios();
        this.configurarEventos();
    },

    /**
     * Configurar todos los eventos
     */
    configurarEventos: function() {
        // Evento del botón registrar
        $(".btn-registrar").on("click", (e) => {
            e.preventDefault();
            this.guardarUsuario();
        });

        // Evento para abrir modal de nuevo usuario
        $(".btn-nuevo").on("click", () => {
            $("#modalNuevoUsuario").modal("show");
        });
    },

    /**
     * Cargar lista de usuarios
     */
    cargarUsuarios: function() {
        $.ajax({
            url: "../../../controlador/usuarios/obtenerusuarios.php",
            type: "GET",
            dataType: "json",
            success: (respuesta) => {
                if (respuesta.ok) {
                    this.mostrarUsuarios(respuesta.datos);
                } else {
                    alert("Error al cargar usuarios: " + respuesta.error);
                }
            },
            error: () => {
                console.log("Error en la comunicación con el servidor");
            }
        });
    },

    /**
     * Mostrar usuarios en la tabla
     */
    mostrarUsuarios: function(usuarios) {
        let html = '';
        
        usuarios.forEach(user => {
            let estadoBadge = user.estado === 'activo' 
                ? '<span class="estado-badge estado-activo">Activo</span>'
                : '<span class="estado-badge estado-deshabilitado">Bloqueado</span>';
            
            html += `
                <tr>
                    <td>${user.id_usuario}</td>
                    <td>${user.nombre}</td>
                    <td>${user.apellido || ''}</td>
                    <td>${user.dni || ''}</td>
                    <td>${user.email}</td>
                    <td>${user.telefono || ''}</td>
                    <td>${user.rol}</td>
                    <td>${estadoBadge}</td>
                    <td>
                        <div class="acciones-tabla">
                            <button class="btn-editar" data-id="${user.id_usuario}" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn-eliminar" data-id="${user.id_usuario}" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        });
        
        $(".tabla-biblioteca tbody").html(html);
        
        // Configurar eventos de botones
        this.configurarBotonesTabla();
    },

    /**
     * Configurar eventos de botones de la tabla
     */
    configurarBotonesTabla: function() {
        // Botón eliminar
        $(".btn-eliminar").on("click", function() {
            let id = $(this).data("id");
            if (confirm("¿Estás seguro de eliminar este usuario?")) {
                usuario.eliminarUsuario(id);
            }
        });

        // Botón editar
        $(".btn-editar").on("click", function() {
            let id = $(this).data("id");
            alert("Funcionalidad de edición próximamente. ID: " + id);
            // Aquí puedes implementar la edición
        });
    },

    /**
     * Guardar nuevo usuario
     */
    guardarUsuario: function() {
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

        // Validar campos obligatorios
        if (!datos.nombre || !datos.email || !datos.password) {
            alert("Por favor, rellena los campos obligatorios (nombre, email, contraseña)");
            return;
        }

        $.ajax({
            url: "../../../controlador/usuarios/insertarUsuario.php",
            type: "POST",
            data: datos,
            dataType: "json",
            success: (respuesta) => {
                if (respuesta.ok) {
                    alert("Usuario registrado correctamente");
                    $("#modalNuevoUsuario").modal("hide");
                    // Limpiar formulario
                    $("#formNuevoUsuario")[0].reset();
                    // Recargar lista
                    this.cargarUsuarios();
                } else {
                    alert("Error: " + respuesta.error);
                }
            },
            error: () => {
                alert("Error en la comunicación con el servidor");
            }
        });
    },

    /**
     * Eliminar usuario
     */
    eliminarUsuario: function(id) {
        $.ajax({
            url: "../../../controlador/usuarios/eliminarusuario.php",
            type: "POST",
            data: { id: id },
            dataType: "json",
            success: (respuesta) => {
                if (respuesta.ok) {
                    alert("Usuario eliminado correctamente");
                    this.cargarUsuarios();
                } else {
                    alert("Error: " + respuesta.error);
                }
            },
            error: () => {
                alert("Error en la comunicación con el servidor");
            }
        });
    }
};

// Inicializar cuando el documento esté listo
$(document).ready(() => {
    usuario.init();
});