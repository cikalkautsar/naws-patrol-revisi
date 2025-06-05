<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naw's Patrol - Pet Adoption</title>
    <link rel="stylesheet" href="{{ asset('css/fosterHome/fosterLanding.css') }}">
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
    <div class="teks-adopsi">
        <div onclick="goToFosterInfo()" style="cursor: pointer;">
            <h2 class="section-title">Foster Home Info</h2>
            <p class="section-subtitle">Search for the Animal Category You Want to Adopt</p>
        </div>
    </div>

    <div class="teks-adopsi">
        <h2 class="section-title">Animals That Need Foster Homes</h2>
        <p class="section-subtitle">Search for Animals Looking for a Loving Foster Home</p>
    </div>

    <main class="main-content">
        <section class="adoption-section">            
            <section class="adoption-grid-section" id="foster-section">
                <a href="javascript:void(0)" class="view-all" onclick="updatePetGrid('cats', true); scrollToGrid()">View All</a>

                <div class="pet-grid" id="pet-grid">
                </div>
            </section>
        </section>
    </main>

    <div class="teks-report">
        <h2 class="section-title">Progress Report</h2>
    </div>

    <main class="main-content">
        <section class="adoption-section">            
            <section class="adoption-grid-section" id="progress-section">
                <a href="javascript:void(0)" class="view-all" onclick="renderProgressSample()">View All</a>
                <div class="progress-report-container hidden" id="progress-report">
                </div>
            </section>
        </section>
    </main>

    <script>
        const petData = {
            cats: [
                {
                    name: "Luna",
                    breed: "Domestik",
                    age: "2 Tahun",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-cat-image.jpg",
                    gender: "Betina",
                    health: "Sehat",
                    description: "Kucing yang sangat ramah dan suka bermain"
                },
                {
                    name: "Milo", 
                    breed: "Sphynx",
                    age: "1 Tahun",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-cat-image-1.jpg",
                    gender: "Jantan",
                    health: "Sehat",
                    description: "Kucing Sphynx yang aktif dan lucu"
                },
                {
                    name: "Whiskers",
                    breed: "Domestik",
                    age: "4 bulan", 
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-cat-image-2.jpg",
                    gender: "Jantan",
                    health: "Sehat",
                    description: "Anak kucing yang menggemaskan"
                },
                {
                    name: "Buddy",
                    breed: "Golden Retriever Mix", 
                    age: "2 Tahun",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-dog-image.jpg",
                    gender: "Jantan",
                    health: "Sehat",
                    description: "Anjing yang loyal dan ramah keluarga"
                },
                {
                    name: "Max",
                    breed: "Labrador Mix",
                    age: "1.5 Tahun",
                    status: "Siap Adopsi", 
                    image: "/image/foster-home/landing-dog-image-1.jpg",
                    gender: "Jantan",
                    health: "Sehat",
                    description: "Anjing energik yang suka bermain"
                },
                {
                    name: "Bella",
                    breed: "Husky Mix",
                    age: "3 Tahun",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-dog-image-2.jpg",
                    gender: "Betina",
                    health: "Sehat",
                    description: "Husky cantik dengan mata biru"
                },
                {
                    name: "Sunny",
                    breed: "Canary",
                    age: "6 Bulan", 
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-bird-image.jpg",
                    gender: "Jantan",
                    health: "Sehat",
                    description: "Burung kenari yang rajin berkicau"
                },
                {
                    name: "Rainbow",
                    breed: "Lovebird",
                    age: "1 Tahun",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-bird-image-1.jpg",
                    gender: "Betina",
                    health: "Sehat",
                    description: "Lovebird warna-warni yang cantik"
                },
                {
                    name: "Kiwi",
                    breed: "Cockatiel",
                    age: "8 Bulan",
                    status: "Siap Adopsi", 
                    image: "/image/foster-home/landing-bird-image-2.jpg",
                    gender: "Jantan",
                    health: "Sehat",
                    description: "Cockatiel yang pandai meniru suara"
                },
                {
                    name: "Snowball",
                    breed: "Holland Lop",
                    age: "1 Tahun",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-rabbit-image.jpg",
                    gender: "Betina",
                    health: "Sehat",
                    description: "Kelinci putih dengan telinga lop"
                },
                {
                    name: "Cocoa", 
                    breed: "Mini Rex",
                    age: "6 Bulan",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-rabbit-image-1.jpg",
                    gender: "Jantan",
                    health: "Sehat",
                    description: "Kelinci mini rex dengan bulu halus"
                },
                {
                    name: "Marshmallow",
                    breed: "Lionhead",
                    age: "2 Tahun",
                    status: "Siap Adopsi",
                    image: "/image/foster-home/landing-rabbit-image-2.jpg",
                    gender: "Betina",
                    health: "Sehat",
                    description: "Kelinci lionhead dengan 'surai' lucu"
                }
            ]
        };

        let currentCategory = 'cats';

        function scrollToGrid() {
            const petGrid = document.getElementById('pet-grid');
            if (petGrid) {
                petGrid.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        function renderProgressSample() {
            const samplePet = petData.cats[0]; 

            const container = document.getElementById('progress-report');
            container.classList.remove('hidden');
            container.innerHTML = `
                <div class="progress-card" onclick="goToProgressReport('${samplePet.name}')" style="cursor: pointer;">
                    <div class="progress-image" style="background-image: url('${samplePet.image}')"></div>
                    <div class="progress-info">
                        <h3>${samplePet.name}</h3>
                        <p><strong>Breed:</strong> ${samplePet.breed}</p>
                        <p><strong>Age:</strong> ${samplePet.age}</p>
                        <p><strong>Status:</strong> ${samplePet.status}</p>
                        <p><strong>Progress:</strong> Ditemukan → Dirawat → Siap Menjadi Teman</p>
                    </div>
                </div>
            `;
        }

        function goToProgressReport(petName) {
            window.location.href = `/fosterHome/report?pet=${encodeURIComponent(petName)}`;
        }

        function createPetCard(pet) {
            return `
                <div class="pet-card" onclick="showPetDetails('${pet.name}')">
                    <div class="pet-image" style="background-image: url('${pet.image}')"></div>
                    <div class="pet-info">
                        <h3 class="pet-name">${pet.name}</h3>
                        <p class="pet-breed">${pet.breed}</p>
                        <div class="pet-details">
                            <div class="pet-detail">
                                <span class="icon"></span>
                                <span>${pet.age}</span>
                            </div>
                            <div class="pet-detail">
                                <span class="icon"></span>
                                <span>${pet.status}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function updatePetGrid(category, showAll) {
            const petGrid = document.getElementById('pet-grid');
            const pets = petData[category] || petData.cats;
            const toShow = showAll ? pets : pets.slice(0, 3);

            petGrid.innerHTML = toShow.map(pet => createPetCard(pet)).join('');

            if (!showAll) {
                addPetCardListeners();
            } else {
                addPetCardListeners();
            }
        }

        function addPetCardListeners() {
            document.querySelectorAll('.pet-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 15px 35px rgba(0,0,0,0.15)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 5px 20px rgba(0,0,0,0.1)';
                });
            });
        }

        function showCategoryMessage(category) {
            const messages = {
                cats: "You've selected Cats!",
                dogs: "You've selected Dogs!", 
                birds: "You've selected Birds!",
                rabbits: "You've selected Rabbits!"
            };

            const existingMessage = document.querySelector('.category-message');
            if (existingMessage) {
                existingMessage.remove();
            }

            const messageDiv = document.createElement('div');
            messageDiv.className = 'category-message';
            messageDiv.textContent = messages[category];
            
            document.body.appendChild(messageDiv);

            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.remove();
                }
            }, 3000);
        }
        
        function showPetDetails(petName) {
            const pet = petData.cats.find(p => p.name === petName);
            if (pet) {
                // Menggunakan route yang sudah didefinisikan
                window.location.href = "{{ route('foster.form', ['id' => ':id']) }}".replace(':id', 1);
            }
        }

        function closePetModal() {
            const modal = document.querySelector('.pet-modal');
            if (modal) {
                modal.style.animation = 'fadeOut 0.3s ease forwards';
                setTimeout(() => modal.remove(), 300);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updatePetGrid('cats', false);

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                if (anchor.getAttribute('href') !== 'javascript:void(0)') {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                }
            });

            const loginBtn = document.querySelector('.login-btn');
            if (loginBtn) {
                loginBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert('Login functionality would include:\n\n- User authentication\n- Registration for new users\n- Social media login options\n- Password recovery');
                });
            }
            initializeAnimations();
        });

        function initializeAnimations() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.category-card').forEach(function(el) {
                observer.observe(el);
            });
        }

        function goToFosterInfo() {
            try {
                window.location.href = "{{ route('foster.info') }}";
            } catch (error) {
                console.error('Error navigating to foster info:', error);
                // Fallback to direct URL if route fails
                window.location.href = '/foster/info';
            }
        }
        
        function goBack() {
            try {
                window.location.href = "{{ route('fosterHome.form') }}";
            } catch (error) {
                console.error('Error navigating back:', error);
                // Fallback to direct URL if route fails
                window.location.href = '/fosterHome';
            }
        }

        function showPetModal(petId) {
            const pet = pets.find(p => p.id === petId);
            if (pet) {
                // Redirect ke halaman foster form dengan parameter ID pet
                window.location.href = `/foster/form/${petId}`;
            }
        }
    </script>
</body>
</html>