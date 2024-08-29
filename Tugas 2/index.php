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
