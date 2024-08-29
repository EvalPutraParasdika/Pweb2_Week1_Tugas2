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
