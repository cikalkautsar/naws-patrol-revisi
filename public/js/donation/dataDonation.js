document.addEventListener('DOMContentLoaded', function() {
    const provinsiSelect = document.getElementById('provinsi');
    const kabupatenSelect = document.getElementById('kabupaten');
    
    // Fetch Provinsi
    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
        .then(response => response.json())
        .then(provinces => {
            provinces.forEach(province => {
                const option = document.createElement('option');
                option.value = province.id;
                option.textContent = province.name;
                provinsiSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));

    // Event listener untuk perubahan provinsi
    provinsiSelect.addEventListener('change', function() {
        const provinceId = this.value;
        kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
        
        if(provinceId) {
            // Fetch Kabupaten berdasarkan Provinsi yang dipilih
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                .then(response => response.json())
                .then(regencies => {
                    regencies.forEach(regency => {
                        const option = document.createElement('option');
                        option.value = regency.id;
                        option.textContent = regency.name;
                        kabupatenSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });

    // Handle form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
    });

    // Handle donation amount buttons
    const amountButtons = document.querySelectorAll('.amount-btn');
    const customAmountInput = document.getElementById('nominal_donasi');

    amountButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove selected class from all buttons
            amountButtons.forEach(btn => btn.classList.remove('selected'));
            // Add selected class to clicked button
            this.classList.add('selected');
            // Set the amount in the custom input
            customAmountInput.value = this.dataset.amount;
        });
    });

    // Handle custom amount input
    customAmountInput.addEventListener('input', function() {
        // Remove selected class from all buttons when typing custom amount
        amountButtons.forEach(btn => btn.classList.remove('selected'));
    });
});

// Ambil parameter URL
function getQueryParam(key) {
    const params = new URLSearchParams(window.location.search);
    return params.get(key) || '';
}

// Buat fungsi global supaya bisa dipanggil dari onsubmit inline
window.handleForm = function(e) {
    e.preventDefault();
    const amount = document.getElementById('nominal_donasi').value || "0";
    window.location.href = `/metode-donasi?amount=${amount}`;
};
