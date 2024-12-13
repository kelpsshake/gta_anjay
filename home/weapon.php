<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weapon</title>
    <link rel="stylesheet" href="weapon.css">
</head>
<body>
<a href="home.php" class="back-button">&lt; BACK</a>
    <h1>Weapon</h1>
    <div class="weapon-container">
    <div class="weapon-background"></div>
        <div class="weapon-item" onclick="showDescriptionPopup('Senjata')">
            <img src="../img/melee.png" alt="Senjata Melee">
            <div class="weapon-title">Senjata Melee</div>
        </div>
        <div class="weapon-item" onclick="showDescriptionPopup('Micro')">
            <img src="../img/micro.png" alt="Micro-Uzi">
            <div class="weapon-title">Micro-Uzi</div>
        </div>
        <div class="weapon-item" onclick="showDescriptionPopup('Sniper')">
            <img src="../img/sniper.png" alt="Sniper Rifle">
            <div class="weapon-title">Sniper Rifle</div>
        </div>
        <div class="weapon-item" onclick="showDescriptionPopup('Pistol')">
            <img src="../img/pistol.png" alt="Pistol GMM">
            <div class="weapon-title">Pistol Gmm</div>
        </div>
        <div class="weapon-item" onclick="showDescriptionPopup('AK')">
            <img src="../img/ak.png" alt="AK-47">
            <div class="weapon-title">AK-47</div>
        </div>
        <div class="weapon-item" onclick="showDescriptionPopup('Granat')">
            <img src="../img/granat.png" alt="Granat">
            <div class="weapon-title">Granat</div>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <img id="popup-image" src="" alt="Weapon Image" class="popup-image">
            <h2 id="popup-title"></h2>
            <p id="popup-text"></p>
        </div>
    </div>



    <script>
    function showDescriptionPopup(weapon) {
        const descriptions = {
            Senjata: { title: 'Senjata Melee', 
                text: 'Pisau adalah senjata jarak dekat yang sering digunakan CJ untuk misi stealth. Dengan pisau, CJ dapat membunuh musuh secara diam-diam tanpa menarik perhatian musuh lainnya, menjadikannya ideal untuk operasi senyap.',
                image: '../img/melee.png'
            },
            Micro: { title: 'Micro-Uzi', 
                text: 'Micro-Uzi adalah senjata mesin ringan (SMG) yang kecil dan cepat, cocok untuk pertempuran jarak dekat. Dengan kapasitas peluru yang besar, senjata ini sering digunakan dalam misi yang melibatkan baku tembak intens.',
                image: '../img/micro.png'
            },
            Sniper: { title: 'Sniper Rifle', 
                text: 'Sniper Rifle adalah senjata jarak jauh dengan akurasi tinggi, ideal untuk misi yang membutuhkan serangan presisi. CJ sering menggunakannya untuk menghabisi target dari kejauhan tanpa diketahui.',
                image: '../img/sniper.png'
            },
            Pistol: { title: 'Pistol GMM', 
                text: 'Pistol 9mm adalah senjata dasar yang mudah ditemukan dan digunakan dalam game. Meski memiliki daya tembak rendah, pistol ini cukup efektif untuk melawan musuh dalam jumlah kecil atau di awal permainan.',
                image: '../img/pistol.png'
            },
            AK: { title: 'AK-47', 
                text: 'AK-47 adalah senapan serbu klasik dengan daya hancur tinggi. Senjata ini sangat efektif untuk melawan musuh dalam jumlah besar dan sering digunakan oleh CJ untuk mempertahankan atau merebut wilayah geng.',
                image: '../img/ak.png'
            },
            Granat: { title: 'Granat', 
                text: 'Granat adalah senjata lempar yang menciptakan ledakan besar, digunakan untuk menghancurkan musuh dalam kelompok atau merusak kendaraan. Granat sangat berguna dalam situasi pertempuran yang membutuhkan kerusakan area luas.',
                image: '../img/granat.png'
            },
        };

        const popup = document.getElementById('popup');
        const title = document.getElementById('popup-title');
        const text = document.getElementById('popup-text');
        const image = document.getElementById('popup-image');

        // Set isi popup
        title.innerText = descriptions[weapon].title;
        text.innerText = descriptions[weapon].text;
        image.src = descriptions[weapon].image;

        // Tampilkan popup
        popup.style.display = 'flex';
        document.body.classList.add('blur'); // Tambahkan efek blur pada background
    }

    function closePopup() {
        const popup = document.getElementById('popup');
        popup.style.display = 'none';
        document.body.classList.remove('blur'); // Hapus efek blur pada background
    }

    // Tutup popup dengan tombol Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closePopup();
        }
    });
    </script>
</body>
</html>
