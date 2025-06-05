<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edukasi</title>
  <link rel="stylesheet" href="{{ asset('css/education.css') }}">
  <script src="{{ asset('js/education.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <header class="navbar">
            <a href="{{ route('profile.home') }}">Profile</a>
            <a href="{{ route('adopt.index') }}">Adoption</a>
            <a href="{{ route('fosterHome.form') }}">Foster</a>
            <a href="{{ route('donation.form') }}">Donations</a>
            <a href="{{ route('education.index') }}"class="active">Educations</a>
            <a href="{{ route('reports.create') }}">Stray Animal Report</a>
            </div>
        </div>
    </nav>
  </header>

  <main class="edukasi-section" id="landing-page">
    <section class="hero">
      <div class="hero-text">
        <h1>Rawat peliharaanmu dengan penuh cinta!</h1>
        <p>Panduan simpel biar hewan peliharaan tetap sehat, aktif, dan bahagia.</p>
        <a class="btn-tips" >Yuk, Cek Tipsnya!</a>
      </div>
      <div class="hero-img">
        <img src="{{ asset('image/edu-foto.png') }}" alt="Perempuan dengan kucing" />
      </div>
    </section>
  
    <section class="card-container" id="tips-section">
      <div class="card">
        <img src="{{ asset('image/edu-foto-dog.png') }}" alt="Memandikan anjing" />
        <h3>Cara memandikan anjing yang takut air dengan mudah!</h3>
        <a href="#" class="read-more" onclick="showTips('memandikan-anjing')">Selengkapnya <i class="fa-solid fa-circle-arrow-right"></i></a>
      </div>
      <div class="card">
        <img src="{{ asset('image/edu-foto-cat.png') }}"alt="Kucing stres" />
        <h3>Ketahui ini 10 ciri bahwa anabul mu sedang mengalami stress!</h3>
        <a href="#" class="read-more" onclick="showTips('kucing-stress')">Selengkapnya <i class="fa-solid fa-circle-arrow-right"></i></a>
      </div>
      <div class="card">
        <img src="{{ asset('image/edu-foto-bird.png') }}" alt="Burung sakit" />
        <h3>Tanda-Tanda Burung Kamu Sakit dan Cara Mengatasinya</h3>
        <a href="#" class="read-more" onclick="showTips('burung-sakit')">Selengkapnya <i class="fa-solid fa-circle-arrow-right"></i></a>
      </div>
    </section>
  </main>

  <main class="tips-detail-section" id="tips-page" style="display: none;">
    <div class="tips-container">

      <div class="back-button">
        <button onclick="showLanding()" class="btn-back">
          <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
        </button>
      </div>

      <article class="tips-content">
        <div class="tips-header">
          <img id="tips-image" src="" alt="" class="tips-main-image">
          <div class="tips-meta">
            <span class="tips-category" id="tips-category"></span>
            <h1 class="tips-title" id="tips-title"></h1>
            <div class="tips-info">
              <span class="tips-author" id="tips-author"></span>
              <span class="tips-date" id="tips-date"></span>
              <span class="tips-read-time" id="tips-read-time"></span>
            </div>
          </div>
        </div>

        <div class="tips-body">
          <p class="tips-intro" id="tips-intro"></p>
          
          <div class="tips-sections" id="tips-sections">
          
          </div>

          <div class="tips-list" id="tips-list">
            <h3>Tips Penting:</h3>
            <ul id="tips-points">
           
            </ul>
          </div>

          <div class="tips-conclusion">
            <h3>Kesimpulan</h3>
            <p id="tips-conclusion-text"></p>
          </div>
        </div>
      </article>
    </div>
  </main>

</body>
</html>