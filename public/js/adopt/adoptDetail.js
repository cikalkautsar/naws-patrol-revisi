function applyAdoption() {
    // Ambil nama hewan dari URL
    const petName = document.getElementById('petName').textContent;
    
    // Redirect ke halaman form adopsi dengan parameter nama hewan
    window.location.href = `/adopt/form?nama=${encodeURIComponent(petName)}`;
}

// Format usia hewan
function formatAge(ageInMonths) {
    if (ageInMonths < 12) {
        return `${ageInMonths} bulan`;
    }
    const years = Math.floor(ageInMonths / 12);
    const months = ageInMonths % 12;
    return months > 0 ? `${years} tahun ${months} bulan` : `${years} tahun`;
} 