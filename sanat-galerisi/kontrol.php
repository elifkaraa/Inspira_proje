<?php
include 'baglanti.php';
session_start(); 






if (!isset($_SESSION['kullanici_id'])) {
    header("Location: giris.php");
    exit();
}

$user_id = $_SESSION['kullanici_id'];

$sql = "SELECT ad, soyad, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($ad, $soyad, $email);
$stmt->fetch();
$stmt->close();

$isim = $ad . ' ' . $soyad;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
    .nav-item {
    list-style: none;
    }
    body{
        background-color:rgb(243, 245, 239);;
        
    }
    </style>
</head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="container mt-3 ">
            <?php
            if (isset($_GET['mesaj']) && $_GET['mesaj'] === 'hesap_bilgisi_kaydedildi') {
                echo '
                <div class="alert alert-light" role="alert" ">
                Şifre başarıyla değiştirildi.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }
            if (isset($_SESSION['success_message'])) {
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                '.htmlspecialchars($_SESSION['success_message']).'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
                unset($_SESSION['success_message']);
            }
            ?>
        </div>

<div class="container mt-5 mx-0 ">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                    <b>Hesabım</b>
                </div>
                <ul class="list-group list-group-flush">
                    <a href="kontrol.php">
                        <li class="list-group-item">Hesap Kontrol Paneli</li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">Siparişlerim</li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">Adres Defteri</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col">
            
            Panelinizden geçmiş işlemlerinizi görebilir, kişisel bilgilerinizi güncelleyebilirsiniz. 
            Görmek veya düzeltmek istediğiniz şeylerle ilgili linkler aşağıdadır.
            <hr>
            <h5>İletişim Bilgisi</h5>
            <p>
                <?= htmlspecialchars($isim) ?><br>
                <a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a>
            </p>
            <button type="button" class="btn btn-primary me-2" onclick="window.location.href='sifre_degistir.php'">Şifre Değiştir</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='bilgi_duzenle.php'">Düzenle</button>
        </div>
    </div>
</div>





 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" 
    integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous">
    </script>


    </body>
</html>