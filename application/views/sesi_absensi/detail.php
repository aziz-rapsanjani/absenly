<!DOCTYPE html>
<html>
<head>
    <title>QR Sesi Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4 text-center">

        <h3 class="mb-3">QR Absensi Sesi</h3>

        <p><b>ID Sesi:</b> <?= $sesi->id ?></p>
        <p><b>Tanggal:</b> <?= $sesi->tanggal_sesi ?></p>
        <p><b>Jam:</b> <?= $sesi->jam_mulai ?></p>

        <?php if($sesi->is_hotspot_validation == 1): ?>

            <div class="alert alert-success">
                <strong>✓ Hotspot Validation Aktif</strong><br>
                IP Guru: <?= $sesi->ip_guru_aktif ?>
            </div>

        <?php else: ?>

            <div class="alert alert-secondary">
                Hotspot Validation Tidak Aktif
            </div>

        <?php endif; ?>

        <img id="qrImage"
             width="250"
             class="mx-auto d-block mt-3 border rounded p-2 bg-white">

        <h5 class="mt-3 text-danger">
            QR akan berubah dalam:
            <span id="countdown">30</span> detik
        </h5>

        <p class="mt-2 text-muted">
            Sistem QR Dinamis Aktif
        </p>

        <hr>

        <a href="<?= base_url('index.php/SesiAbsensi') ?>"
           class="btn btn-secondary">
            Kembali
        </a>

        <a href="<?= base_url('index.php/SesiAbsensi/presensi/'.$sesi->id) ?>"
           class="btn btn-primary">
            Lihat Presensi
        </a>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

let timer = 30;
let intervalCountdown;

function loadQR()
{
    $.getJSON(
        "<?= base_url('index.php/SesiAbsensi/generateToken/'.$sesi->id) ?>",
        function(res)
        {
            let url =
                "<?= base_url('index.php/absen/scan') ?>" +
                "?token=" + res.token +
                "&sesi=<?= $sesi->id ?>";

            let qr =
                "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" +
                encodeURIComponent(url);

            $("#qrImage").attr("src", qr);
        }
    );
}

function startCountdown()
{
    timer = 30;

    $("#countdown").text(timer);

    clearInterval(intervalCountdown);

    intervalCountdown = setInterval(function()
    {
        timer--;

        $("#countdown").text(timer);

        if (timer <= 0)
        {
            clearInterval(intervalCountdown);

            loadQR();

            startCountdown();
        }

    }, 1000);
}

$(document).ready(function()
{
    loadQR();
    startCountdown();
});

</script>

</body>
</html>