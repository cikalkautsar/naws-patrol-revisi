<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Adopsi</title>
  <link href="{{ asset('css/adopt/adoptform.css') }}" rel="stylesheet">
  <script src="{{ asset('js/adopt/adoptForm.js') }}"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
<header class="header">
    <img src="{{ asset('img/paw.png') }}" alt="Paw Print" class="paw-print">
    <nav class="nav-menu">
            <a href="{{ route('profile.home') }}" class="active">Profile</a>
            <a href="{{ route('adopt.index') }}">Adoption</a>
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
      <img id="petImage" src="{{ asset('img/kucing.jpeg') }}" alt="Pet Image" />
    </div>
  </div>

  <div class="stepper">
    <div class="step completed">
      <span class="checkmark">&#10003;</span>
    </div>
    <div class="line"></div>
    <div class="step active">
      <span class="number">2</span>
    </div>
    <div class="line"></div>
    <div class="step">
      <span class="number">3</span>
    </div>
  </div>

  <!-- Container Form -->
  <div class="form-container">
    <h2>Isi Formulir Pengajuan Adopsi</h2>
    <form method="POST" action="{{ route('adopt.form.submit') }}" id="adoptForm">
      @csrf
      <div class="form-group">
        <div class="form-label-wrapper">
          <label>Nama Lengkap</label>
        </div>
        <div class="vertical-line"></div>
        <div class="form-input-wrapper">
          <input type="text" name="full_name" id="full_name" required />
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-wrapper">
          <label>Umur</label>
        </div>
        <div class="vertical-line"></div>
        <div class="form-input-wrapper">
          <input type="number" name="age" id="age" required />
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-wrapper">
          <label>Alamat</label>
        </div>
        <div class="vertical-line"></div>
        <div class="form-input-wrapper">
          <input type="text" name="address" id="address" required />
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-wrapper">
          <label>Jenis Rumah</label>
        </div>
        <div class="vertical-line"></div>
        <div class="form-input-wrapper">
          <input type="text" name="house_type" id="house_type" required />
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-wrapper">
          <label>Aktivitas Harian</label>
        </div>
        <div class="vertical-line"></div>
        <div class="form-input-wrapper">
          <input type="text" name="daily_activity" id="daily_activity" required />
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-wrapper">
          <label>Alasan Adopsi</label>
        </div>
        <div class="vertical-line"></div>
        <div class="form-input-wrapper">
          <textarea rows="3" name="reason" id="reason" required></textarea>
        </div>
      </div>

      <div class="submit-section">
        <button type="submit" id="submitButton">Ajukan Adopsi</button>
        <a href="#">Baca Syarat Dan Ketentuan</a>
      </div>
    </form>
  </div>

  <script>
    const petImages = {
      "Daisy": "{{ asset('img/kucing.jpeg') }}",
      "Max": "{{ asset('img/max.png') }}",
      "Luna": "{{ asset('img/luna.png') }}"
    };

    // Get pet name from URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const petName = urlParams.get('nama');
    
    // Update image if pet name exists in our mapping
    if (petName && petImages[petName]) {
      document.getElementById('petImage').src = petImages[petName];
    }

    // Simpan data form ke localStorage sebelum submit
    document.getElementById('adoptForm').addEventListener('submit', function(e) {
      const formData = {
        nama: document.getElementById('full_name').value,
        umur: document.getElementById('age').value,
        alamat: document.getElementById('address').value,
        jenisRumah: document.getElementById('house_type').value,
        aktivitas: document.getElementById('daily_activity').value,
        alasan: document.getElementById('reason').value
      };

      localStorage.setItem('adoptionForm', JSON.stringify(formData));

      // Jika ada data hewan yang dipilih
      if (petName && petImages[petName]) {
        const petData = {
          name: petName,
          image: petImages[petName],
          gender: 'Belum diisi', // Ini bisa diambil dari data hewan jika tersedia
          age: 'Belum diisi'     // Ini bisa diambil dari data hewan jika tersedia
        };
        localStorage.setItem('selectedPet', JSON.stringify(petData));
      }
    });
  </script>
</body>

</html>