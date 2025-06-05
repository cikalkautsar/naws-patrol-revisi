document.addEventListener('DOMContentLoaded', function() {
    // Add animation class to cards when they come into view
    const cards = document.querySelectorAll('.animal-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    cards.forEach(card => {
        observer.observe(card);
    });

    // Add click event to foster links
    const fosterLinks = document.querySelectorAll('.text-yellow-400');
    fosterLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const animalName = this.closest('.animal-card').querySelector('h3').textContent;
            alert(`Terima kasih telah memilih untuk memfostering ${animalName}! Kami akan menghubungi Anda segera.`);
        });
    });
}); 