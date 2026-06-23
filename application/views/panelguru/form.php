<!DOCTYPE html>
<html>
<head>
    <title>Edit Kehadiran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-scrollable {
            max-height: 65vh; 
            overflow-y: auto;
        }
        .card-header-sticky {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #fff;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header card-header-sticky py-3">
            <h4 class="mb-0">Edit Kehadiran Siswa</h4>
        </div>

        <div class="card-body card-scrollable">
            <form action="<?= site_url('panelguru/update') ?>" method="post">
                <input type="hidden" name="siswa_id" value="<?= $siswa->siswa_id ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">NISN</label>
                    <input type="text" class="form-control bg-light" value="<?= $siswa->nisn ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Siswa</label>
                    <input type="text" class="form-control bg-light" value="<?= $siswa->nama_siswa ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Kelas</label>
                    <input type="text" class="form-control bg-light" value="<?= $siswa->nama_kelas ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status Kehadiran</label>
                    <select name="status" class="form-select">
                        <option value="Belum Absen" <?= ($siswa->status == 'Belum Absen' || empty($siswa->status)) ? 'selected' : '' ?>>Belum Absen</option>
                        <option value="Hadir" <?= ($siswa->status == 'Hadir') ? 'selected' : '' ?>>Hadir</option>
                        <option value="Terlambat" <?= ($siswa->status == 'Terlambat') ? 'selected' : '' ?>>Terlambat</option>
                        <option value="Sakit" <?= ($siswa->status == 'Sakit') ? 'selected' : '' ?>>Sakit</option>
                        <option value="Izin" <?= ($siswa->status == 'Izin') ? 'selected' : '' ?>>Izin</option>
                        <option value="Alpa" <?= ($siswa->status == 'Alpa') ? 'selected' : '' ?>>Alpa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Keterangan</label>
                    <textarea name="keterangan"
                    class="form-control" rows="3"
                    placeholder="Tambahkan catatan jika diperlukan...">
                    <?= $siswa->keterangan ?></textarea>
                </div>

                <div class="mt-4 pt-2 border-top">
                    <button type="submit" class="btn btn-success px-4">
                        Simpan Perubahan
                    </button>
                    <a href="<?= site_url('panelguru') ?>" class="btn btn-secondary px-4">
                        Kembali
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>