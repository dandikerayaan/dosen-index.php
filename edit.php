<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "<a href='./index.php'>Kembali ke halaman list dosen</a>";

// Memproses data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nidn = $_POST["nidn"];
    $jenjang_pendidikan = $_POST["jenjang_pendidikan"];

    // Query untuk mengubah data dalam tabel dosen
    $sql = "UPDATE dosen SET nama='$nama', nidn='$nidn', jenjang_pendidikan='$jenjang_pendidikan' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diubah.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $id = $_GET['id'];
    // Query untuk melihat data dalam tabel dosen berdasarkan id
    $sql = "SELECT * FROM  dosen WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $nidn = $row['nidn'];
        $jenjang_pendidikan = $row['jenjang_pendidikan'];
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

 // Menutup koneksi
 mysqli_close($conn);
?>

<!-- Form untuk mengubah data dosen -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required>
    <br>
    <label for="nidn">nidn:</label>
    <input type="text" name="nidn" id="nidn" value="<?php echo $nidn; ?>" required>
    <br>
    <label for="jenjang_pendidikan">jenjang pendidikan:</label>
    <input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan" value="<?php echo $jenjang_pendidikan; ?>" required>
    <br>
    <input type="submit" value="Ubah">
</form>