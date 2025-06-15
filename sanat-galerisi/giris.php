<?php
session_start();
include 'baglanti.php';

$mesaj = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = trim($_POST['kullanici_mail'] ?? '');
    $sifre = trim($_POST['kullanici_sifre'] ?? '');

    if (empty($mail) || empty($sifre)) {
        $mesaj = "Lütfen tüm alanları doldurun.";
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $sonuc = $stmt->get_result();

        if ($sonuc->num_rows == 1) {
            $kullanici = $sonuc->fetch_assoc();
            if (password_verify($sifre, $kullanici['sifre'])) {
                $_SESSION['kullanici_id'] = $kullanici['id'];
                $_SESSION['kullanici_adi'] = $kullanici['ad'];
                $_SESSION['kullanici_turu'] = $kullanici['kullanici_turu'];
                header("Location: kontrol.php"); 
                exit();
            } else {
                $mesaj = "Hatalı şifre girdiniz.";
            }
        } else {
            $mesaj = "Kullanıcı bulunamadı.";
        }
        $stmt->close();
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
        <div class="container mt-5"  >
            <div div class="row">
                <div class="col">
                    <b>ÜYE GİRİŞİ</b>
                    <p>Eğer kullanıcı hesabınız varsa,lütfen giriş yapınız.</p>
                    <form action="giris.php" method="post" >
                        <div class="col-sm-3 mb-3">
                            <label for="exampleInputEmail1" class="form-label">E posta Adresiniz</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="kullanici_mail">
                        </div>
  <div class="col-sm-3 mb-3">
    <label for="exampleInputPassword1" class="form-label">Şifre</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="kullanici_sifre">
  </div>
  <button type="submit" class="btn btn-outline-secondary">Giriş Yap</button>
    </form>
    </div>
    <div class="col">
    <b>YENİ ÜYELİK İŞLEMLERİ</b>
    <p>Inspira.com ayrıcalıklarından yararlanmak için hemen üye olun!</p>
    <a href="uye.php">
    <button type="button" class="btn btn-outline-secondary">Üye Olmak İstiyorum</button>
    </a>
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