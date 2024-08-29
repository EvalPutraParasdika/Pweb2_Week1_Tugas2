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
