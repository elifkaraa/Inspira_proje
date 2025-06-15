<?php
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
    <div class="container mt-5">
        <div class="row">
            <div class="col md-6">
                <div class="card" style="width: 280px; " >
                    <img src="resimler/yagli_boya.webp" class="card-img-top" style="height:350px">
                    <div class="card-body">
                        <p class="card-text">
                            <b>CAMDAKİ KIZ</b> <br>
                            Selin Aymaz <br>
                            140 cm x 50 cm <br>
                            10.000  TL <br>
                        </p>
                        <form action="sepet.php" method="post">
                            <input type="hidden" name="resim" value="resimler/yagli_boya.webp">
                            <input type="hidden" name="isim" value="CAMDAKİ KIZ">
                            <input type="hidden" name="fiyat" value="10000">
                            <button type="submit" class="btn btn-outline-danger">SEPETE EKLE</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col md-6">
                <div class="card" style="width: 280px;">
                    <img src="/~st23360859057/resimler/bulanti.webp" class="card-img-top"style="height:350px">
                    <div class="card-body">
                        <p class="card-text">
                            <b>BULANTI</b> <br>
                            Mehmet Günsür <br>
                            150 cm x 80 cm <br>
                            6.000  TL <br>
                        </p>
                        <form action="sepet.php" method="post">
                            <input type="hidden" name="resim" value="resimler/bulanti.webp">
                            <input type="hidden" name="isim" value="BULANTI">
                            <input type="hidden" name="fiyat" value="6.000">
                            <button type="submit" class="btn btn-outline-danger">SEPETE EKLE</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col md-6">
                <div class="card" style="width: 280px;">
                    <img src="resimler/yagli_boya3.avif" class="card-img-top"style="height:350px">
                    <div class="card-body">
                        <p class="card-text">
                            <b>SON DANS</b> <br>
                            Alara Germen <br>
                            150 cm x 90 cm <br>
                            18.000  TL <br>
                        </p>
                        <form action="sepet.php" method="post">
                            <input type="hidden" name="resim" value="resimler/yagli_boya3.avif">
                            <input type="hidden" name="isim" value="SON DANS">
                            <input type="hidden" name="fiyat" value="18.000">
                            <button type="submit" class="btn btn-outline-danger">SEPETE EKLE</button>
                        </form>
                    </div>
                </div>
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