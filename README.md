# 🎨 Inspira - Sanat Galerisi Üye Kayıt ve Giriş Sistemi
Bu proje, sanat galerisi sitesi için geliştirilmiş basit bir kullanıcı kayıt ve giriş sistemi içermektedir. Kullanıcılar siteye kayıt olabilir, giriş yapabilir, sepetlerine ürün ekleyebilir bu ürünleri silebilir ve oturumlarını yönetebilir.
## 🔗 Proje Adresi
📍 Canlı Demo :http://95.130.171.20/~st23360859057
📺 Tanıtım Videosu (YouTube)


## 🛠 Kullanılan Teknolojiler
- PHP 

- MySQL (phpMyAdmin üzerinden)

- HTML5 / CSS3

- Bootstrap 5.3.6

- XAMPP (geliştirme ortamı)
## 🚀 Özellikler
✅ Kullanıcı kayıt (isim, soyisim, e-posta, şifre)

✅ Giriş ve çıkış sistemi (oturum yönetimi)

✅ Kullanıcı bilgilerini güncelleme

✅ Basit ve güvenli veritabanı bağlantısı

✅ Şifrelerin güvenli saklanması (password_hash ile)

✅ Responsive tasarım (Bootstrap veya benzeri CSS framework ile)
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
## Ekran Görüntüleri
**1.Giriş Yapma Ekranı**
![image](https://github.com/user-attachments/assets/9f9b94f3-42ce-4db6-b38d-519dd191513a)
**2.Üye Olma Ekranı**
![image](https://github.com/user-attachments/assets/df05c53b-d96d-49e5-bf3c-c45734f13fa6)  
**3.Bilgi Düzenleme Ekranı**  
![image](https://github.com/user-attachments/assets/d2697c08-7c6e-4f34-a0c5-ed229560d24c)




