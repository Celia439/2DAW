<?php
include_once __DIR__ . "/../../../bloques/headerBibliotecario.php";
?>

<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca" style="max-width: 680px;">
        <div class="card-titulo" style="font-size: 1.1rem; margin-bottom: 1.2rem;">
            <i class="bi bi-building label-icon"></i> Datos de la Empresa
        </div>

        <div class="row g-3">
            <!-- Nombre -->
            <div class="col-md-4">
                <label class="form-label" style="font-size:0.85rem; font-weight:600; color:#444;">
                    <i class="bi bi-building label-icon"></i>Nombre
                </label>
                <input type="text" class="form-control" value="BiblioTech"
                    style="border:1px solid #ddd; border-radius:4px; padding:0.45rem 0.7rem; font-size:0.88rem;">
            </div>

            <!-- Teléfono -->
            <div class="col-md-4">
                <label class="form-label" style="font-size:0.85rem; font-weight:600; color:#444;">
                    <i class="bi bi-telephone label-icon"></i>Teléfono
                </label>
                <input type="tel" class="form-control" value="+34 951 123 456"
                    style="border:1px solid #ddd; border-radius:4px; padding:0.45rem 0.7rem; font-size:0.88rem;">
            </div>

            <!-- Dirección -->
            <div class="col-md-4">
                <label class="form-label" style="font-size:0.85rem; font-weight:600; color:#444;">
                    <i class="bi bi-geo-alt label-icon"></i>Dirección
                </label>
                <input type="text" class="form-control" value="Málaga, España"
                    style="border:1px solid #ddd; border-radius:4px; padding:0.45rem 0.7rem; font-size:0.88rem;">
            </div>

            <!-- Correo Electrónico -->
            <div class="col-md-4">
                <label class="form-label" style="font-size:0.85rem; font-weight:600; color:#444;">
                    <i class="bi bi-envelope label-icon"></i>Correo Electrónico
                </label>
                <input type="email" class="form-control" value="info@bibliotech.es"
                    style="border:1px solid #ddd; border-radius:4px; padding:0.45rem 0.7rem; font-size:0.88rem;">
            </div>

            <!-- Logo (área de subida) -->
            <div class="col-md-8">
                <label class="form-label" style="font-size:0.85rem; font-weight:600; color:#444;">
                    <i class="bi bi-image label-icon"></i>Logo
                </label>
                <div class="area-logo" style="border: 2px dashed #ddd; border-radius: 6px; padding: 2rem; background-color: #fafafa;">
                    <div class="text-center">
                        <i class="bi bi-image" style="font-size: 1.8rem; color: #bbb;"></i>
                        <div style="margin-top: 0.3rem; font-size: 0.82rem; color: #999;">Vista previa del logo</div>
                    </div>
                </div>
                <!-- Botón Subir imagen -->
                <button class="btn-subir-imagen" style="margin-top: 0.8rem; padding: 0.5rem 1rem; background-color: #2a6b6b; color: white; border: none; border-radius: 4px; font-size: 0.85rem; cursor: pointer;">
                    <i class="bi bi-upload"></i> Subir imagen
                </button>
            </div>
        </div>

        <!-- Botón Actualizar -->
        <div class="mt-3">
            <button class="btn-actualizar" style="padding: 0.6rem 1.5rem; background-color: #e8734a; color: white; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">Actualizar</button>
        </div>
    </div>
</div>

<?php 
include_once __DIR__ . "/../../../bloques/footerBibliotecario.php";
?>