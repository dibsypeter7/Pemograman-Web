<?php
$page_title = "Tambah Buku";
include __DIR__ . '/../includes/header.php';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <h2>Tambah Buku</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <form id="form-tambah" method="post" action="proses_tambah.php">
        <p>
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" placeholder="Contoh: Laskar Pelangi">
        </p>
        <p>
            <label for="pengarang">Pengarang</label>
            <input type="text" id="pengarang" name="pengarang" placeholder="Contoh: Andrea Hirata">
        </p>
        <p>
            <label for="tahun">Tahun Terbit</label>
            <input type="number" id="tahun" name="tahun" placeholder="Contoh: 2005">
        </p>
        <p>
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" placeholder="Contoh: 978-602-1234-56-7">
        </p>
        <p>
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" min="0" placeholder="Contoh: 4">
        </p>
        <p>
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" placeholder="Contoh: Novel">
        </p>
        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>