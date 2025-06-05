<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Naw's Patrol</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adopt/adopt.css') }}">
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/paw.png') }}" alt="Paw Print" class="paw-print">
        <nav class="nav-menu">
            <a href="{{ route('profile.home') }}">Profile</a>
            <a href="{{ route('adopt.index') }}"class="active">Adoption</a>
            <a href="{{ route('fosterHome.form') }}">Foster</a>
            <a href="{{ route('donation.form') }}">Donations</a>
            <a href="{{ route('education.index') }}">Educations</a>
            <a href="{{ route('reports.create') }}">Stray Animal Report</a>
        </nav>
        <div class="header-content">
            <div class="header-container">
                <h1>Naw's Patrol</h1>
                <p>A system designed to address the issue of stray animals in Indonesia<br>especially cats and dogs.</p>
            </div>
        </div>
    </div>
    <section class="adoption-category">
        <div class="container">
            <h2>Adoption Category</h2>
            <p>Search for the Animal Category You Want to Adopt</p>
        </div>
        <div class="category-container">
            <div class="category cats" onclick="goToPage('cats')">
                <span>Cats</span>
                <div class="category-icon">
                    <img src="{{ asset('img/cat.png') }}" alt="Cats" />
                </div>
            </div>
            <div class="category dogs" onclick="goToPage('dogs')">
                <span>Dogs</span>
                <img src="{{ asset('img/dog.png') }}" alt="Dogs" />
            </div>
            <div class="category birds" onclick="goToPage('birds')">
                <span>Birds</span>
                <img src="{{ asset('img/bird.png') }}" alt="Birds" />
            </div>
            <div class="category rabbits" onclick="goToPage('rabbits')">
                <span>Rabbits</span>
                <img src="{{ asset('img/rabbit.png') }}" alt="Rabbits" />
            </div>
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search..." />
                <button onclick="searchCategory()">
                    <img src="{{ asset('img/search.png') }}" alt="Search" />
                </button>
            </div>
        </div>
    </section>

    <section id="category-results" style="display: none;">
        <div class="container">
            <h3 id="category-title"></h3>
            <p id="category-subtitle"></p>
            <div id="category-pets" class="pet-cards"></div>
            <div id="pagination-controls"></div>
        </div>
    </section>

    <section id="default-pets" class="adoption-section">
        <div class="section-header">
            <h2>Adoption status</h2>
            <a href="{{ route('adopt.adoptStatus') }}">View All</a>
        </div>
        <p class="section-description">Pet adoption is quickly becoming the preferred way to find a new dog, puppy, cat,
            kitten or etc.</p>

        <div class="section-header">
            <h2>Help Me Find a Home</h2>
            <a href="{{ route('adopt.help') }}">View All</a>
        </div>
        <p class="section-description">Pet adoption is quickly becoming the preferred way to find a new dog, puppy, cat,
            kitten or etc.</p>
        <div id="default-pet-cards" class="pet-cards"></div>
    </section>

    <script src="{{ asset('js/adopt/adopt.js') }}"></script>
</body>
</html>