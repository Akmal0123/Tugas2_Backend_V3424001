<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama'] ?? '';
    $nohp     = $_POST['nohp'] ?? '';
    $layanan  = $_POST['layanan'] ?? '';
    $tambahan = $_POST['tambahan'] ?? array();
    $paket    = $_POST['paket'] ?? '';
    $catatan  = $_POST['catatan'] ?? '';

    // gabungkan pilihan checkbox
    $tambahanStr = !empty($tambahan) ? implode(", ", $tambahan) : '';

    // Query insert
    $sql = "INSERT INTO pemesanan (nama, nohp, layanan, tambahan, paket, catatan) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nama, $nohp, $layanan, $tambahanStr, $paket, $catatan);

    if ($stmt->execute()) {
        echo "<h3>✅ Pemesanan berhasil disimpan!</h3>";
        echo "<a href='form_laundry.php'>Kembali ke Form</a>";
    } else {
        echo "❌ Gagal menyimpan: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
