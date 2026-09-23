// Mengambil & menampilkan Daftar Buku secara asinkron dari data/buku.json
async function muatDaftarBuku() {
  // 4.2 Mengambil Elemen yang Dibutuhkan
  const tbody = document.querySelector(".table-responsive table tbody");
  const loading = document.getElementById("loading-indicator");

  if (!tbody) return;

  // 4.3 Menampilkan Loading Indicator
  loading.style.display = "block";
  tbody.innerHTML = "";

  try {
    // 4.4 Simulasi delay jaringan agar loading indicator terlihat
    await new Promise((resolve) => setTimeout(resolve, 600));

    // 4.5 Mengambil Data dan Memeriksa Keberhasilannya
    const res = await fetch("../data/buku.json");
    if (!res.ok) {
      throw new Error("Gagal mengambil data (status " + res.status + ")");
    }
    const daftarBuku = await res.json();

    // 4.6 Membuat Baris Tabel dari Data
    daftarBuku.forEach(function (buku) {
      const tr = document.createElement("tr");
      tr.innerHTML =
        "<td>" + buku.judul + "</td>" +
        "<td>" + buku.pengarang + "</td>" +
        "<td>" + buku.tahun + "</td>" +
        "<td>" + buku.stok + "</td>" +
        "<td>" +
        "<button class=\"btn-edit\">Edit</button> " +
        "<button class=\"btn-detail\">Detail</button> " +
        "<button class=\"btn-hapus\">Hapus</button>" +
        "</td>";
      tbody.appendChild(tr);
    });

  } catch (err) {
    // 4.7 Menangkap dan Menampilkan Error
    tbody.innerHTML =
      "<tr><td colspan=\"5\">Gagal memuat data: " + err.message + "</td></tr>";

  } finally {
    // 4.8 Selalu Menyembunyikan Loading
    loading.style.display = "none";
  }
}

// 4.9 Memanggil Fungsi Saat Halaman Siap
document.addEventListener("DOMContentLoaded", muatDaftarBuku);