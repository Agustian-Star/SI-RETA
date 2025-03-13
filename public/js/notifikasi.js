document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let nama = document.getElementById("nama").value.trim();
        let alamat = document.getElementById("alamat").value.trim();
        let noTelp = document.getElementById("no_telp").value.trim();
        let jenisKelamin = document.getElementById("jenis_kelamin").value;
        let keperluan = document.getElementById("keperluan").value;
        let rincian = document.getElementById("rincian_keperluan").value.trim();

        // Cek apakah ada field yang kosong
        if (!nama || !alamat || !noTelp || !jenisKelamin || !keperluan || !rincian) {
            Swal.fire({
                title: "Gagal!",
                text: "Harap isi semua kolom sebelum mengirim formulir.",
                icon: "warning",
                confirmButtonText: "OK"
            });
            event.preventDefault(); // Mencegah form dikirim
            return;
        }

        let noTelpRegex = /^[0-9]{10,}$/;
        if (!noTelpRegex.test(noTelp)) {
            Swal.fire({
                title: "Format Salah!",
                text: "Nomor telepon harus berupa angka dengan minimal 10 digit.",
                icon: "error",
                confirmButtonText: "OK"
            });
            event.preventDefault();
            return;
        }

        // Validasi minimal 4 kata pada rincian keperluan
        let rincianWords = rincian.split(/\s+/).filter(word => word.length > 0);
        if (rincianWords.length < 4) {
            Swal.fire({
                title: "Terlalu Pendek!",
                text: "Rincian keperluan harus minimal 4 kata.",
                icon: "warning",
                confirmButtonText: "OK"
            });
            event.preventDefault();
            return;
        }

        // Jika semua validasi lolos, munculkan konfirmasi
        event.preventDefault(); // Mencegah form dikirim langsung
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin mengirim formulir?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, Kirim",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Kirim form jika dikonfirmasi
            }
        });
    });
});
