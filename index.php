<?php
require_once 'Menu.php';
require_once 'Makanan.php';
require_once 'Minuman.php';
require_once 'Restoran.php';

$restoran = new Restoran();

// Menambahkan beberapa menu (contoh data awal)
$restoran->tambahMenu(new Makanan('Nasi Goreng', 15000, 'Nasi'));
$restoran->tambahMenu(new Makanan('Ayam Bakar', 20000, 'Ayam'));
$restoran->tambahMenu(new Minuman('Es Teh', 5000, 300));
$restoran->tambahMenu(new Minuman('Jus Jeruk', 8000, 250));

// Handle form submit untuk menambah menu baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah_menu'])) {
        $namaMenu = $_POST['nama_menu'];
        $hargaMenu = $_POST['harga_menu'];
        $jenisMenu = $_POST['jenis_menu'];

        // Validasi input (tambahkan validasi sesuai kebutuhan)
        if (!empty($namaMenu) && is_numeric($hargaMenu) && !empty($jenisMenu)) {
            if ($_POST['jenis'] === 'makanan') {
                $menu = new Makanan($namaMenu, $hargaMenu, $jenisMenu);
            } elseif ($_POST['jenis'] === 'minuman') {
                $menu = new Minuman($namaMenu, $hargaMenu, $jenisMenu);
            }

            $restoran->tambahMenu($menu);
        }
    } elseif (isset($_POST['edit_harga'])) {
        $namaMenu = $_POST['nama_menu'];
        $hargaBaru = $_POST['harga_baru'];

        // Validasi input (tambahkan validasi sesuai kebutuhan)
        if (!empty($namaMenu) && is_numeric($hargaBaru)) {
            $restoran->editHargaMenu($namaMenu, $hargaBaru);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Restoran</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="bg">
        <div class="container ">
            <div class="txt">

                <h2>Menu Restoran</h2>
                <div class="form-container">

                    <!-- Form untuk menambah menu baru -->
                    <form method="post">
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Menu:</label>
                            <select name="jenis" class="form-select">
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu:</label>
                            <input type="text" name="nama_menu" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_menu" class="form-label">Harga Menu:</label>
                            <input type="number" name="harga_menu" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_menu" class="form-label">Jenis (hanya untuk Makanan):</label>
                            <input type="text" name="jenis_menu" class="form-control" placeholder="Contoh: Nasi, Ayam, etc." required>
                        </div>

                        <input type="submit" name="tambah_menu" value="Tambah Menu" class="btn btn-primary">
                    </form>
                    <div class="edit-harga">

                        <!-- Form untuk mengedit harga menu -->
                        <form method="post">
                            <div class="mb-3">
                                <label for="nama_menu" class="form-label">Nama Menu (untuk Edit Harga)</label>
                                <input type="text" name="nama_menu" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga_baru" class="form-label">Harga Baru</label>
                                <input type="number" name="harga_baru" class="form-control" required>
                            </div>

                            <input type="submit" name="edit_harga" value="Edit Harga" class="btn btn-primary">
                        </form>
                    </div>
                
                </div>
            
            </div>
        
            <!-- Menampilkan daftar menu -->
            <table class="table table-hover table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jenis (Makanan)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($restoran->getDaftarMenu() as $menu) : ?>
                        <tr>
                            <td><?= $menu->getNama(); ?></td>
                            <td>Rp <?= number_format($menu->getHarga(), 0, ',', '.'); ?></td>
                            <?php if ($menu instanceof Makanan) : ?>
                                <td><?= $menu->getJenisMakanan(); ?></td>
                            <?php else : ?>
                                <td>-</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



</body>
</html>
