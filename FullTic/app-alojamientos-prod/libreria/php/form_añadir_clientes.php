<form id="formCliente" action="#" method="post" class="needs-validation" novalidate>
                <h1>Formulario para clientes </h1>
                <hr />
                <div class="row g-4">
                    <div class="col-md-6">

                        <fieldset class="p-5">

                            <legend>Datos personales</legend>
                            <hr />

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" class="form-control" name="nombre" type="text" placeholder="nombre"
                                    maxlength="50" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" required />
                                <div class="invalid-feedback">Por favor, introduce tu nombre.</div>
                            </div>

                            <div class="mb-3">
                                <label for="primerApell" class="form-label">Primer apellido</label>
                                <input id="primerApell" class="form-control" name="primerApellido" type="text"
                                    placeholder="Primer apellido" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" required />
                                <div class="invalid-feedback">Por favor, introduce tu primer apellido.</div>
                            </div>

                            <div class="mb-3">
                                <label for="segundoApell" class="form-label">Segundo apellido</label>
                                <input id="segundoApell" class="form-control" name="segundoApellido"
                                    placeholder="Segundo apellido" type="text" placeholder="Segundo apellido"
                                    pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" required />
                                <div class="invalid-feedback">Por favor, introduce tu segundo apellido.</div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="hombre" value="H" required>
                                    <label class="form-check-label" for="hombre">Hombre</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="mujer" value="M" required>
                                    <label class="form-check-label" for="mujer">Mujer</label>
                                </div>
                                <div class="invalid-feedback">Por favor, seleccione tu sexo.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="nIdentidad">Número de documento de identidad:</label>
                                <input class="form-control" id="nIdentidad" name="nIdentidad" type="text"
                                    placeholder="12345678A" pattern="^[0-9]{8}[A-Z]$" required />
                                <div class="invalid-feedback">Por favor, introduce tu número de documento.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="tDocumentacion"> Tipo de documentación: </label>
                                <select id="tDocumentacion" class="form-select" name="tipoDocumentacion" required>
                                    <option value="">Seleccione tipo de documentación</option>
                                    <option value="D">DNI</option>
                                    <option value="P">Pasaporte</option>
                                    <option value="T">TIE</option>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione tu tipo de documentación.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="nSoporteDocumento">Número de soporte del documento </label>
                                <input class="form-control" id="nSoporteDocumento" name="nSoporteDocumento"
                                    placeholder="ABC1234567" type="text" maxlength="20" required />
                                <div class="invalid-feedback">Por favor, introduce tu número de soporte del documento.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="nacionalidad">Nacionalidad:</label>
                                <select id="nacionalidad" class="form-select" name="nacionalidad" required>
                                    <option value="">Seleccione nacionalidad</option>
                                    <?php
                                    //  Mostrar la nacionalidad 
                                    if ($nacionalidades) {
                                        foreach ($nacionalidades as $key => $fila) {
                                            echo "<option value=" . $fila["id"] . ">" . $fila["nombre"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

                                <div class="invalid-feedback">Por favor, seleccione tu nacionalidad.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="fNacimiento">Fecha de nacimiento:</label>
                                <input class="form-control" id="fNacimiento" name="fechaNacimiento" type="date" required />
                                <div class="invalid-feedback">Por favor, introduce tu fecha de nacimiento.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="telFijo">Teléfono fijo</label>
                                <input id="telFijo" class="form-control" name="telFijo" type="tel" placeholder="912345678"
                                    pattern="^[679][0-9]{8}$" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="telMovil">Teléfono móvil</label>
                                <input id="telMovil" class="form-control" name="telMovil" type="tel" placeholder="612345678"
                                    pattern="^[679][0-9]{8}$" required />
                                <div class="invalid-feedback">Por favor, introduce tu teléfono móvil.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="correo">Correo</label>
                                <input id="correo" class="form-control" name="correo" type="email"
                                    placeholder="tu EmailEjemplo@gmail.com" required />
                                <div class="invalid-feedback">Por favor, introduce tu correo.</div>
                            </div>

                            <label class="form-label" for="parentescoEntreViajeros">Menores de edad:</label>
                            <input class="form-control" id="parentescoEntreViajeros" name="parentescoEntreViajeros"
                                type="text" placeholder="Parentesco entre viajeros" />

                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="p-5">
                            <legend>Lugar de residencia habitual</legend>
                            <hr />

                            <div class="mb-3">
                                <label class="form-label" for="paises">País</label>
                                <select id="paises" name="paises" class="form-select" required>
                                    <option value="">Introduzca un país</option>

                                    <?php
                                    if ($nacionalidades) {
                                        foreach ($nacionalidades as $key => $fila) {
                                            echo "<option value=" . $fila["id"] . ">" . $fila["nombre"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Por favor, introduce tu país.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="provincias">Província</label>
                                <select id="provincias" name="provincia" class="form-select" required>
                                    <option value="">Introduzca un provincia</option>
                                    <?php
                                    if ($provincias) {
                                        foreach ($provincias as $key => $fila) {
                                            echo "<option value=" . $fila["id"] . ">" . $fila["Provincia"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Por favor, introduce tu província.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="localidades">Localidad</label>
                                <select id="localidades" name="localidades" class="form-select" required>
                                    <option value="">Introduzca una localidad</option>
                                    <!-- Mostrar municipios de forma síncrona-->
                                    <?php
                                    if ($municipios) {
                                        foreach ($municipios as $key => $fila) {
                                            echo "<option value=" . $fila["id"] . ">" . $fila["Municipio"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Por favor, introduce tu localidad.</div>
                            </div>

                            <!--Mostrar municipios de forma asíncrona-->
                            <script src="<?php echo LIBRERIA_JS . "comun.js" ?>"></script>

                            <div class="mb-3">
                                <label class="form-label" for="direccion">Dirección</label>
                                <input id="direccion" class="form-control" name="direccion" type="text"
                                    placeholder="Dirección completa" maxlength="100" required />
                                <div class="invalid-feedback">Por favor, introduce tu dirección.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="codigoP">Código postal</label>
                                <input id="codigoP" class="form-control" name="codigoP" type="text"
                                    placeholder="Codigo postal" pattern="^[0-9]{5}$" required />
                                <div class="invalid-feedback">Por favor, introduce tu código postal.</div>
                            </div>

                        </fieldset>
                    </div>
                </div>

                <input class="btn btn-primary m-3" name="submit" type="submit" value="enviar" />
            
                <!--Campo oculto para el id de reserva obtenido por url o qr-->
                <input name="reserva_id" type="hidden" id="reserva_id" value="<?php echo $id_reserva; ?>">

            </form>