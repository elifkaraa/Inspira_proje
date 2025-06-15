<?php
include 'baglanti.php';
session_start();

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: giris.php");
    exit();
}

$user_id = $_SESSION['kullanici_id'];
$mesaj = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mevcut_sifre = $_POST['mevcut_sifre'] ?? '';
    $yeni_sifre = $_POST['yeni_sifre'] ?? '';
    $yeni_sifre_tekrar = $_POST['yeni_sifre_tekrar'] ?? '';

    $sql = "SELECT sifre FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashli_sifre_db);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($mevcut_sifre, $hashli_sifre_db)) {
        $mesaj = "Mevcut şifre yanlış!";
    } elseif (empty($yeni_sifre) || empty($yeni_sifre_tekrar)) {
        $mesaj = "Yeni şifre ve onayı boş bırakılamaz.";
    } elseif ($yeni_sifre !== $yeni_sifre_tekrar) {
        $mesaj = "Yeni şifreler eşleşmiyor.";
    } else {
        $yeni_hashli_sifre = password_hash($yeni_sifre, PASSWORD_DEFAULT);
        $sql_update = "UPDATE users SET sifre = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $yeni_hashli_sifre, $user_id);
        if ($stmt_update->execute()) {
            header("Location: kontrol.php?mesaj=hesap_bilgisi_kaydedildi");
            exit();
        } else {
            $mesaj = "Şifre güncellenirken hata oluştu: " . $stmt_update->error;
        }
        $stmt_update->close();
    }
}


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
            <b>ŞİFRE DEĞİŞTİR</b>
            <?php if(!empty($mesaj)): ?>
                <div class="alert alert-warning" role="alert">
                    <?= htmlspecialchars($mesaj) ?>
                </div>
                <?php endif; ?>
            <form method="post" action="sifre_degistir.php">
                <div class="mb-3">
                    <label for="mevcut_sifre" class="form-label">Mevcut Şifre</label>
                    <input type="password" class="form-control" id="mevcut_sifre" name="mevcut_sifre" required>
                </div>
                <div class="mb-3">
                    <label for="yeni_sifre" class="form-label">Yeni Şifre</label>
                    <input type="password" class="form-control" id="yeni_sifre" name="yeni_sifre" required>
                </div>
                <div class="mb-3">
                    <label for="yeni_sifre_tekrar" class="form-label">Yeni Şifreyi Onayla</label>
                    <input type="password" class="form-control" id="yeni_sifre_tekrar" name="yeni_sifre_tekrar" required>
                </div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
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