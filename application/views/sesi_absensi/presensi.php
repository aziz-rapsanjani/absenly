<!DOCTYPE html>
<html>

<head>
    <title>Daftar Siswa Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3>Daftar Siswa Absen</h3>

        <p>
            <b>Sesi ID:</b> <?= $sesi->id ?> |
            <b>Tanggal:</b> <?= $sesi->tanggal_sesi ?>
        </p>

        <a href="<?= base_url('index.php/SesiAbsensi') ?>" class="btn btn-secondary mb-3">
            Kembali
        </a>

        <table class="table table-bordered table-striped">

            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Waktu Scan</th>
                <th>Status</th>
            </tr>

            <?php $no = 1;
            foreach ($presensi as $p): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p->nisn ?></td>
                    <td><?= $p->nama_siswa ?></td>
                    <td><?= $p->waktu_scan ?></td>
                    <td>
                        <span class="badge bg-success">
                            <?= $p->status ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>

</body>

</html>