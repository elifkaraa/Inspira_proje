<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(246, 181, 108, 0.74);">
    <a href="index.php" class="navbar-brand d-flex align-items-center">
        <img src="resimler/resim1.avif" width="70" height="55">
        <span style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
        Inspira
        </span>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-0 mb-lg-1">
            <li class="nav-item"><a class="nav-link active" href="#">SANATÇILAR</a></li>
            <li class="nav-item"><a class="nav-link" href="#">ATÖLYEDEN İŞLER</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">KATEGORİLER</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="resim.php">Resim</a></li>
                    <li><a class="dropdown-item" href="#">Heykel</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <li class="nav-item dropdown">
        <a class="navbar-brand dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
            <img src="resimler/pngwing.com.png" width="35" height="30">
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <?php if (isset($_SESSION['kullanici_id'])): ?>
                <li><a class="dropdown-item" href="kontrol.php">Hesabım</a></li>
                <li><a class="dropdown-item" href="cikis.php">Çıkış Yap</a></li>
            <?php else: ?>
                <li><a class="dropdown-item" href="kontrol.php">Hesabım</a></li>
                <li><a class="dropdown-item" href="giris.php">Giriş Yap</a></li>
            <?php endif; ?>
        </ul>
    </li>

    <a class="navbar-brand" href="sepet.php">
        <img src="resimler/pngwing.com (1).png" width="35" height="30">
    </a>
</nav>
