<!-- Contenedor de la tabla con scroll -->
<div class="table-container" style="max-height: 80vh; width: 100%; overflow-x: auto; overflow-y: auto;">
    <!-- Tabla de tareas -->
    <table class="min-w-full table-auto task-table bg-white dark:bg-gray-800">
        <thead>
            <tr>
                <th data-sort-key="id" style="cursor: pointer;">ID</th>
                <th data-sort-key="fecha_inicio" data-field="filter_fecha_inicio" style="cursor: pointer;">Fecha Inicio</th>
                <th data-sort-key="asunto.nombre" data-field="asunto" style="cursor: pointer;">Asunto</th>
                <th data-sort-key="cliente.nombre_fiscal" data-field="cliente" class="col-cliente" id="header-client" style="cursor: pointer;">Cliente</th>
                <th data-sort-key="tipo.nombre" data-field="tipo" style="cursor: pointer;">Tipo</th>
                <th data-sort-key="estado" data-field="filter-estado" style="cursor: pointer;">Estado</th>
                <th data-sort-key="fecha_vencimiento" data-field="filter_fecha_vencimiento" style="cursor: pointer;">Fecha Vencimiento</th>
                <th data-sort-key="facturable" data-field="filter-facturable" style="cursor: pointer;">Facturable</th>
                <th data-sort-key="facturado" data-field="filter-facturado" style="cursor: pointer;">Facturado</th>
                <th data-sort-key="precio" data-field="filter_precio" style="cursor: pointer;">Precio</th>
                <th data-sort-key="descripcion" data-field="filter_descripcion" style="cursor: pointer;" class="col-descripcion">Descripción</th>
                <th data-sort-key="observaciones" data-field="filter_observaciones" style="cursor: pointer;" class="col-observaciones">Observaciones</th>
                <th data-sort-key="suplido" data-field="filter_suplido" style="cursor: pointer;">Suplido</th>
                <th data-sort-key="coste" data-field="filter_coste" style="cursor: pointer;">Coste</th>
                <th data-sort-key="fecha_planificacion" data-field="filter_fecha_planificacion" style="cursor: pointer;">Planificación</th>
                <th data-sort-key="users.name" data-field="filter-user" style="cursor: pointer;">Asignado a</th>
            </tr>
        </thead>

        <tbody>
            <!-- Aquí se rellenarán las tareas dinámicamente mediante JS -->
        </tbody>
    </table>
</div>
<div class="pagination-container" id="pagination-controls">
    <ul id="pagination" class="pagination">
        <!-- Pagination buttons will be dynamically generated by JS -->
    </ul>
</div>

<!-- Panel de horas -->
<div class="hours-summary-main professional-hours-panel" style="display: none;">
    <div class="hours-item">
        <strong>Total horas previstas:</strong> <span id="total-tiempo-previsto">0</span>
    </div>
    <div class="hours-item">
        <strong>Total horas reales:</strong> <span id="total-tiempo-real">0</span>
    </div>
</div>


<!-- Modal para las tareas detalladas -->
<div id="task-detail-modal" class="task-detail-modal" style="display: none;">
    <div class="task-detail-modal-content" id="task-detail-modal-content">
        <!-- El contenido del modal será insertado aquí -->
    </div>
    <button id="close-task-detail-modal" class="btn-close-task-detail-modal">Guardar</button>
</div>