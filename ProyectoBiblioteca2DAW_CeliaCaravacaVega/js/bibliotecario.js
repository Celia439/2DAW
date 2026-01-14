// Funcionalidad para la barra de búsqueda
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const cardItems = document.querySelectorAll('.card-item');
    
    // Búsqueda en tiempo real
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            
            cardItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
    
    // Efecto hover en las tarjetas
    cardItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
        
        item.addEventListener('click', function() {
            console.log('Item seleccionado:', this.textContent);
        });
    });
    
    // Animación de las barras de progreso
    const progressBars = document.querySelectorAll('.progress-fill');
    
    const animateProgressBars = () => {
        progressBars.forEach((bar, index) => {
            const width = bar.style.width;
            bar.style.width = '0%';
            
            setTimeout(() => {
                bar.style.width = width;
            }, 100 + (index * 100));
        });
    };
    
    // Ejecutar animación al cargar la página
    animateProgressBars();
    
    // Funcionalidad del menú lateral
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    
    sidebarItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remover clase active de todos los items
            sidebarItems.forEach(i => i.classList.remove('active'));
            // Agregar clase active al item clickeado
            this.classList.add('active');
            
            console.log('Navegando a:', this.textContent);
        });
    });
    
    // Funcionalidad del botón de notificaciones
    const notificationBtn = document.querySelector('.notification-btn');
    
    if (notificationBtn) {
        notificationBtn.addEventListener('click', function() {
            alert('No tienes notificaciones nuevas');
        });
    }
    
    // Funcionalidad del botón de login
    const loginBtn = document.querySelector('.login-btn');
    
    if (loginBtn) {
        loginBtn.addEventListener('click', function() {
            // Aquí iría la lógica de login
            console.log('Iniciando sesión...');
            window.location.href = '/login.html'; // Redirigir a página de login
        });
    }
    
    // Navegación del menú superior
    const navItems = document.querySelectorAll('.nav-item');
    
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remover clase active de todos los items
            navItems.forEach(i => i.classList.remove('active'));
            // Agregar clase active al item clickeado
            this.classList.add('active');
            
            const section = this.textContent.trim();
            console.log('Navegando a sección:', section);
        });
    });
    
    // Función para actualizar las estadísticas (simulación)
    function updateStats() {
        const stats = [
            { label: 'Libros', value: Math.floor(Math.random() * 100) },
            { label: 'Usuarios', value: Math.floor(Math.random() * 50) },
            { label: 'Reservas', value: Math.floor(Math.random() * 30) },
            { label: 'Préstamos', value: Math.floor(Math.random() * 20) },
            { label: 'Multas', value: Math.floor(Math.random() * 5) }
        ];
        
        const statLabels = document.querySelectorAll('.stat-label');
        statLabels.forEach((label, index) => {
            if (stats[index]) {
                const newValue = stats[index].value;
                const percentage = (newValue / 100) * 100;
                
                // Actualizar el texto
                label.textContent = `${stats[index].label}: ${newValue}`;
                
                // Actualizar la barra de progreso
                const progressBar = label.parentElement.querySelector('.progress-fill');
                if (progressBar) {
                    progressBar.style.width = `${Math.min(percentage, 100)}%`;
                }
            }
        });
    }
    
    // Actualizar estadísticas cada 10 segundos (desactivado por defecto)
    // setInterval(updateStats, 10000);
    
    // Función para añadir nuevos elementos a las listas
    function addNewItem(cardIndex, itemText, description) {
        const cards = document.querySelectorAll('.card');
        if (cards[cardIndex]) {
            const newItem = document.createElement('div');
            newItem.className = 'card-item';
            newItem.innerHTML = `
                <div class="card-content">
                    <div class="card-row">
                        <span>${itemText}</span>
                        <span class="shortcut">⇧A</span>
                    </div>
                    <span class="card-description">${description}</span>
                </div>
            `;
            
            // Añadir el nuevo item después del separador
            const separator = cards[cardIndex].querySelector('.separator');
            if (separator && separator.nextElementSibling) {
                separator.parentNode.insertBefore(newItem, separator.nextElementSibling);
            }
            
            // Añadir eventos al nuevo item
            newItem.addEventListener('click', function() {
                console.log('Nuevo item seleccionado:', this.textContent);
            });
        }
    }
    
    // Ejemplo de uso:
    // addNewItem(0, 'Nuevo préstamo', 'Usuario: Juan Pérez - 13/01/2026');
    
    console.log('Sistema de gestión bibliotecaria cargado correctamente');
});

// Función para manejar el responsive del menú
window.addEventListener('resize', function() {
    const windowWidth = window.innerWidth;
    const sidebar = document.querySelector('.sidebar');
    
    if (windowWidth < 768) {
        sidebar.style.width = '150px';
    } else {
        sidebar.style.width = '200px';
    }
});
