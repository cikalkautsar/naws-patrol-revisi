<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register As Foster Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/foster/register.css') }}">
</head>
<body>
    <div class="foster-container">
        <div class="form-container">
            <h1>Register As Foster Home</h1>
            
            <form method="POST" action="{{ route('foster.register') }}" class="foster-form">
                @csrf
                
                <div class="form-group">
                    <input type="text" name="name" id="name" required value="{{ old('name') }}" />
                    <label for="name">Name</label>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" />
                    <label for="email">Email</label>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password" id="password" required />
                    <label for="password">Password</label>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="tel" name="phone" id="phone" required value="{{ old('phone') }}" />
                    <label for="phone">Number phone</label>
                    @error('phone')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-action">
                    <button type="submit" class="join-button">
                        Join us
                        <div class="button-toggle"></div>
                    </button>
                </div>
            </form>
        </div>
        
        <div class="cats-image">
            <!-- Gambar kucing akan ditambahkan melalui CSS sebagai background -->
        </div>
    </div>
</body>
</html> 