<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasi & Crowdfunding</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/donation/dataDonation.css') }}">
    <script src="{{ asset('js/donation/dataDonation.js') }}"></script>
</head>

<body>
    <nav class="nav-menu">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-6 text-white">
                <a href="{{ route('profile.home') }}">Profile</a>
                <a href="{{ route('adopt.index') }}">Adoption</a>
                <a href="{{ route('fosterHome.form') }}">Foster</a>
                <a href="{{ route('donation.form') }}" class="active">Donations</a>
                <a href="{{ route('education.index') }}">Educations</a>
                <a href="{{ route('reports.create') }}">Stray Animal Report</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Donasi & Crowdfunding</h1>

        <div class="wrapper">
            <div class="card image-card">
                <img src="{{ asset('img/cuteanimals.png') }}" alt="Hewan donasi" />
            </div>

            <div class="card form-card">
                <h2><span style="color:#FAAF32">Ayo</span> <span style="color:#2B6ED6">Berdonasi</span></h2>
                <form onsubmit="handleForm(event)">
                    <div class="form-section">
                        <input type="text" name="nama_depan" placeholder="Nama Depan" required />
                        <input type="text" name="nama_belakang" placeholder="Nama Belakang" required />
                        <input type="email" name="email" placeholder="Email" required />
                        <input type="tel" name="no_telp" placeholder="Nomor Telepon" required />

                        <div class="alamat-group">
                            <select name="provinsi" id="provinsi" required>
                                <option value="">Pilih Provinsi</option>
                            </select>

                            <select name="kabupaten" id="kabupaten" required>
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>

                            <input type="text" name="kode_pos" placeholder="Kode Pos" class="kodepos" />
                        </div>
                    </div>

                    <label class="checkbox">
                        <input type="checkbox" />
                        Donasi sebagai anggota organisasi
                    </label>

                    <input type="text" placeholder="Lainnya" class="lainnya" />

                    <label class="checkbox">
                        <input type="checkbox" />
                        Tetap beritahu saya lewat email
                    </label>

                    <div class="donation-amount">
                        <h3>Pilih Nominal Donasi</h3>
                        <div class="custom-amount">
                            <input type="number" name="nominal_donasi" id="nominal_donasi" placeholder="Masukkan Nominal Donasi" min="10000" step="1000" required />
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Lanjutkan Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>