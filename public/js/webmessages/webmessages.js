document.addEventListener('DOMContentLoaded', async () => {
    const API_URL = 'https://alasvigilnevot.es/api';
    let token = '';
    // const API_URL = 'http://127.0.0.1:8000/api';


    // Elementos del DOM
    const messagesList = document.getElementById('messages-list');
    const messageTemplate = document.getElementById('message-template').content;
    const modal = document.querySelector('.attachmentModal');
    const modalAttachmentsList = document.querySelector('.attachments-list');
    const modalCloseButton = document.querySelector('.attachmentModal-close');
    const searchInput = document.getElementById('search-input');
    const sedeFilter = document.getElementById('sede-filter');

    // Cierra el modal
    modalCloseButton.addEventListener('click', closeModal);

    // Función para mostrar el modal con los adjuntos
    function showModal(attachments) {
        modalAttachmentsList.innerHTML = '';
        attachments.forEach(file => {
            const listItem = document.createElement('li');
            const fileName = file.split('/').pop();
            const encodedFileName = encodeURIComponent(fileName).replace(/\+/g, '%20');
            const downloadUrl = `${API_URL}/webmessages/download/${encodedFileName}`;
            const link = document.createElement('button');
            link.textContent = fileName;
            link.classList.add('download-button');
            link.addEventListener('click', () => downloadFile(downloadUrl, fileName));
            listItem.appendChild(link);
            modalAttachmentsList.appendChild(listItem);
        });
        modal.classList.add('show');
    }

    // Función para descargar archivos
    async function downloadFile(url, fileName) {
        try {
            const response = await fetch(url, {
                headers: { 'Authorization': `Bearer ${token}` },
            });
            if (!response.ok) throw new Error(`Error al descargar el archivo: ${response.statusText}`);
            const blob = await response.blob();
            const downloadLink = document.createElement('a');
            const urlObject = window.URL.createObjectURL(blob);
            downloadLink.href = urlObject;
            downloadLink.download = fileName;
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
            window.URL.revokeObjectURL(urlObject);
        } catch (error) {
            alert('Error al descargar el archivo. Por favor, inténtalo de nuevo.');
            console.error('Error al descargar el archivo:', error);
        }
    }

    // Cierra el modal con animación
    function closeModal() {
        modal.classList.remove('show');
        modal.classList.add('hide');
        setTimeout(() => modal.classList.remove('hide'), 300);
    }

    // Renderiza los mensajes en la lista
    function renderMessages(messages) {
        messagesList.innerHTML = '';
        if (messages.length === 0) {
            messagesList.innerHTML = '<div class="no-messages">No se encontraron mensajes.</div>';
            return;
        }
        messages.forEach(message => {
            const messageCard = messageTemplate.cloneNode(true);

            // Asocia el ID del mensaje al contenedor
            messageCard.querySelector('article').setAttribute('data-id', message.id);

            messageCard.querySelector('.message-name').textContent = message.nombre || 'Sin nombre';
            messageCard.querySelector('.message-email').textContent = message.email || 'Sin email';
            messageCard.querySelector('.message-sede').textContent = `${message.sede || 'Sin sede'}`;
            messageCard.querySelector('.message-subject').textContent = `${message.asunto || 'Sin asunto'}`;
            messageCard.querySelector('.message-text').textContent = message.mensaje || 'Sin mensaje';
            messageCard.querySelector('.message-date').textContent = new Date(message.created_at).toLocaleDateString('es-ES', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
            });

            const viewAttachmentsButton = messageCard.querySelector('.view-attachments');
            if (message.adjuntos && message.adjuntos.length > 0) {
                viewAttachmentsButton.classList.remove('hidden');
                viewAttachmentsButton.addEventListener('click', () => showModal(message.adjuntos));
            }

            const deleteButton = messageCard.querySelector('.delete-message');
            deleteButton.addEventListener('click', () => confirmAndDeleteMessage(message.id, messageCard));

            messagesList.appendChild(messageCard);
        });
    }

    // Función para confirmar y eliminar un mensaje
    async function confirmAndDeleteMessage(id, messageElement) {
        const confirmed = confirm('¿Estás seguro de que deseas eliminar este mensaje?');
        if (!confirmed) return;

        try {
            const response = await fetch(`${API_URL}/webmessages/${id}/borrar`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json',
                },
            });

            if (!response.ok) {
                throw new Error(`Error al eliminar el mensaje: ${response.statusText}`);
            }

            // Añadir la clase de animación
            const elementToRemove = document.querySelector(`[data-id="${id}"]`);
            if (elementToRemove) {
                elementToRemove.classList.add('removing'); // Añadimos la clase para animar el borrado

                // Esperamos que termine la animación antes de eliminarlo del DOM
                setTimeout(() => {
                    elementToRemove.remove();
                    alert('Mensaje eliminado con éxito.');
                }, 300); // El tiempo coincide con la duración de la animación en CSS (0.3s)
            } else {
                console.warn('No se encontró el elemento en el DOM para eliminar.');
            }
        } catch (error) {
            alert('Error al eliminar el mensaje. Por favor, inténtalo de nuevo.');
            console.error('Error al eliminar el mensaje:', error);
        }
    }



    // Obtiene el token
    async function fetchToken() {
        try {
            const response = await fetch(`${API_URL}/auth/token`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
            });
            if (!response.ok) throw new Error('Error al obtener el token.');
            const data = await response.json();
            token = data.accessToken;
        } catch (error) {
            console.error('Error al obtener el token:', error);
        }
    }

    // Obtiene los mensajes desde la API, filtrados por sede y búsqueda
    async function fetchMessages(query = '', sede = 'all') {
        try {
            const url = `${API_URL}/webmessages?search=${encodeURIComponent(query)}&sede=${encodeURIComponent(sede)}`;
            const response = await fetch(url, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json',
                },
            });

            if (!response.ok) throw new Error('Error al cargar los mensajes.');
            const messages = await response.json();
            renderMessages(messages);
        } catch (error) {
            console.error('Error al cargar los mensajes:', error);
            messagesList.innerHTML = '<div class="error">Error al cargar los mensajes. Intenta nuevamente.</div>';
        }
    }

    // Filtro de sede: aplica cambios inmediatamente
    sedeFilter.addEventListener('change', () => {
        const sede = sedeFilter.value;
        const query = searchInput.value.trim();
        fetchMessages(query, sede); // Refresca los resultados
    });

    // Buscador en tiempo real: ejecuta una búsqueda cada vez que se escribe en el campo
    let searchTimeout;
    searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout); // Reinicia el temporizador
        searchTimeout = setTimeout(() => {
            const query = searchInput.value.trim();
            const sede = sedeFilter.value;
            fetchMessages(query, sede); // Refresca los resultados
        }, 300); // Espera 300ms después del último cambio antes de buscar
    });

    // Inicialización
    await fetchToken();
    if (token) fetchMessages();
});