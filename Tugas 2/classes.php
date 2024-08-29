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
