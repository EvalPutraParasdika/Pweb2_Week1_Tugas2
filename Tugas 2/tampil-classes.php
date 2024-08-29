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
