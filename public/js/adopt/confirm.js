document.addEventListener("DOMContentLoaded", function() {
    // Mengambil data dari localStorage
    const petData = JSON.parse(localStorage.getItem('selectedPet')) || {};
    const formData = JSON.parse(localStorage.getItem('adoptionForm')) || {};

    // Mengisi informasi hewan
    document.getElementById("petImage").src = petData.image || '/img/default.jpg';
    document.getElementById("infoPetImage").src = petData.image || '/img/default.jpg';
    document.getElementById("infoPetName").textContent = petData.name || '-';
    document.getElementById("infoPetGender").textContent = petData.gender || '-';
    document.getElementById("infoPetAge").textContent = petData.age || '-';

    // Mengisi informasi pemohon
    document.getElementById("nama").value = formData.nama || '';
    document.getElementById("umur").value = formData.umur || '';
    document.getElementById("alamat").value = formData.alamat || '';
    document.getElementById("jenisRumah").value = formData.jenisRumah || '';
    document.getElementById("aktivitas").value = formData.aktivitas || '';
    document.getElementById("alasan").value = formData.alasan || '';

    // Mengatur checkbox dan tombol konfirmasi
    const checkbox = document.getElementById("agreementCheckbox");
    const confirmButton = document.getElementById("confirmButton");

    checkbox.addEventListener("change", function() {
        confirmButton.disabled = !this.checked;
    });
});

function goToSuksesAdopsi() {
    // Redirect ke halaman success
    window.location.href = '/adopt/success';
}

window.goToSuksesAdopsi = goToSuksesAdopsi; 