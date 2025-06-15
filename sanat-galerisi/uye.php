<?php
include 'baglanti.php';
$mesaj = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = trim($_POST['kullanici_adi'] ?? '');
    $soyad = trim($_POST['kullanici_soyadi'] ?? '');
    $mail = trim($_POST['kullanici_mail'] ?? '');
    $sec = $_POST['secim'] ?? '';
    $sifre = $_POST['kullanici_sifre'] ?? '';
    $sifre2 = $_POST['kullanici_sifre2'] ?? '';
    if (empty($ad) || empty($soyad) || empty($mail) || empty($sec) || empty($sifre) || empty($sifre2)) {
        $mesaj = "Lütfen tüm alanları eksiksiz doldurun.";
    } elseif ($sifre !== $sifre2) {
        $mesaj = "Şifreler uyuşmuyor!";
    } else {
        $sql_check = "SELECT id FROM users WHERE email = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("s", $mail);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $mesaj = "Bu email adresi zaten kayıtlı. Lütfen farklı bir email kullanın.";
        }else{
        $hashli_sifre = password_hash($sifre, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (ad, soyad, email, sifre,kullanici_turu) VALUES (?,?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $ad, $soyad, $mail,$hashli_sifre,$sec);
        
        if ($stmt->execute()) {
            $mesaj = "Kayıt başarıyla oluşturuldu! Tekrar giriş yapabilirsiniz.";
        } else {
            $mesaj = "Hata oluştu: " . $stmt->error;
        }
        $stmt->close();
        }
    $stmt_check->close();
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
        <div class="container mt-5" >
            <?php if (!empty($mesaj)): ?>
        <div class="alert alert-light">
            <?php echo $mesaj; ?>
        </div>
    <?php endif; ?>
    
    <form action="uye.php" method="post" >
        <div class="row">
  <div class="col-sm-3 mb-3  ">
    <label for="kullanici_adi" class="form-label">Adınız</label>
    <input type="text" class="form-control" id="kullanici_adi" name="kullanici_adi">
  </div>
  <div class="col-sm-3 mb-3" >
    <label for="kullanici_soyadi" class="form-label">Soyadınız</label>
    <input type="text" class="form-control" id="kullanici_soyadi" name="kullanici_soyadi">
  </div>
  </div>
   <div class="col-sm-3 mb-3" >
    <label for="kullanici_mail" class="form-label">E-posta Adresiniz</label> 
    <input type="text" class="form-control" id="kullanici_mail" name="kullanici_mail">
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="secim" value="sanatçı" id="flexRadioDefault1" >
  <label class="form-check-label" for="flexRadioDefault1">
    Sanatçı mısınız?
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="secim" value="sanatsever" id="flexRadioDefault2" checked >
  <label class="form-check-label" for="flexRadioDefault2">
    Sanatsever misiniz?
  </label>
</div>
<div class="row">

  <div class="col-sm-3 mb-3" >
    <label for="kullanici_sifre" class="form-label">Şifre</label>
    <input type="password" class="form-control" id="kullanici_sifre" name="kullanici_sifre">
  </div>
  <div class="col-sm-3 mb-3" >
    <label for="kullanici_sifre2" class="form-label">Şifre (Tekrar)</label>
    <input type="password" class="form-control" id="kullanici_sifre2" name="kullanici_sifre2">
  </div>
  </div>
  <button type="submit" class="btn btn-outline-secondary">Gönder</button>
  Zaten hesabınız var mı? <a href="giris.php">Giriş Yap</a>
  
</form>
</div>


 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" 
    integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous">
    </script>
        
    </body>
</html>