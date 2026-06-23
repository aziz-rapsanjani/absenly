<!DOCTYPE html>
<html>
<head>
    <title>Panel Kontrol Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .table-responsive-sticky {
            max-height: 75vh; 
            overflow-y: auto;
            border: 1px solid #dee2e6; 
        }
        .table thead th {
            position: sticky;
            top: 0;
            z-index: 2;
            background-color: #034d97 !important; 
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3">Panel Kontrol Guru</h3>
    <div class="table-responsive table-responsive-sticky shadow-sm rounded">
        <table class="table table-bordered table-striped align-middle mb-0">
            
            <thead class="table-dark">
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">NISN</th>
                    <th width="30%">Nama Siswa</th>
                    <th width="15%">Kelas</th>
                    <th width="15%">Status</th>
                    <th width="10%">Keterangan</th>
                    <th width="10%" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php $no = 1; ?>
            <?php foreach($siswa as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->nisn ?></td>
                    <td><?= $row->nama_siswa ?></td>
                    <td><?= $row->nama_kelas ?></td>
                    <td>
                        <?php if($row->status == 'Hadir'): ?>
                            <span class="badge bg-success">Hadir</span>
                        <?php elseif($row->status == 'Sakit'): ?>
                            <span class="badge bg-warning text-dark">Sakit</span>
                        <?php elseif($row->status == 'Izin'): ?>
                            <span class="badge bg-primary">Izin</span>
                        <?php elseif($row->status == 'Terlambat'): ?>
                            <span class="badge bg-info text-dark">Terlambat</span>
                        <?php elseif($row->status == 'Alpa'): ?>
                            <span class="badge bg-danger">Alpa</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Belum Absen</span>
                        <?php endif; ?>
                    </td>
                    <td><?= (!empty($row->keterangan)) ? $row->keterangan : '-' ?></td>
                    <td class="text-center">
                        <a href="<?= site_url('panelguru/edit/'.$row->siswa_id) ?>" class="btn btn-sm btn-warning fw-bold">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>