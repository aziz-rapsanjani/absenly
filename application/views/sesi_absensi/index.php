<!DOCTYPE html>
<html>

<head>
    <title>Daftar Sesi Absensi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h3>Daftar Sesi Absensi</h3>

            <a href="<?= base_url('index.php/SesiAbsensi/tambah') ?>"
                class="btn btn-primary">
                + Tambah Sesi
            </a>

        </div>

        <div class="card shadow">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead class="table-dark">

                            <tr>
                                <th>ID</th>
                                <th>Guru</th>
                                <th>Kelas</th>
                                <th>Mapel</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Hotspot</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php if (!empty($sesi)): ?>

                                <?php foreach ($sesi as $s): ?>

                                    <tr>

                                        <td><?= $s->id ?></td>

                                        <td>
                                            <?= $s->nama_guru ?>
                                        </td>

                                        <td>
                                            <?= $s->nama_kelas ?>
                                        </td>

                                        <td>
                                            <?= $s->nama_mapel ?>
                                        </td>

                                        <td>
                                            <?= $s->tanggal_sesi ?>
                                        </td>

                                        <td>
                                            <?= $s->jam_mulai ?>
                                        </td>

                                        <td>

                                            <?php if ($s->is_hotspot_validation == 1): ?>

                                                <span class="badge bg-success">
                                                    Aktif
                                                </span>

                                            <?php else: ?>

                                                <span class="badge bg-secondary">
                                                    Nonaktif
                                                </span>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <a href="<?= base_url('index.php/SesiAbsensi/detail/' . $s->id) ?>"
                                                class="btn btn-success btn-sm">
                                                QR
                                            </a>

                                            <a href="<?= base_url('index.php/SesiAbsensi/presensi/' . $s->id) ?>"
                                                class="btn btn-primary btn-sm">
                                                Presensi
                                            </a>

                                            <a href="<?= base_url('index.php/SesiAbsensi/hapus/' . $s->id) ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus sesi ini?')">
                                                Hapus
                                            </a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="8" class="text-center">
                                        Belum ada sesi absensi
                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>