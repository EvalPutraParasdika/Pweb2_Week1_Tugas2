﻿# TUGAS 2 P-WEB2 PHP OOP
## Code
### 1. database.php
```php
<?php
  // Mendefinisikan kelas bernama "database"
  class database {
  
    // Properti yang bersifat private untuk menyimpan informasi koneksi database
    private $host = "localhost";  // Menyimpan alamat host, biasanya "localhost" untuk server lokal
    private $user = "root";       // Menyimpan nama pengguna database, di sini menggunakan "root"
    private $password = "";       // Menyimpan kata sandi untuk pengguna database, kosong untuk default
    private $database = "siwali-jkb"; // Menyimpan nama database yang akan digunakan
    protected $conn;              // Properti protected untuk menyimpan objek koneksi ke database

    // Constructor yang dipanggil saat objek dari kelas ini dibuat
    public function __construct() {
      // Membuat koneksi ke database menggunakan mysqli
      $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

      // Memeriksa apakah koneksi berhasil, jika gagal tampilkan pesan kesalahan dan hentikan eksekusi
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
    }

    // Method untuk membaca data dari database
    public function readdata($sql) {
      // Melakukan query SQL yang diberikan dan mengembalikan hasilnya
      return $this->conn->query($sql);
    }

    // Method placeholder untuk mendapatkan peran pengguna, saat ini mengembalikan string kosong
    public function getRole() {
      return "";
    }
  }
?>
```

### 2. Classes
```php
<?php 
// Mengimpor file 'database.php' yang berisi kelas 'database'
require_once 'database.php';

// Mendefinisikan kelas bernama "classes" yang mewarisi (extends) kelas "database"
class classes extends database {

  // Constructor dari kelas 'classes', memanggil constructor dari kelas induk 'database'
  public function __construct() {
    // Memanggil constructor dari kelas parent (database) untuk membuat koneksi ke database
    parent::__construct();
  }

  // Method 'read', berfungsi untuk mendefinisikan query SQL untuk membaca data dari tabel 'tb_classes'
  public function read() {
    $sql = "SELECT * FROM tb_classes"; 
    // Perlu menambahkan logika untuk menjalankan query ini jika memang akan digunakan
  }

  // Method 'tampilData' yang bertugas untuk menampilkan data dari tabel 'tb_classes'
  public function tampilData() {
    $sql = "SELECT * FROM tb_classes"; // Query SQL untuk mengambil semua data dari tabel 'tb_classes'
    
    // Memanggil method 'readdata' dari kelas induk untuk menjalankan query dan mengembalikan hasilnya
    return $this->readdata($sql);
  }
}
?>
```

### 3. Lecturers
```php
<?php   
// Mengimpor file 'database.php' yang berisi kelas 'database'
require_once 'database.php';

// Mendefinisikan kelas bernama "lecturers" yang mewarisi (extends) kelas "database"
class lecturers extends database {

  // Constructor dari kelas 'lecturers', memanggil constructor dari kelas induk 'database'
  public function __construct() {
    // Memanggil constructor dari kelas parent (database) untuk membuat koneksi ke database
    parent::__construct();
  }

  // Method 'tampilData' yang bertugas untuk menampilkan data dari tabel 'tb_dosen'
  public function tampilData() {
    $sql = "SELECT * FROM tb_dosen";  // Query SQL untuk mengambil semua data dari tabel 'tb_dosen'
    
    // Memanggil method 'readdata' dari kelas induk untuk menjalankan query dan mengembalikan hasilnya
    return $this->readdata($sql);
  }
}
?>
```

