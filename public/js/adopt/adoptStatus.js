// Simulasi data adopsi dari halaman konfirmasi
const dataAdopsi = [
    {
        nama: "Daisy",
        tanggalPengajuan: "2025-06-01",
        status: "Diproses",
        tanggalDisetujui: "-"
    },
    {
        nama: "Tommy",
        tanggalPengajuan: "2025-06-02",
        status: "Disetujui",
        tanggalDisetujui: "2025-06-03"
    },
    {
        nama: "Luna",
        tanggalPengajuan: "2025-06-04",
        status: "Disetujui",
        tanggalDisetujui: "-"
    }
];

const tbody = document.getElementById("adopsiTableBody");

dataAdopsi.forEach((data, index) => {
    const row = document.createElement("tr");

    row.innerHTML = `
        <td>${index + 1}</td>
        <td>${data.nama}</td>
        <td>${data.tanggalPengajuan}</td>
        <td>${data.status}</td>
        <td>${data.tanggalDisetujui}</td>
        <td><button onclick="lihatDetail('${data.nama}')">Lihat</button></td>
    `;

    tbody.appendChild(row);
});

function lihatDetail(nama) {
    // Simpan data nama hewan ke localStorage untuk digunakan di halaman detail
    localStorage.setItem("namaHewan", nama);

    // Pindah ke halaman detail
    const encodedNama = encodeURIComponent(nama);
    window.location.href = `/detail-sukses-adopsi?nama=${encodedNama}`;
}
window.lihatDetail = lihatDetail;


const cardContainer = document.getElementById("cardContainer");

dataAdopsi
    .filter(data => data.status === "Disetujui")
    .forEach(data => {
        const card = document.createElement("div");
        card.classList.add("card");

        card.innerHTML = `
            <div class="card-image-wrapper">
                <img src="img/kucing.jpeg" alt="${data.nama}" />
                <div class="overlay-text">${data.nama}</div>
                <span class="tag-icon">🐾</span>
                <button class="btn-detail" onclick="lihatDetail('${data.nama}')">Lihat Lebih Detail</button>
            </div>
        `;

        cardContainer.appendChild(card);
    });