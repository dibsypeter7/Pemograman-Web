<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$no_anggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$no_hp = trim($_POST['no_hp'] ?? '');
$email = trim($_POST['email'] ?? '');

$errors = [];

if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}

if ($no_anggota === '') {
    $errors[] = "No. Anggota wajib diisi.";
} elseif (!preg_match('/^A[0-9]{3}$/', $no_anggota)) {
    $errors[] = "Format No. Anggota harus huruf A diikuti 3 angka (contoh: A005).";
}

if ($no_hp !== '' && !preg_match('/^[0-9]{10,13}$/', $no_hp)) {
    $errors[] = "No. HP harus 10-13 digit angka.";
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO anggota (nama, no_anggota, alamat, no_hp, email)
         VALUES (:nama, :no_anggota, :alamat, :no_hp, :email)
         RETURNING id"
    );
    $stmt->execute([
        'nama' => $nama,
        'no_anggota' => $no_anggota,
        'alamat' => $alamat,
        'no_hp' => $no_hp,
        'email' => $email,
    ]);
} catch (PDOException $e) {
    if ($e->getCode() === '23505') { 
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'No. Anggota sudah dipakai, gunakan nomor lain.'];
        header('Location: tambah.php');
        exit;
    }
    throw $e;
}

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil ditambahkan.'];
header('Location: list.php');
exit;