### 4. index.php
```php
<?php 
// Mengimpor file 'database.php', 'classes.php', dan 'lecturers.php' agar kelas-kelas tersebut dapat digunakan dalam kode ini.
require_once 'database.php';
require_once 'classes.php';
require_once 'lecturers.php';

// Membuat instance dari kelas 'lecturers' dan menyimpan data dosen ke dalam variabel $data1
$lecture = new lecturers();
$data1= $lecture->tampilData();

// Inisialisasi variabel $no1 sebagai penghitung nomor urut untuk tabel dosen
foreach ($data1 as $row) {
  $no1 = 1;
}

// Membuat instance dari kelas 'classes' dan menyimpan data kelas ke dalam variabel $data2
$class = new classes();
$data2 = $class->tampilData();

// Inisialisasi variabel $no2 sebagai penghitung nomor urut untuk tabel kelas
foreach ($data2 as $row) {
  $no2 = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag untuk karakter encoding dan pengaturan viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link untuk mengimpor Bootstrap CSS dan DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    <!-- Judul dokumen HTML -->
    <title>Document</title>
</head>
<body>
    <!-- Bagian navigasi situs -->
    <nav class="navbar navbar-expand-lg bg-primary mb-5">
        <div class="container-fluid">
            <!-- Branding logo -->
            <a class="navbar-brand" href="#">SIWALI JKB</a>
            <!-- Tombol toggle untuk navigasi mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Daftar menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- Item menu navigasi: Home -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- Item menu navigasi: Lecturers -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-lecturers.php">Lecturers</a>
                    </li>
                    <!-- Item menu navigasi: Classes -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-classes.php">Classes</a>
                    </li>
                    <!-- Item menu navigasi dropdown: Roles -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Roles
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                            <li><a class="dropdown-item" href="koordinator.php">Program Coordinator</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian utama halaman, menampilkan data dosen dan kelas -->
    <main class="d-flex flex-column justify-content-center align-items-center">
        <!-- Tabel data dosen -->
        <h2>LECTURERS</h2>
        <table class="table table-bordered w-75" id="myTable">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">NIP</th>
                    <!-- Kolom lain yang dikomentari -->
                    <!-- <th scope="col">PHONE NUMBER</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">SIGNATURE</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan setiap baris data dosen -->
                <?php foreach ($data1 as $row): ?>
                <tr>
                    <td><?php echo $no1++ ?></td>
                    <td><?php echo $row['nidn'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['nip'] ?></td>
                    <!-- Kolom lain yang dikomentari -->
                    <!-- <td><?php echo $row['phone_number'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td>  <?php echo $row['signature'] ?></td> -->
                </tr>                
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tabel data kelas -->
        <h2>CLASSES</h2>
        <table class="table table-bordered w-75" id="myTable">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <!-- Kolom lain yang dikomentari -->
                    <!-- <th scope="col">ID CLASS</th>
                    <th scope="col">ID PROGRAM</th>
                    <th scope="col">ID ACADEMIC ADVISOR</th> -->
                    <th scope="col">CLASS NAME</th>
                    <th scope="col">ACADEMIC YEAR</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan setiap baris data kelas -->
                <?php foreach ($data2 as $row): ?>
                <tr>
                    <td><?php echo $no2++ ?></td>
                    <!-- Kolom lain yang dikomentari -->
                    <!-- <td><?php echo $row['id_class'] ?></td>
                    <td><?php echo $row['id_program'] ?></td>
                    <td><?php echo $row['id_academic_advisor'] ?></td> -->
                    <td><?php echo $row['class_name'] ?></td>
                    <td><?php echo $row['academic_year'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <!-- Link untuk mengimpor Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

### 5. admin.php
```php
<?php 
// Mengimpor file 'database.php' untuk koneksi database dan 'classes.php' serta 'lecturers.php' untuk memuat kelas yang diperlukan.
require_once 'database.php';
require_once 'classes.php';
require_once 'lecturers.php';

// Membuat instance dari kelas 'lecturers' untuk mengakses data dosen dari database.
$lecture = new lecturers();

// Mengambil data dari tabel 'lecturers' dan menyimpannya dalam variabel $data1.
$data1 = $lecture->tampilData();

