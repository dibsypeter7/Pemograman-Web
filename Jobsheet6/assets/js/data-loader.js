// Fungsi generik untuk fetch & render tabel dari file JSON manapun
async function muatDaftarData(url, kolomKeys) {
  const tbody = document.querySelector(".table-responsive table tbody");
  const loading = document.getElementById("loading-indicator");

  if (!tbody) return;

  loading.style.display = "block";
  tbody.innerHTML = "";

  try {
    await new Promise((resolve) => setTimeout(resolve, 3000));

    const res = await fetch(url);
    if (!res.ok) {
      throw new Error("Gagal mengambil data (status " + res.status + ")");
    }
    const daftarData = await res.json();

    daftarData.forEach(function (item) {
      const tr = document.createElement("tr");

      // Bangun sel <td> untuk setiap kolom yang diminta
      let selHtml = "";
      kolomKeys.forEach(function (key) {
        selHtml += "<td>" + item[key] + "</td>";
      });

      selHtml +=
        "<td>" +
        "<button class=\"btn-edit\">Edit</button> " +
        "<button class=\"btn-detail\">Detail</button> " +
        "<button class=\"btn-hapus\">Hapus</button>" +
        "</td>";

      tr.innerHTML = selHtml;
      tbody.appendChild(tr);
    });

  } catch (err) {
    const jumlahKolom = kolomKeys.length + 1;
    tbody.innerHTML =
      "<tr><td colspan=\"" + jumlahKolom + "\">Gagal memuat data: " + err.message + "</td></tr>";

  } finally {
    loading.style.display = "none";
  }
}