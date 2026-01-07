// Componentes JavaScript para interactividad adicional

document.addEventListener('DOMContentLoaded', function() {
    console.log('Componentes UI cargados correctamente');
    
    // Animación suave al hacer hover en las tarjetas
    const cards = document.querySelectorAll('.component-card, .stat-badge, .comparison-card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });
    
    // Log para debug
    console.log('Total de componentes interactivos:', cards.length);
});