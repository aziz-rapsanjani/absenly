<!DOCTYPE html>
<html>

<head>
    <title>Tambah Sesi Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <div class="card shadow p-4">

            <h3 class="mb-3">Tambah Sesi Absensi</h3>

            <form method="post" action="<?= base_url('index.php/SesiAbsensi/tambah') ?>">

                <div class="mb-3">
                    <label class="form-label">Guru</label>
                    <select name="guru_id" class="form-control" required>
                        <option value="">-- Pilih Guru --</option>
                        <?php foreach ($guru as $g): ?>
                            <option value="<?= $g->id ?>">
                                <?= $g->nama_guru ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas_id" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($kelas as $k): ?>
                            <option value="<?= $k->id ?>">
                                <?= $k->nama_kelas ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="mapel_id" class="form-control" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        <?php foreach ($mapel as $m): ?>
                            <option value="<?= $m->id ?>">
                                <?= $m->nama_mapel ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Sesi</label>
                    <input type="date"
                        name="tanggal_sesi"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <input type="time"
                        name="jam_mulai"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input"
                            type="checkbox"
                            value="1"
                            id="is_hotspot_validation"
                            name="is_hotspot_validation">

                        <label class="form-check-label"
                            for="is_hotspot_validation">
                            Aktifkan Validasi Hotspot
                        </label>
                    </div>

                    <small class="text-muted">
                        Jika diaktifkan, siswa harus berada pada jaringan yang sama
                        dengan guru saat melakukan scan QR.
                    </small>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">
                    Simpan Sesi
                </button>

                <a href="<?= base_url('index.php/SesiAbsensi') ?>"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</body>

</html>