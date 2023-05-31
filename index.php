<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

//ambil data dari tabel dosen
$result = mysqli_query($conn, "SELECT * FROM dosen");

echo"<a href='/siakad/dosen/add.php'>tambah dosen</a>";


if (mysqli_num_rows($result) > 0) {
    // Menampilkan data dalam bentuk tabel
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>nidn</th><th>jenjang pendidikan</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nama"]."</td>";
        echo "<td>".$row["nidn"]."</td>";
        echo "<td>".$row["jenjang_pendidikan"]."</td>";
        echo "<td><a href='/siakad/dosen/edit.php?id=".
         $row["id"]."'>Edit</a> | <a href='/siakad/dosen/delete.php?id=".$row["id"]."'>Hapus</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi
mysqli_close($conn);
?>