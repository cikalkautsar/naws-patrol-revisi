<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/adopt/adoptStatus.css') }}" />
    <script src="{{ asset('js/adopt/adoptStatus.js') }}"></script>
    <title>Status Adopsi</title>
</head>

<body>
    <a href="{{ route('adopt.index') }}">&lt; Kembali</a>
    <h2>Status Adopsi</h2>

    <div class="alert">
        <span>!</span>
        <p>Data dibawah merupakan hewan yang akan di adopsi oleh anda jika verifikasi dari shelter sesuai dengan dan
            anda dapat diberi kepercayaan, jadilah sahabat yang baik bagi mereka</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Hewan</th>
                <th>Tanggal Pengajuan</th>
                <th>Status Pengajuan</th>
                <th>Tanggal Disetujui</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="adopsiTableBody">
            <tr>

            </tr>
        </tbody>
    </table>

    <div class="search-section">
        <h1>Daftar hewan yang anda adopsi</h1>
        <input type="text" placeholder="Cari nama hewan" />
    </div>

    <div id="cardContainer" class="card-container"></div>
    <div class="card-image-wrapper">
        
    </div>
    </div>
</body>

</html>