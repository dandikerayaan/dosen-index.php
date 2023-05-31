<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memproses data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nidn = $_POST["nidn"];
    $jenjang_pendidikan = $_POST["jenjang_pendidikan"];
    
    // Query untuk menambahkan data ke tabel dosen
    $sql = "INSERT INTO dosen (nama, nidn, jenjang_pendidikan) VALUES ('$nama', '$nidn', '$jenjang_pendidikan')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Menutup koneksi
    mysqli_close($conn);
}
?>
<a href="./index.php">Kembali ke halaman list dosen</a>
<!-- Form untuk menambahkan data dosen -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>
    <br>
    <label for="nidn">nidn:</label>
    <input type="text" name="nidn" id="nidn" required>
    <br>
    <label for="jenjang_pendidikan">jenjang pendidikan:</label>
    <input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan" required>
    <br>
    <input type="submit" value="Tambahkan">
</form>