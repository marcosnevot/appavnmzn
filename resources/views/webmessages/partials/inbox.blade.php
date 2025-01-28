<div class="inbox-container">
    <header class="inbox-header">
        <h1>Bandeja de Entrada</h1>
        <div class="search-and-filter">
            <!-- Buscador -->
            <div class="search-bar">
                <input type="text" id="search-input" placeholder="Buscar por nombre, asunto, mensaje o email...">
            </div>
            <!-- Filtro de sede -->
            <div class="filter">
                <select id="sede-filter" class="filter-select">
                    <option value="all">Todos</option>
                    <option value="Barbastro">Barbastro</option>
                    <option value="Monzón">Monzón</option>
                </select>
            </div>

        </div>
    </header>


    <main class="messages-list" id="messages-list">
        <!-- Cada mensaje será una tarjeta -->
        <template id="message-template">
            <article class="message-card">
                <header class="message-header">
                    <div class="sender-info">
                        <h3 class="message-name"></h3> <!-- Nombre del remitente -->
                        <div class="email-container">
                            <p class="message-email"></p> <!-- Email -->
                            <button class="delete-message" aria-label="Eliminar mensaje">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256"
                                    style="fill:#FFFFFF;">
                                    <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(4,4)">
                                            <path d="M28,3c-2.209,0 -4,1.791 -4,4v2h-0.40039l-16.59961,2v3h50v-3l-16.59961,-2h-0.40039v-2c0,-2.209 -1.791,-4 -4,-4zM28,7h8v2h-8zM10,16l4,42h36l3.92383,-41zM32,23c1.333,0 2,1 2,1v29h-4v-29c0,0 0.667,-1 2,-1zM18.97656,23.07031c1.33,-0.093 2.06641,0.85938 2.06641,0.85938l1.96484,29.07031h-4.01172l-1.94336,-28.79297c0,0 0.59383,-1.04372 1.92383,-1.13672zM44.97852,23.07031c1.33,0.093 1.92578,1.13672 1.92578,1.13672l-1.94336,28.79297h-4.01172l1.96484,-29.07031c0,0 0.73445,-0.95238 2.06445,-0.85938z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <time class="message-date"></time> <!-- Fecha -->
                </header>

                <div class="message-body">
                    <p class="message-subject"></p> <!-- Asunto -->
                    <p class="message-text"></p> <!-- Mensaje -->
                </div>

                <footer class="message-footer">
                    <div class="message-meta">
                        <span class="message-sede"></span> <!-- Sede -->
                    </div>
                    <button class="view-attachments hidden">Ver adjuntos</button> <!-- Botón de adjuntos -->
                </footer>
            </article>
        </template>
    </main>


    <!-- Modal para mostrar los adjuntos -->
    <div class="attachmentModal">
        <div class="attachmentModal-content">
            <header class="attachmentModal-header">
                <h2 class="attachmentModal-title">Archivos Adjuntos</h2>
                <button class="attachmentModal-close" aria-label="Cerrar">&times;</button>
            </header>
            <div class="attachments-container">
                <ul class="attachments-list">
                    <!-- Los adjuntos se generan aquí dinámicamente -->
                </ul>
            </div>
        </div>
    </div>


</div>