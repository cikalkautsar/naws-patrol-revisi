<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adopsi Berhasil</title>
    <link href="{{ asset('css/adopt/success.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
<header class="header">
    <img src="{{ asset('img/paw.png') }}" alt="Paw Print" class="paw-print">
    <nav class="nav-menu">
            <a href="{{ route('profile.home') }}">Profile</a>
            <a href="{{ route('adopt.index') }}"class="active">Adoption</a>
            <a href="{{ route('fosterHome.form') }}">Foster</a>
            <a href="{{ route('donation.form') }}">Donations</a>
            <a href="{{ route('education.index') }}">Educations</a>
            <a href="{{ route('reports.create') }}">Stray Animal Report</a>
        </nav>
        <div class="hero">
            <h1>Naw's Patrol</h1>
            <p>A system designed to address the issue of stray animals in Indonesia especially cats and dogs.</p>
        </div>
</header>
    <div class="success-container">
        <div class="success-icon">
            <img src="{{ asset('img/success-icon.png') }}" alt="Success" />
        </div>
        <h1>Terima Kasih!</h1>
        <p class="message">Pengajuan adopsi Anda telah berhasil dikirim.</p>
        <p class="sub-message">Tim kami akan menghubungi Anda dalam waktu 2x24 jam untuk proses selanjutnya.</p>
        
        <div class="pet-info">
            <img id="petImage" src="{{ asset('img/default.jpg') }}" alt="Pet Image" class="pet-image" />
            <div class="pet-details">
                <h3 id="petName">-</h3>
                <p id="petDescription">-</p>
            </div>
        </div>

        <div class="buttons">
            <a href="{{ route('adopt.adoptStatus') }}" class="btn primary">Lihat Status Adopsi</a>
            <a href="{{ route('adopt.index') }}" class="btn secondary">Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil data hewan dari localStorage
            const petData = JSON.parse(localStorage.getItem('selectedPet')) || {};
            
            // Mengisi informasi hewan
            document.getElementById('petImage').src = petData.image || '/img/default.jpg';
            document.getElementById('petName').textContent = petData.name || 'Hewan Pilihan Anda';
            document.getElementById('petDescription').textContent = 
                `${petData.breed || ''} ${petData.gender || ''} ${petData.age || ''}`.trim() || 
                'Terima kasih telah memilih untuk mengadopsi hewan dari Naw\'s Patrol';
            
            // Membersihkan localStorage karena sudah tidak diperlukan
            localStorage.removeItem('selectedPet');
            localStorage.removeItem('adoptionForm');
        });
    </script>
</body>

</html>