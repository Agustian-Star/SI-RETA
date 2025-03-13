document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function (event) {
        let rincian = document.getElementById("rincian_keperluan").value.trim();
        let jumlahKata = rincian.split(/\s+/).filter(word => word.length > 0).length;

        if (jumlahKata < 4) {
            event.preventDefault();
            Swal.fire({
                title: "Perhatian!",
                text: "Rincian Keperluan Harus Minimal 4 Kata.",
                icon: "warning",
                confirmButtonText: "OK"
            });
        }
    });
});
