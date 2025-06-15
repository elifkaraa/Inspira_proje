<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resim = $_POST['resim'];
    $isim = $_POST['isim'];
    $fiyat = $_POST['fiyat'];

    $urun = [
        'resim' => $resim,
        'isim' => $isim,
        'fiyat' => $fiyat
    ];

    if (!isset($_SESSION['sepet'])) {
        $_SESSION['sepet'] = [];
    }

    $_SESSION['sepet'][] = $urun;
    header("Location: sepet.php");
    exit();
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
    <div class="container mt-5">
        <h3>Sepetiniz</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Resim</th>
                    <th>İsim</th>
                    <th>Fiyat</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_SESSION['sepet'])): ?>
                    <?php foreach ($_SESSION['sepet'] as $key => $urun): ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars($urun['resim']) ?>" width="80"></td>
                            <td><?= htmlspecialchars($urun['isim']) ?></td>
                            <td><?= htmlspecialchars($urun['fiyat']) ?> TL</td>
                            <td>
                                <a href="sepet_sil.php?index=<?= $key ?>" class="btn btn-danger btn-sm">Sil</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">Sepetiniz boş</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <button type="button" class="btn  btn-secondary float-end">ÖDEME YAP </button>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" 
    integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous">
    </script>
    
</body>
</html>