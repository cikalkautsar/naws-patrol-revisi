<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Konfirmasi Adopsi</title>
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adopt/confirm.css') }}" rel="stylesheet">
    <script src="{{ asset('js/adopt/confirm.js') }}" defer></script>
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
        <div class="main-image">
            <img id="petImage" src="{{ asset('img/default.jpg') }}" alt="Pet Image" />
        </div>
    </div>

    <div class="stepper">
        <div class="step completed"><span class="checkmark">&#10003;</span></div>
        <div class="line"></div>
        <div class="step completed"><span class="checkmark">&#10003;</span></div>
        <div class="line"></div>
        <div class="step active"><span class="number">3</span></div>
    </div>

    <div class="form-container">
        <h2 class="title-center">Konfirmasi Adopsi</h2>
        <div class="pet-info-box">
            <div class="pet-info-image">
                <img id="infoPetImage" src="{{ asset('img/default.jpg') }}" alt="Pet Image" />
            </div>
            <div class="pet-info-details">
                <div class="info-item">
                    <img src="{{ asset('img/namahewan.png') }}" alt="Icon" />
                    <div>
                        <strong>Nama Hewan</strong><br />
                        <span id="infoPetName">-</span>
                    </div>
                </div>
                <div class="info-item">
                    <img src="{{ asset('img/gender.png') }}" alt="Icon" />
                    <div>
                        <strong>Jenis Kelamin</strong><br />
                        <span id="infoPetGender">-</span>
                    </div>
                </div>
                <div class="info-item">
                    <img src="{{ asset('img/usia.png') }}" alt="Icon" />
                    <div>
                        <strong>Usia</strong><br />
                        <span id="infoPetAge">-</span>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="title-right">Informasi Pemohon</h2>
        <form id="adoptForm" method="POST" action="{{ route('adopt.form.submit') }}">
            @csrf
            <div class="form-group">
                <div class="form-label-wrapper"><label>Nama Lengkap</label></div>
                <div class="vertical-line"></div>
                <div class="form-input-wrapper">
                    <input type="text" id="nama" readonly />
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-wrapper"><label>Umur</label></div>
                <div class="vertical-line"></div>
                <div class="form-input-wrapper">
                    <input type="number" id="umur" readonly />
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-wrapper"><label>Alamat</label></div>
                <div class="vertical-line"></div>
                <div class="form-input-wrapper">
                    <input type="text" id="alamat" readonly />
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-wrapper"><label>Jenis Rumah</label></div>
                <div class="vertical-line"></div>
                <div class="form-input-wrapper">
                    <input type="text" id="jenisRumah" readonly />
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-wrapper"><label>Aktivitas Harian</label></div>
                <div class="vertical-line"></div>
                <div class="form-input-wrapper">
                    <input type="text" id="aktivitas" readonly />
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-wrapper"><label>Alasan Adopsi</label></div>
                <div class="vertical-line"></div>
                <div class="form-input-wrapper">
                    <textarea rows="3" id="alasan" readonly></textarea>
                </div>
            </div>

            <label>
                <input type="checkbox" id="agreementCheckbox">
                Saya menyetujui semua syarat dan ketentuan adopsi.
            </label>

            <div class="submit-section">
                <button type="button" id="confirmButton" onclick="window.location.href='{{ route('adopt.success') }}'" disabled>Konfirmasi</button>
                <a href="#">Baca Syarat dan Ketentuan</a>
            </div>
        </form>
    </div>
</body>
</html> 