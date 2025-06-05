<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pelaporan Hewan Liar</title>
  <link rel="stylesheet" href="{{ asset('css/report/formReport.css') }}">
  <script src="{{ asset('js/report/formReport') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<header class="navbar">
            <a href="{{ route('profile.home') }}">Profile</a>
            <a href="{{ route('adopt.index') }}">Adoption</a>
            <a href="{{ route('fosterHome.form') }}">Foster</a>
            <a href="{{ route('donation.form') }}">Donations</a>
            <a href="{{ route('education.index') }}">Educations</a>
            <a href="{{ route('reports.create') }}"class="active">Stray Animal Report</a>
            </div>
        </div>
  </header>
  <main>
    <section class="camera-upload">
      <input type="file" id="uploadFoto" name="foto" accept="image/*" hidden required />
      <label for="uploadFoto" class="camera-box">
        <img src="https://img.icons8.com/ios/100/camera--v1.png" alt="Camera Icon" id="previewFoto" />
        <p class="upload-hint"></p>
      </label>
    </section>

    <section class="location">
      <p>
        <span class="location-icon"><i class="fa-solid fa-location-dot"></i></span>
        <a href="#" id="lokasi">Klik untuk ambil lokasi</a>
        <input type="hidden" id="lokasiValue" name="lokasi" />
      </p>
    </section>

    <section class="report-form">
      <h2>Pelaporan hewan liar</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      
        <input type="hidden" name="lokasi_koordinat" id="lokasiKoordinat" />
        
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required />
        </div>
        
        <div class="form-group">
          <label for="telepon">Nomor HP </label>
          <input type="tel" name="telepon" id="telepon" value="{{ old('telepon') }}" placeholder="08xxxxxxxxxx" required />
        </div>
        
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
          <label for="alasan">Alasan melapor</label>
          <textarea name="alasan" id="alasan" placeholder="Jelaskan kondisi hewan dan alasan melapor..." required>{{ old('alasan') }}</textarea>
        </div>
        <button type="submit" class="submit-btn" onclick="window.location.href='{{ route('reports.process') }}'">
          <i class></i> Laporkan
        </button>
        
        <a href="#" class="terms-link">Baca Syarat Dan Ketentuan</a>
      </form>
    </section>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (document.getElementById('lokasi')) {
        initReportPage();
      }
    });

    function initReportPage() {
      // Handle location click
      document.getElementById("lokasi").addEventListener("click", handleLocation);
      
      // Handle photo upload
      document.getElementById("uploadFoto").addEventListener("change", handlePhotoUpload);
      
      // Handle form submission with validation only
      document.querySelector('form').addEventListener('submit', handleFormValidation);
    }

    function handleLocation(e) {
      e.preventDefault();
      
      if (!navigator.geolocation) {
        showAlert("Browser tidak mendukung geolocation.", "error");
        return;
      }
      
      showAlert("Mengambil lokasi...", "info");
      
      navigator.geolocation.getCurrentPosition(
        function(pos) {
          const lat = pos.coords.latitude;
          const lon = pos.coords.longitude;
          const link = `https://maps.google.com/?q=${lat},${lon}`;
          
          document.getElementById("lokasiValue").value = link;
          document.getElementById("lokasi").textContent = "Lokasi tersimpan!";
          document.getElementById("lokasi").style.color = "#28a745";
          showAlert("Lokasi berhasil disimpan", "success");
        },
        function(error) {
          const errorMessages = {
            1: "Izin lokasi ditolak",
            2: "Informasi lokasi tidak tersedia", 
            3: "Waktu permintaan habis"
          };
          showAlert(errorMessages[error.code] || "Gagal mengambil lokasi", "error");
        }
      );
    }

    function handlePhotoUpload(e) {
      const file = e.target.files[0];
      if (!file) return;

      // Check file size (max 500MB)
      if (file.size > 500 * 1024 * 1024) {
        showAlert("Ukuran file maksimal 500MB", "error");
        e.target.value = ''; // Reset input
        return;
      }

      const reader = new FileReader();
      reader.onload = function(event) {
        document.getElementById('previewFoto').src = event.target.result;
        document.getElementById('previewFoto').style.width = '100px';
        document.getElementById('previewFoto').style.height = '100px';
        document.getElementById('previewFoto').style.objectFit = 'cover';
      };
      reader.readAsDataURL(file);
    }

    function handleFormValidation(e) {
      const form = e.target;
      
      // Get form data
      const formData = {
        nama: form.nama.value.trim(),
        telepon: form.telepon.value.trim(), 
        alamat: form.alamat.value.trim(),
        alasan: form.alasan.value.trim(),
        lokasi: document.getElementById('lokasiValue').value,
        foto: document.getElementById('uploadFoto').files[0]
      };

      // Validation
      let hasError = false;

      if (!formData.nama) {
        showAlert("Nama lengkap harus diisi", "error");
        hasError = true;
      }

      if (!formData.telepon) {
        showAlert("Nomor HP harus diisi", "error");
        hasError = true;
      } else if (!/^[0-9+\-\s()]{8,15}$/.test(formData.telepon)) {
        showAlert("Format nomor HP tidak valid", "error");
        hasError = true;
      }

      if (!formData.alamat) {
        showAlert("Alamat harus diisi", "error");
        hasError = true;
      }

      if (!formData.alasan) {
        showAlert("Alasan melapor harus diisi", "error");
        hasError = true;
      }

      if (!formData.lokasi) {
        showAlert("Silakan ambil lokasi terlebih dahulu", "error");
        hasError = true;
      }

      if (!formData.foto) {
        showAlert("Foto hewan harus diupload", "error");
        hasError = true;
      }

      // Jika ada error, hentikan submit
      if (hasError) {
        e.preventDefault();
        return false;
      }

      // Jika validasi lolos, tampilkan loading spinner
      showLoadingSpinner();
      showAlert("Mengirim laporan...", "info");
      
      // Biarkan form submit ke Laravel
      return true;
    }

    function showLoadingSpinner() {
      const submitBtn = document.querySelector('.submit-btn');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengirim...';
      }
    }

    function showAlert(message, type = "info") {
      // Hapus alert yang sudah ada
      const existingAlert = document.querySelector('.custom-alert');
      if (existingAlert) {
        existingAlert.remove();
      }

      // Buat elemen alert baru
      const alert = document.createElement('div');
      alert.className = `custom-alert ${type}`;
      alert.textContent = message;
      
      // Style popup tetap inline (kecuali ini, CSS utama tidak diubah)
      alert.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        z-index: 9999;
        max-width: 300px;
        word-wrap: break-word;
      `;

      switch(type) {
        case 'success':
          alert.style.backgroundColor = '#28a745';
          break;
        case 'error':
          alert.style.backgroundColor = '#dc3545';
          break;
        case 'warning':
          alert.style.backgroundColor = '#ffc107';
          alert.style.color = '#212529';
          break;
        case 'info':
        default:
          alert.style.backgroundColor = '#17a2b8';
          break;
      }

      document.body.appendChild(alert);
      
      // Hapus otomatis setelah 3 detik
      setTimeout(() => {
        if (alert && alert.parentNode) {
          alert.remove();
        }
      }, 3000);
    }

    // Fungsi untuk format nomor HP
    function formatPhoneNumber(phoneNumber) {
      let cleaned = phoneNumber.replace(/[^\d+]/g, '');
      if (cleaned.startsWith('0')) {
        cleaned = '+62' + cleaned.substring(1);
      }
      return cleaned;
    }

    // Input formatting untuk nomor HP
    document.addEventListener('DOMContentLoaded', function() {
      const phoneInput = document.querySelector('input[name="telepon"]');
      if (phoneInput) {
        phoneInput.addEventListener('blur', function() {
          if (this.value) {
            this.value = formatPhoneNumber(this.value);
          }
        });
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      console.log('Page loaded, initializing...');
    });
  </script>
</body>
</html>