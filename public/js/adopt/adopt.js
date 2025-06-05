window.goToPage = function(page) {
    showCategoryResults(page.replace('.html', ''));
}


window.searchCategory = function () {
    const input = document.getElementById('searchInput').value.toLowerCase();
    switch (input) {
        case 'cats':
            goToPage('cats.html');
            break;
        case 'dogs':
            goToPage('dogs.html');
            break;
        case 'birds':
            goToPage('birds.html');
            break;
        case 'rabbits':
            goToPage('rabbits.html');
            break;
        default:
            alert('Category not found. Try Cats, Dogs, Birds, or Rabbits.');
    }
}

const allPets = {
    cats: [
        { name: "Daisy", breed: "Mix Dom Anggora", age: "1 Tahun", color: "Putih Lilac", image: "img/kucing.jpeg" },
        { name: "Mochi", breed: "Mix Dom Anggora", age: "2 Tahun", color: "Biru abu", image: "img/kucing.jpeg" },
        { name: "Neko", breed: "Mix Dom Anggora", age: "8 Bulan", color: "Orange", image: "img/kucing.jpeg" },
        { name: "Daisy", breed: "Mix Dom Anggora", age: "1 Tahun", color: "Putih Lilac", image: "img/kucing.jpeg" },
        { name: "Mochi", breed: "Mix Dom Anggora", age: "2 Tahun", color: "Biru abu", image: "img/kucing.jpeg" },
        { name: "Neko", breed: "Mix Dom Anggora", age: "8 Bulan", color: "Orange", image: "img/kucing.jpeg" },
    ],
    dogs: [
        { name: "Buddy", breed: "Golden Retriever", age: "2 Tahun", color: "Emas", image: "img/kucing.jpeg" },
        { name: "Max", breed: "Pug", age: "1 Tahun", color: "Putih", image: "img/kucing.jpeg" },

    ], // sama seperti cats
    birds: [
        { name: "Buddy", breed: "Golden Retriever", age: "2 Tahun", color: "Emas", image: "img/kucing.jpeg" },
        { name: "Max", breed: "Pug", age: "1 Tahun", color: "Putih", image: "img/kucing.jpeg" },

    ],
    rabbits: [
        { name: "Buddy", breed: "Golden Retriever", age: "2 Tahun", color: "Emas", image: "img/kucing.jpeg" },
        { name: "Max", breed: "Pug", age: "1 Tahun", color: "Putih", image: "img/kucing.jpeg" },

    ]
};

let currentPage = 1;
const itemsPerPage = 4;

function showCategoryResults(category) {
    document.getElementById("default-pets").style.display = "none";
    const resultsContainer = document.getElementById("category-results");
    const title = document.getElementById("category-title");
    const subtitle = document.getElementById("category-subtitle");
    const petsContainer = document.getElementById("category-pets");
    const pagination = document.getElementById("pagination-controls");

    const pets = allPets[category] || [];
    const totalPages = Math.ceil(pets.length / itemsPerPage);

    resultsContainer.style.display = "block";
    title.innerHTML = `🐾 Result for "<strong>${category.charAt(0).toUpperCase() + category.slice(1)}</strong>"`;
    subtitle.textContent = `${pets.length} ${category} available for adoption`;

    function renderPage(page) {
        currentPage = page;
        petsContainer.innerHTML = '';
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const currentItems = pets.slice(start, end);

        currentItems.forEach(pet => {
            const card = document.createElement('div');
            card.className = 'pet-card';
            card.innerHTML = `
                <a href="/adopt/detail/${encodeURIComponent(pet.name)}" class="card-link">
                    <img src="${pet.image}" alt="${pet.name}">
                    <div class="overlay">
                        <h3>${pet.name}</h3>
                        <p>${pet.breed}</p>
                        <div class="pet-meta">
                            <span>🕒 ${pet.age}</span>
                            <span>⚪ ${pet.color}</span>
                        </div>
                    </div>
                </a>`;
            petsContainer.appendChild(card);
        });

        renderPagination(totalPages);
    }

    function renderPagination(total) {
        pagination.innerHTML = '';
        const prev = document.createElement('button');
        prev.textContent = '← Prev';
        prev.disabled = currentPage === 1;
        prev.onclick = () => renderPage(currentPage - 1);
        pagination.appendChild(prev);

        for (let i = 1; i <= total; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            btn.className = currentPage === i ? 'active' : '';
            btn.onclick = () => renderPage(i);
            pagination.appendChild(btn);
        }

        const next = document.createElement('button');
        next.textContent = 'Next →';
        next.disabled = currentPage === total;
        next.onclick = () => renderPage(currentPage + 1);
        pagination.appendChild(next);
    }

    renderPage(currentPage);
}

function showDefaultPets() {
    const defaultPets = [
        { name: "Daisy", breed: "Mix Dom Anggora", age: "1 Tahun", color: "Putih Lilac", image: "img/kucing.jpeg" },
        { name: "Mochi", breed: "Mix Dom Anggora", age: "2 Tahun", color: "Biru abu", image: "img/kucing.jpeg" },
        { name: "Neko", breed: "Mix Dom Anggora", age: "8 Bulan", color: "Orange", image: "img/kucing.jpeg" },
        { name: "Max", breed: "Golden Retriever", age: "2 Tahun", color: "Coklat Muda", image: "img/kucing.jpeg" },
        { name: "Luna", breed: "Anggora", age: "8 Bulan", color: "Putih", image: "img/kucing.jpeg" }
    ];

    const container = document.getElementById("default-pet-cards");
    container.innerHTML = '';

    defaultPets.forEach(pet => {
        const card = document.createElement("div");
        card.className = "pet-card";
        card.innerHTML = `
            <a href="/adopt/detail/${encodeURIComponent(pet.name)}" class="card-link">
                <img src="${pet.image}" alt="${pet.name}">
                <div class="overlay">
                    <h3>${pet.name}</h3>
                    <p>${pet.breed}</p>
                    <div class="pet-meta">
                        <span>🕒 ${pet.age}</span>
                        <span>⚪ ${pet.color}</span>
                    </div>
                </div>
            </a>`;
        container.appendChild(card);
    });
}

window.onload = () => {
    showDefaultPets();

    // Ambil nama file halaman (misalnya "cats.html") lalu ekstrak "cats"
    const path = window.location.pathname;
    const page = path.substring(path.lastIndexOf('/') + 1).replace('.html', '');

    if (['cats', 'dogs', 'birds', 'rabbits'].includes(page)) {
        showCategoryResults(page);
    }
};