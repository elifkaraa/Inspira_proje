# 🎨 Inspira - Sanat Galerisi Üye Kayıt ve Giriş Sistemi
Bu proje, sanat galerisi sitesi için geliştirilmiş basit bir kullanıcı kayıt ve giriş sistemi içermektedir. Kullanıcılar siteye kayıt olabilir, giriş yapabilir, sepetlerine ürün ekleyebilir bu ürünleri silebilir ve oturumlarını yönetebilir.
## 🛠 Kullanılan Teknolojiler
- PHP 

- MySQL (phpMyAdmin üzerinden)

- HTML5 / CSS3

- Bootstrap 5.3.6

- XAMPP (geliştirme ortamı)
## 🧮 Veritabanı Yapısı
Veritabanı Adı: inspira_db  
Tablo Adı: users  
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(50) NOT NULL,
    soyad VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    sifre VARCHAR(255) NOT NULL,
    kullanici_turu VARCHAR(50) DEFAULT 'normal',
    kayit_tarihi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
Tablo Adı: bilgiler
```sql
CREATE TABLE bilgiler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kullanici_id INT NOT NULL,
    adres VARCHAR(255),
    telefon VARCHAR(20),
    dogum_tarihi DATE,
    kayit_tarihi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kullanici_id) REFERENCES users(id) ON DELETE CASCADE
);
```
