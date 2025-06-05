<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Hewan - {{ $pet['name'] ?? 'Tidak Diketahui' }}</title>
  <link href="{{ asset('css/adopt/adoptDetail.css') }}" rel="stylesheet">
  <script src="{{ asset('js/adopt/adoptDetail.js') }}" defer></script>
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
  <div class="detail-container">
    <!-- Gambar utama -->
    <div class="main-image">
      <img id="petImage" src="{{ asset($pet['image'] ?? 'img/default.png') }}" alt="Pet Image" />
    </div>

    <!-- Konten bawah: deskripsi dan box adopsi -->
    <div class="bottom-content">
      <div class="left">
        <h1 id="petName">{{ $pet['name'] ?? 'Nama Hewan' }}</h1>
        <p>
          <span id="petBreed">{{ $pet['breed'] ?? '-' }}</span>
          <span class="dot-separator"></span>
          <span id="petLocation">{{ $pet['location'] ?? '-' }}</span>
          <hr />
        <p>
          <span id="petAge">{{ $pet['age'] ?? '-' }}</span>
          <span class="dot-separator"></span>
          <span id="petColor">{{ $pet['color'] ?? '-' }}</span>
          <span class="dot-separator"></span>
          <span id="petGender">{{ $pet['gender'] ?? '-' }}</span>
        </p>
        <hr />
        <h3>Tentang <span id="petNameTitle">{{ $pet['name'] ?? 'Hewan' }}</span></h3>
        <p id="petDescription">{{ $pet['description'] ?? 'Deskripsi hewan tidak tersedia.' }}</p>
      </div>
      <div class="right">
        <div class="adopt-box">
          <p>Tertarik mengadopsi <span id="petNameShort">{{ $pet['name'] ?? 'hewan ini' }}</span>?</p>
          <div class="adopt-center">
            <button onclick="applyAdoption()">Ajukan Adopsi</button>
            <a href="#">Baca Syarat & Ketentuan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html> 