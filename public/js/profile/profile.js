document.addEventListener('DOMContentLoaded', function() {
    // Animasi untuk report cards
    const reportCards = document.querySelectorAll('.report-card');
    reportCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 6px 16px rgba(0,0,0,0.12)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
        });
    });

    // Animasi untuk tombol
    const buttons = document.querySelectorAll('.action-button');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });

        button.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Konfirmasi logout
    const logoutButton = document.querySelector('.logout-button');
    if (logoutButton) {
        logoutButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                // Submit form logout jika ada
                const logoutForm = document.querySelector('form[action="/logout"]');
                if (logoutForm) {
                    logoutForm.submit();
                }
            }
        });
    }

    // Settings button handler
    const settingsButton = document.querySelector('.settings-button');
    if (settingsButton) {
        settingsButton.addEventListener('click', function() {
            window.location.href = '/profile/settings';
        });
    }

    // Format angka untuk donasi
    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(amount);
    }

    // Update nilai donasi dengan format yang benar
    const donationValue = document.querySelector('.donation-value');
    if (donationValue) {
        const amount = parseInt(donationValue.dataset.amount || 0);
        donationValue.textContent = formatCurrency(amount);
    }
}); 