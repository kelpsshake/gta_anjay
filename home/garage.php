<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage</title>
    <link rel="stylesheet" href="garage.css">
</head>
<body>
    <a href="home.php" class="back-button">&lt; BACK</a>
    <h1>GaraGe</h1>
    <div class="garage-container">
        <div class="garage-background"></div>
    <div class="garage-item" onclick="showDescriptionPopup('bmx')">
        <img src="../img/bmx2.png" alt="BMX Bike">
        <div class="garage-title">BMX Bike</div>
    </div>
    <div class="garage-item" onclick="showDescriptionPopup('sabre')">
        <img src="../img/sabre2.png" alt="Sabre">
        <div class="garage-title">Sabre</div>
    </div>
    <div class="garage-item" onclick="showDescriptionPopup('greenwood')">
        <img src="../img/greenwood2.png" alt="Greenwood">
        <div class="garage-title">Greenwood</div>
    </div>
    <div class="garage-item" onclick="showDescriptionPopup('walton')">
        <img src="../img/walton2.png" alt="Walton">
        <div class="garage-title">Walton</div>
    </div>
    <div class="garage-item" onclick="showDescriptionPopup('bandito')">
        <img src="../img/bandito2.png" alt="Bandito">
        <div class="garage-title">Bandito</div>
    </div>
    <div class="garage-item" onclick="showDescriptionPopup('hydra')">
        <img src="../img/hydra2.png" alt="Hydra">
        <div class="garage-title">Hydra</div>
    </div>
</div>

<div class="popup" id="popup">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <img id="popup-image" src="" alt="Vehicle Image" class="popup-image">
        <h2 id="popup-title"></h2>
        <p id="popup-text"></p>
    </div>
</div>


    <script>
    function showDescriptionPopup(vehicle) {
        const descriptions = {
            bmx: { title: 'BMX Bike', 
                text: 'Kendaraan pertama yang digunakan CJ di awal permainan adalah sebuah sepeda BMX, yang ia temukan setelah ditinggalkan di wilayah Ballas. Sepeda ini menjadi ikon awal perjuangan CJ, melambangkan permulaannya dari nol sebelum membangun kembali kejayaan Grove Street Families.',
                image: '../img/bmx2.png'
            },
            sabre: { title: 'Sabre', 
                text: 'Mobil muscle klasik yang sering muncul di beberapa misi CJ. Sabre kerap digunakan di awal cerita sebagai kendaraan andal.',
                image: '../img/sabre2.png'
            },
            greenwood: { title: 'Greenwood', 
                text: 'Mobil milik Sweet yang sering digunakan dalam misi geng. Kendaraan ini juga menjadi alat transportasi utama CJ saat bersama anggota Grove Street Families.',
                image: '../img/greenwood2.png'
            },
            walton: { title: 'Walton', 
                text: 'Truk pick-up yang digunakan CJ dalam misi mencuri barang bersama Ryder. Truk ini sering muncul di bagian awal cerita.',
                image: '../img/walton2.png'
            },
            bandito: { title: 'Bandito', 
                text: 'Mobil buggy off-road yang menjadi andalan CJ saat menjelajahi wilayah pedesaan dan gurun. Kendaraan ini cocok untuk medan yang sulit.',
                image: '../img/bandito2.png'
            },
            hydra: { title: 'Hydra', 
                text: 'Jet tempur canggih yang digunakan CJ dalam misi tertentu, terutama setelah menguasai Verdant Meadows Airstrip. Hydra menjadi kendaraan ikonik untuk misi udara.',
                image: '../img/hydra2.png'
            },
        };

        const popup = document.getElementById('popup');
        const title = document.getElementById('popup-title');
        const text = document.getElementById('popup-text');
        const image = document.getElementById('popup-image');

        document.getElementById('popup').style.fontFamily = "'montserrat', 'pricedow'";

        title.innerText = descriptions[vehicle].title;
        text.innerText = descriptions[vehicle].text;
        image.src = descriptions[vehicle].image;

        document.body.classList.add('blur');
        popup.style.display = 'flex';
    }

    
    function closePopup() {
        console.log('Menutup popup...');
        const popup = document.getElementById('popup');
        popup.style.display = 'none';
        document.body.classList.remove('blur');
    }

    title.style.fontFamily = "'pricedow'"; // Ubah font untuk judul
    text.style.fontFamily = "'montserrat'"; // Ubah font untuk teks

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closePopup();
        }
    });


</script>

</script>
</body>
</html>
