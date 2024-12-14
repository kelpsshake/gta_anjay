<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story</title>
    <link rel="stylesheet" href="story.css">
</head>
<body>
        <div class="story-section1">
            <p class="title">Francis INTL. Airport, <br>Liberty City, 1992.</p>
            <img src="../img/gta.gif" alt="Airport" class="story-gif">
            <p style="text-align: center;">CJ kembali ke Los Santos setelah ibunya, Beverly Johnson, dibunuh oleh geng saingan.</p>
        </div>

        <div class="story-section"  style="text-align: justify;">
            <img src="../img/police.png" alt="Police" class="story-image">
            <p>Setibanya di bandara, CJ langsung dihadang oleh polisi korup, Officer Frank Tenpenny dan rekannya Eddie Pulaski, yang menjebaknya dengan tuduhan pembunuhan.</p>
        </div>

        <div class="story-section"  style="text-align: justify;">
            <img src="../img/gang.png" alt="Gang" class="story-image">
            <p>CJ kemudian bertemu kembali dengan keluarganya, Sweet & Kendl, serta anggota geng lama Grove Street Families seperti Ryder dan Big Smoke. Dia segera menyadari bahwa geng mereka telah melemah akibat persaingan dengan kelompok lain, terutama geng Ballas.</p>
        </div>

        CJ bergabung kembali dengan geng dan membantu Sweet merebut wilayah dari Ballas dengan menyerang markas mereka dan menyabotase operasi narkoba. Sambil membangun kekuatan Grove Street, CJ juga mendukung keluarganya serta teman-temannya, termasuk Big Smoke dan Ryder, yang tampaknya setia pada geng
        <div class="story-section"  style="text-align: justify;">
            <img src="../img/betray.png" alt="Revenge" class="story-image">
            <p>Namun, CJ dikhianati oleh teman dekatnya, Big Smoke dan Ryder, yang bersekongkol dengan Tenpenny dan Ballas. Setelah Sweet dipenjara, CJ diusir dari Los Santos dan memulai petualangan baru di pedesaan, San Fierro, dan Las Venturas, membangun koneksi dan memperkuat pengaruhnya.</p>
        </div>
        </div>
        <div class="slider-container">
        <div class="slider">
            <!-- Ulangi gambar agar bergerak terus -->
            <img src="../img/1.png" alt="Slide 1">
            <img src="../img/2.png" alt="Slide 2">
            <img src="../img/3.png" alt="Slide 3">
            <img src="../img/4.png" alt="Slide 4">

            <img src="../img/1.png" alt="Slide 1">
            <img src="../img/2.png" alt="Slide 2">
            <img src="../img/3.png" alt="Slide 3">
            <img src="../img/4.png" alt="Slide 4">

            <img src="../img/1.png" alt="Slide 1">
            <img src="../img/2.png" alt="Slide 2">
            <img src="../img/3.png" alt="Slide 3">
            <img src="../img/4.png" alt="Slide 4">
        </div>
        <p>Akhirnya, CJ kembali ke Los Santos, membebaskan Sweet, dan membalas dendam pada Big Smoke serta Tenpenny. Dengan kekalahan musuh-musuhnya, CJ berhasil mengembalikan kejayaan Grove Street Families dan memulai kehidupan baru bersama keluarganya.</p>
        </div>
    <a href="home.php" class="back-button" style="font-family: Cybrpnuk2">&lt; BACK</a>

    <script>
        let currentIndex = 0;

        function moveSlider() {
            const slides = document.querySelector('.slider');
            const totalSlides = document.querySelectorAll('.slide').length;
            currentIndex = (currentIndex + 1) % totalSlides;
            slides.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        setInterval(moveSlider, 3000); // Pindah setiap 3 detik
    </script>

</body>
</html>