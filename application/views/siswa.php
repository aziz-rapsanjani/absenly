<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scan Absensi — Hadirly</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href='assets/css/siswa.css'>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 p-0 m-0">

    <svg style="display: none" xmlns="http://www.w3.org/2000/svg">
        <filter id="glass-blur" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox">
            <feTurbulence type="fractalNoise" baseFrequency="0.01 0.02" numOctaves="2" result="turbulence" />
            <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="300" xChannelSelector="R"
                yChannelSelector="G" />
        </filter>
    </svg>

    <div id="canvas" class="w-100 d-flex flex-column shadow-sm position-relative min-vh-100" style="max-width: 480px;">
        <header style="background-color: #0285c70c;"
            class="d-flex justify-content-between align-items-center px-4 py-3">
            <h1 class="h4 fw-bold mb-0" style="color: white; letter-spacing: -0.5px;">Absenly</h1>
            <!-- <div id="img-cover">
                <img id="img-user" src="https://i.pinimg.com/736x/9e/ea/ab/9eeaab9fe1deff8df678bbf5f60cc370.jpg">
            </div> -->
        </header>

        <main class="flex-grow-1 px-4 py-4 d-flex flex-column align-items-center justify-content-start">
            <div id="card-mapel"
                class="w-100 p-3 rounded-4 glass-card-mapel mb-4 d-flex justify-content-between align-items-center">
                <div class="liquid-glass--bend"></div>
                <div class="liquid-glass--face"></div>
                <div class="liquid-glass--edge"></div>

                <div class="liquid-glass__content">
                    <h2 class="h5 fw-bold mb-1 text-white" id="sesi-mapel"
                        style="text-shadow: 0 1px 4px rgba(0,0,0,0.2);">Matematika Wajib</h2>
                    <p class="small mb-0 text-white" id="sesi-detail"
                        style="opacity: 0.85; text-shadow: 0 1px 2px rgba(0,0,0,0.2);">Kelas XI IPA 2 &nbsp;·&nbsp;
                        08.00 – 09.30</p>
                </div>

                <span
                    class="badge bg-danger rounded-pill fw-bold text-uppercase px-3 py-2 animate-pulse liquid-glass__badge"
                    style="font-size: 0.65rem; letter-spacing: 0.5px;">Live</span>
            </div>

            <div class="scanner-wrap my-3 position-relative">
                <div class="w-100 h-100 rounded-4 overflow-hidden shadow-md bg-dark position-relative">
                    <div id="qr-reader"></div>
                </div>
            </div>

            <p class="small text-center px-3 mt-3" id="hint-text" style="color: #ffffff; line-height: 1.6;">
                Arahkan kamera depan perangkat Anda tepat ke arah <strong>QR Code</strong> yang ditampilkan oleh guru di
                monitor depan kelas.
            </p>
        </main>

        <footer class="py-3 text-center border-top border-light"
            style="font-size: 0.75rem; background: #F8F9FA; color: #64748B;">
            &copy; 2026 Absenly &mdash; Sistem Presensi Digital
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let html5Qr;
        function startScanner() {
            html5Qr = new Html5Qrcode('qr-reader');
            html5Qr.start(
                { facingMode: 'environment' },
                { fps: 10, qrbox: { width: 220, height: 220 } },
                onScanSuccess,
                onScanFailure
            ).catch(err => {
                console.error("Gagal inisialisasi kamera: ", err);
                document.getElementById('hint-text').innerHTML =
                    `<span class="text-danger fw-bold">Gagal Mengakses Kamera!</span><br>Pastikan izin penggunaan kamera telah diizinkan pada pengaturan browser Anda.`;
            });
        }

        function onScanSuccess(decodedText) {
            if (html5Qr) {
                html5Qr.stop().then(() => {
                    alert("QR Code Berhasil Terbaca!\nToken: " + decodedText);
                }).catch(err => console.error(err));
            }
        }
        function onScanFailure(error) {}
        window.addEventListener('DOMContentLoaded', startScanner);
        
        <?php $swal = $this->session->flashdata('swal'); ?>
        <?php if ($swal): ?>
            Swal.fire({
                icon: '<?php echo $swal['icon']; ?>',
                title: '<?php echo $swal['title']; ?>',
                text: '<?php echo $swal['text']; ?>',
                confirmButtonColor: '#0d6efd'
            });
        <?php endif; ?>
    </script>
</body>
</html>