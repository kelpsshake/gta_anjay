<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA San Andreas - Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <img src="../img/atas.png" alt="Texture1" class="texture1">
    <img src="../img/rockstar.png" alt="Rockstar Logo" class="rockstar-logo">
    <header class="header">
        <img src="../img/bingkai.png" alt="GTA San Andreas" class="bingkai">
        <img src="../img/gta_nama.png" alt="GTA Logo" class="gta-logo">
        <div class="press-start"><a href="#" style="color: #FFFFFF; text-decoration: none;">PRESS START</a></div>
    </header>

    <main class="content">
        <section class="story-section">
            <img src="../img/buku2.png" alt="Book Background" class="book-bg">
            <div class="book-content">
                <h2 class="story-title">CJ's Story</h2>
                <img src="../img/isi_buku.png" alt="CJ Bike Story" class="story-image">
                <p class="story-text">Join CJ's journey in GTA San Andreas! From rebuilding Grove Street to battling betrayals, it's an epic adventure you don't want to miss!</p>
                <button class="see-more">SEE MORE</button>
            </div>
            <img src="../img/bike.png" alt="CJ Bike" class="bike-image">
        </section>

        <section class="map-section">
            <section class="map-section">
            <img src="../img/map.png" alt="Map Background" class="map-bg">
            <h2 class="map-title">MAP</h2>
                <div class="map-container">
                    <div class="map-content">
                        <button class="nav-button prev" onclick="prevMap()">&lt;</button>
                            <img src="../img/losantos.png" alt="Map Image" class="map-image" id="mapImage">
                        <button class="nav-button next" onclick="nextMap()">&gt;</button>
                    </div>
                    <div class="map-info">
                    <h3 class="location-title" id="locationTitle">LOS SANTOS</h3>
                        <p class="map-description" id="mapDescription">The city is inspired by Los Angeles, with high-rise buildings, slum housing, and neighborhoods that reflect various aspects of the city's life. Los Santos is a metropolitan city full of lively nightlife, the movie industry, as well as the posh residential areas of Vinewood Hills.</p>
                    </div>
                </div>
        </section>

        <section class="garage-section">
            <div class="container">
                <a href="garage.php" class="item">
                    <img src="../img/garage.png" alt="Garage">
                    <div class="overlay">
                        <h2>Garage</h2>
                    </div>
                </a>
                <a href="weapon.php" class="item">
                    <img src="../img/garage.png" alt="Weapon">
                    <div class="overlay">
                        <h2>Weapon</h2>
                    </div>
                </a>
            </div>
        </section>
        <div class="dark-overlay">
            
        </div>
    </main>
    <script>
        
const mapData = [
    {
        image: '../img/losantos.png',
        title: 'LOS SANTOS',
        description: 'The city is inspired by Los Angeles, Los Santos is a metropolitan city full of lively nightlife, the movie industry, as well as the posh residential areas of Vinewood Hills.'
    },
    {
        image: '../img/lasventuras.png',
        title: 'LAS VENTURAS',
        description: 'Las Venturas is a Las Vegas-inspired city, with many casinos and luxury hotels offering a variety of gambling and entertainment activities.'
    },
    {
        image: '../img/sanviero.png',
        title: 'SAN FIERRO',
        description: 'San Fierro is inspired by San Francisco, with iconic bridges and hilly streets that create a challenging driving experience.'
    }
];

let currentMapIndex = 0;

function updateMap(index) {
    const mapImage = document.getElementById('mapImage');
    const locationTitle = document.getElementById('locationTitle');
    const mapDescription = document.getElementById('mapDescription');

    mapImage.style.opacity = 0;
    setTimeout(() => {
        mapImage.src = mapData[index].image;
        locationTitle.textContent = mapData[index].title;
        mapDescription.textContent = mapData[index].description;
        mapImage.style.opacity = 1;
    }, 300);
}

function nextMap() {
    currentMapIndex = (currentMapIndex + 1) % mapData.length;
    updateMap(currentMapIndex);
}

function prevMap() {
    currentMapIndex = (currentMapIndex - 1 + mapData.length) % mapData.length;
    updateMap(currentMapIndex);
}
</script>

</body>
</html>