// Inisialisasi variabel $no1 untuk nomor urut tabel dosen.
foreach ($data1 as $row) {
  $no1 = 1;
}

// Membuat instance dari kelas 'classes' untuk mengakses data kelas dari database.
$class = new classes();

// Mengambil data dari tabel 'classes' dan menyimpannya dalam variabel $data2.
$data2 = $class->tampilData();

// Inisialisasi variabel $no2 untuk nomor urut tabel kelas.
foreach ($data2 as $row) {
  $no2 = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag untuk karakter encoding dan pengaturan viewport agar responsif di semua perangkat -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Mengimpor Bootstrap CSS versi 5.3.3 dan DataTables CSS untuk styling tabel -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    <!-- Judul dokumen HTML -->
    <title>Document</title>
</head>
<body>
    <!-- Bagian navigasi situs -->
    <nav class="navbar navbar-expand-lg bg-primary mb-5">
        <div class="container-fluid">
            <!-- Branding logo -->
            <a class="navbar-brand" href="#">SIWALI JKB</a>
            
            <!-- Tombol toggle untuk navigasi mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Daftar menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- Item menu navigasi: Home -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- Item menu navigasi: Lecturers -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-lecturers.php">Lecturers</a>
                    </li>
                    <!-- Item menu navigasi: Classes -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-classes.php">Classes</a>
                    </li>
                    <!-- Dropdown menu untuk Roles -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Roles
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Item dropdown: Admin -->
                            <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                            <!-- Item dropdown: Program Coordinator -->
                            <li><a class="dropdown-item" href="koordinator.php">Program Coordinator</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian utama halaman, menampilkan data dosen dan kelas -->
    <main class="d-flex flex-column justify-content-center align-items-center">
        <!-- Judul untuk tabel dosen -->
        <h2>LECTURERS</h2>
        
        <!-- Tabel yang menampilkan data dosen -->
        <table class="table table-bordered w-75" id="myTable">
            <thead>
                <tr>
                    <!-- Header tabel dengan kolom: No, NIDN, Nama Lengkap, NIP, Phone Number, Address, Signature, Roles -->
                    <th scope="col">NO.</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">NIP</th>
                    <th scope="col">PHONE NUMBER</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">SIGNATURE</th>
                    <th scope="col">Roles</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan setiap baris data dosen -->
                <?php foreach ($data1 as $row): ?>
                <tr>
                    <!-- Nomor urut untuk setiap baris -->
                    <td><?php echo $no1++ ?></td>
                    <!-- Menampilkan NIDN dosen -->
                    <td><?php echo $row['nidn'] ?></td>
                    <!-- Menampilkan Nama Lengkap dosen -->
                    <td><?php echo $row['name'] ?></td>
                    <!-- Menampilkan NIP dosen -->
                    <td><?php echo $row['nip'] ?></td>
                    <!-- Menampilkan nomor telepon dosen -->
                    <td><?php echo $row['phone_number'] ?></td>
                    <!-- Menampilkan alamat dosen -->
                    <td><?php echo $row['address'] ?></td>
                    <!-- Menampilkan tanda tangan dosen -->
                    <td><?php echo $row['signature'] ?></td>
                    <!-- Menampilkan peran/role dosen -->
                    <td><?php echo $row['role'] ?></td>
                </tr>                
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Judul untuk tabel kelas -->
        <h2>CLASSES</h2>
        
        <!-- Tabel yang menampilkan data kelas -->
        <table class="table table-bordered w-75" id="myTable">
            <thead>
                <tr>
                    <!-- Header tabel dengan kolom: No, ID Class, ID Program, ID Academic Advisor, Class Name, Academic Year -->
                    <th scope="col">NO.</th>
                    <th scope="col">ID CLASS</th>
                    <th scope="col">ID PROGRAM</th>
                    <th scope="col">ID ACADEMIC ADVISOR</th>
                    <th scope="col">CLASS NAME</th>
                    <th scope="col">ACADEMIC YEAR</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan setiap baris data kelas -->
                <?php foreach ($data2 as $row): ?>
                <tr>
                    <!-- Nomor urut untuk setiap baris -->
                    <td><?php echo $no2++ ?></td>
                    <!-- Menampilkan ID kelas -->
                    <td><?php echo $row['id_class'] ?></td>
                    <!-- Menampilkan ID program -->
                    <td><?php echo $row['id_program'] ?></td>
                    <!-- Menampilkan ID dosen wali -->
                    <td><?php echo $row['id_academic_advisor'] ?></td>
                    <!-- Menampilkan nama kelas -->
                    <td><?php echo $row['class_name'] ?></td>
                    <!-- Menampilkan tahun akademik -->
                    <td><?php echo $row['academic_year'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    
    <!-- Mengimpor Bootstrap JS untuk interaksi dan komponen yang memerlukan JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

### 6. koordinator.php
```php
<?php 
// Mengimpor file 'database.php' untuk koneksi ke database dan 'lecturers.php' untuk memuat kelas lecturers.
require_once 'database.php';
require_once 'lecturers.php';

// Membuat instance dari kelas 'lecturers' untuk mengakses data dosen dari database.
$laporan = new lecturers(); 

// Mengambil data dosen dari database menggunakan metode 'tampilData()' dan menyimpannya dalam variabel $data.
$data = $laporan->tampilData();

// Inisialisasi variabel $no untuk nomor urut tabel dosen.
foreach ($data as $row) {
  $no = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag untuk karakter encoding dan pengaturan viewport agar responsif di semua perangkat -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Mengimpor Bootstrap CSS versi 5.3.3 dan DataTables CSS untuk styling tabel -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    <!-- Judul dokumen HTML -->
    <title>Document</title>
</head>
<body>
    <!-- Bagian navigasi situs -->
    <nav class="navbar navbar-expand-lg bg-primary mb-5">
        <div class="container-fluid">
            <!-- Branding logo -->
            <a class="navbar-brand" href="#">SIWALI JKB</a>
            
            <!-- Tombol toggle untuk navigasi mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Daftar menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- Item menu navigasi: Home -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- Item menu navigasi: Lecturers -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-lecturers.php">Lecturers</a>
                    </li>
                    <!-- Item menu navigasi: Classes -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-classes.php">Classes</a>
                    </li>
                    <!-- Dropdown menu untuk Roles -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Roles
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Item dropdown: Admin -->
                            <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                            <!-- Item dropdown: Program Coordinator -->
                            <li><a class="dropdown-item" href="koordinator.php">Program Coordinator</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian utama halaman, menampilkan laporan dosen -->
    <main class="d-flex flex-column justify-content-center align-items-center">
        <!-- Judul untuk tabel dosen -->
        <h2>LECTURER REPORTS</h2>
        
        <!-- Tabel yang menampilkan data dosen -->
        <table class="table table-bordered w-75" id="myTable">
            <thead>
                <tr>
                    <!-- Header tabel dengan kolom: No, NIDN, Nama Lengkap, NIP, Phone Number, Address, Signature, Status -->
                    <th scope="col">NO.</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">NIP</th>
                    <th scope="col">PHONE NUMBER</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">SIGNATURE</th>
                    <th scope="col">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan setiap baris data dosen -->
                <?php foreach ($data as $row): ?>
                <tr>
                    <!-- Nomor urut untuk setiap baris -->
                    <td><?php echo $no++ ?></td>
                    <!-- Menampilkan NIDN dosen -->
                    <td><?php echo $row['nidn'] ?></td>
                    <!-- Menampilkan Nama Lengkap dosen -->
                    <td><?php echo $row['name'] ?></td>
                    <!-- Menampilkan NIP dosen -->
                    <td><?php echo $row['nip'] ?></td>
                    <!-- Menampilkan nomor telepon dosen -->
                    <td><?php echo $row['phone_number'] ?></td>
                    <!-- Menampilkan alamat dosen -->
                    <td><?php echo $row['address'] ?></td>
                    <!-- Menampilkan tanda tangan dosen -->
                    <td><?php echo $row['signature'] ?></td>
                    <!-- Menampilkan status dosen -->
                    <td><?php echo $row['status'] ?></td>
                </tr>                
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    
    <!-- Mengimpor Bootstrap JS untuk interaksi dan komponen yang memerlukan JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

### 7. tampil-classes.php
```php
<?php 
// Mengimpor file 'database.php' dan 'classes.php' agar kelas-kelas yang diperlukan dapat digunakan dalam kode ini.
require_once 'database.php';
require_once 'classes.php';

// Membuat instance dari kelas 'classes' untuk mengakses data dari tabel 'classes'.
$class = new classes();

// Mengambil data dari tabel 'classes' dan menyimpannya ke dalam variabel $data.
$data = $class->tampilData();

// Inisialisasi variabel $no sebagai penghitung nomor urut untuk tabel.
foreach ($data as $row) {
  $no = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag untuk karakter encoding dan pengaturan viewport agar responsif di semua perangkat -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Mengimpor Bootstrap CSS versi 4.4.1 dan DataTables CSS untuk styling tabel -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    <!-- Judul dokumen HTML -->
    <title>Document</title>
</head>
<body>
    <!-- Bagian navigasi situs -->
    <nav class="navbar navbar-expand-lg bg-dark mb-5">
        <div class="container-fluid">
            <!-- Branding logo -->
            <a class="navbar-brand" href="#">SIWALI JKB</a>
            
            <!-- Tombol toggle untuk navigasi mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Daftar menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- Item menu navigasi: Home -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- Item menu navigasi: Lecturers -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-lecturers.php">Lecturers</a>
                    </li>
                    <!-- Item menu navigasi: Classes -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-classes.php">Classes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian utama halaman, menampilkan data kelas -->
    <main class="d-flex flex-column justify-content-center align-items-center">
        <!-- Judul untuk tabel kelas -->
        <h2>CLASSES</h2>
        
        <!-- Tabel yang menampilkan data kelas -->
        <table class="table table-bordered w-75" id="myTable">
            <thead>
                <tr>
                    <!-- Header tabel dengan kolom: No, ID Class, ID Program, ID Academic Advisor, Class Name, Academic Year -->
                    <th scope="col">NO.</th>
                    <th scope="col">ID CLASS</th>
                    <th scope="col">ID PROGRAM</th>
                    <th scope="col">ID ACADEMIC ADVISOR</th>
                    <th scope="col">CLASS NAME</th>
                    <th scope="col">ACADEMIC YEAR</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan setiap baris data kelas -->
                <?php foreach ($data as $row): ?>
                <tr>
                    <!-- Nomor urut untuk setiap baris -->
                    <td><?php echo $no++ ?></td>
                    <!-- Menampilkan ID Class -->
                    <td><?php echo $row['id_class'] ?></td>
                    <!-- Menampilkan ID Program -->
                    <td><?php echo $row['id_program'] ?></td>
                    <!-- Menampilkan ID Academic Advisor -->
                    <td><?php echo $row['id_academic_advisor'] ?></td>
                    <!-- Menampilkan Nama Kelas -->
                    <td><?php echo $row['class_name'] ?></td>
                    <!-- Menampilkan Tahun Akademik -->
                    <td><?php echo $row['academic_year'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
```

### 8. tampil-lecturers.php
```php
<?php  
// Mengimpor file 'database.php' dan 'lecturers.php' untuk memuat kelas-kelas yang diperlukan dalam kode ini.
require_once 'database.php';
require_once 'lecturers.php';

// Membuat instance dari kelas 'lecturers' untuk mengakses data dosen dari database.
$lecture = new lecturers();

// Mengambil data dari tabel 'lecturers' dan menyimpannya ke dalam variabel $data.
$data = $lecture->tampilData();

// Inisialisasi variabel $no sebagai penghitung nomor urut untuk tabel.
foreach ($data as $row) {
  $no = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag untuk karakter encoding dan pengaturan viewport agar responsif di semua perangkat -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Mengimpor Bootstrap CSS versi 4.4.1 dan DataTables CSS untuk styling tabel -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    <!-- Judul dokumen HTML -->
    <title>Document</title>
</head>
<body>
    <!-- Bagian navigasi situs -->
    <nav class="navbar navbar-expand-lg bg-dark mb-5">
        <div class="container-fluid">
            <!-- Branding logo -->
            <a class="navbar-brand" href="#">SIWALI JKB</a>
            
            <!-- Tombol toggle untuk navigasi mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Daftar menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- Item menu navigasi: Home -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- Item menu navigasi: Lecturers -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-lecturers.php">Lecturers</a>
                    </li>
                    <!-- Item menu navigasi: Classes -->
                    <li class="nav-item">
                        <a class="nav-link" href="tampil-classes.php">Classes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian utama halaman, menampilkan data dosen -->
    <main class="d-flex flex-column justify-content-center align-items-center">
        <!-- Judul untuk tabel dosen -->
        <h2>LECTURERS</h2>
        
        <!-- Tabel yang menampilkan data dosen -->
        <table class="table table-bordered w-75" id="myTable">
            <thead>
                <tr>
                    <!-- Header tabel dengan kolom: No, NIDN, Nama Lengkap, NIP, Phone Number, Address, Signature, ID Position, ID User -->
                    <th scope="col">NO.</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">NIP</th>
                    <th scope="col">PHONE NUMBER</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">SIGNATURE</th>
                    <th scope="col">ID POSITION</th>
                    <th scope="col">ID USER</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk menampilkan setiap baris data dosen -->
                <?php foreach ($data as $row): ?>
                <tr>
                    <!-- Nomor urut untuk setiap baris -->
                    <td><?php echo $no++ ?></td>
                    <!-- Menampilkan NIDN dosen -->
                    <td><?php echo $row['nidn'] ?></td>
                    <!-- Menampilkan Nama Lengkap dosen -->
                    <td><?php echo $row['name'] ?></td>
                    <!-- Menampilkan NIP dosen -->
                    <td><?php echo $row['nip'] ?></td>
                    <!-- Menampilkan nomor telepon dosen -->
                    <td><?php echo $row['phone_number'] ?></td>
                    <!-- Menampilkan alamat dosen -->
                    <td><?php echo $row['address'] ?></td>
                    <!-- Menampilkan tanda tangan dosen -->
                    <td><?php echo $row['signature'] ?></td>
                    <!-- Menampilkan ID posisi dosen -->
                    <td><?php echo $row['id_position'] ?></td>
                    <!-- Menampilkan ID user dosen -->
                    <td><?php echo $row['id_user'] ?></td>
                </tr>                
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
```

## Result
### 1. index.php
![image](https://github.com/user-attachments/assets/1c919921-e129-4367-95ea-b5894507155b)

Menampilkan preview data kelas dan dosen

### 2. tampil-lecturers.php
![image](https://github.com/user-attachments/assets/eeddab7e-5105-4a0c-9f94-c58d9b29c626)

Menampilkan semua detail data - data dosen yang ada di database

### 3. tampil-classes.php
![image](https://github.com/user-attachments/assets/749a1c5d-9031-4d23-ae77-a85553b03177)

Menampilkan semua detail data - data kelas yang ada di database

### 4. admin.php
![image](https://github.com/user-attachments/assets/74ba6a0c-411a-4652-aad4-4e2c40d31d76)

### 5. koordinator.php
![image](https://github.com/user-attachments/assets/43453148-55a3-4e14-a7a2-2c6f2d1cfca1)




Menampilkan detail data - data dosen yang ada di database

### 3. tampil-classes.php


