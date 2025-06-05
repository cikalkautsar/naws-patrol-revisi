<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register As Foster Home</title>
  <link rel="stylesheet" href="{{ asset('css/fosterHome/fosterHome.css') }}">

</head>
<body>
  <button class="back-button" onclick="goBack()"> ← </button>

  <div class="container">
    <h2>Register As Foster Home</h2>
    <div class="border-gradient">
      <form method="POST" action="{{ route('fosterHome.register') }}" class="form-box">
        @csrf
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="text" name="phone" placeholder="Number Phone" required />
        <button type="submit" class="slider-button">next</button>
      </form>
    </div>
    <div class="cat-container">
      <img src="{{ asset('image/cat.png') }}" alt="Cats" class="cat-img" />
    </div>
  </div>

  <script>
    function goBack() {
      window.location.href = "{{ route('dashboard') }}";
    }
  </script>
</body>
</html>