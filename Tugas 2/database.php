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
