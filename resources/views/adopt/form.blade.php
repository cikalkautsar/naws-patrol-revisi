<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Adopsi</title>
    <link rel="stylesheet" href="{{ asset('css/adopt/adoptform.css') }}">
</head>
<body>
    <div class="container">
        <h2>Form Pengajuan Adopsi</h2>
        
        @if ($errors->any())
        <div class="error-container">
            <h3 style="color: #991b1b; margin-top: 0;">Ada beberapa kesalahan:</h3>
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form method="POST" action="{{ route('adopt.form.submit') }}">
            @csrf
            
            <div class="form-group">
                <label for="full_name">Nama Lengkap</label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required>
                @error('full_name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="age">Umur</label>
                <input type="number" name="age" id="age" value="{{ old('age') }}" required>
                @error('age')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" id="address" rows="3" required>{{ old('address') }}</textarea>
                @error('address')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="house_type">Jenis Rumah</label>
                <select name="house_type" id="house_type" required>
                    <option value="">Pilih jenis rumah</option>
                    <option value="Rumah Pribadi" {{ old('house_type') == 'Rumah Pribadi' ? 'selected' : '' }}>Rumah Pribadi</option>
                    <option value="Apartemen" {{ old('house_type') == 'Apartemen' ? 'selected' : '' }}>Apartemen</option>
                    <option value="Kos" {{ old('house_type') == 'Kos' ? 'selected' : '' }}>Kos</option>
                    <option value="Lainnya" {{ old('house_type') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('house_type')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="daily_activity">Aktivitas Harian</label>
                <textarea name="daily_activity" id="daily_activity" rows="3" placeholder="Ceritakan aktivitas harian Anda..." required>{{ old('daily_activity') }}</textarea>
                @error('daily_activity')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="reason">Alasan Adopsi</label>
                <textarea name="reason" id="reason" rows="4" placeholder="Mengapa Anda ingin mengadopsi hewan ini?" required>{{ old('reason') }}</textarea>
                @error('reason')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="submit-button">Ajukan Adopsi</button>
        </form>
    </div>
</body>
</html>