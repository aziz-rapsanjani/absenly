<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Portal Academic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      /* background: linear-gradient(135deg, #1e3a8a 0%, #0d2147 100%); */
      background-image: url('https://i.ibb.co.com/WNz2Rq88/bg-1.jpg');
       /* Mencegah gambar mengulang (tiling) jika kontainer lebih besar dari gambar */
    background-repeat: no-repeat;

    /* Memposisikan gambar tepat di tengah kontainer */
    background-position: center;

    /* Memaksa gambar menutupi seluruh area kontainer secara proporsional */
    background-size: cover;
      min-height: 100vh;
    }
    .login-card {
      border: 1px solid rgba(255, 255, 255, 0.15);
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
    }
    .input-group-text {
      background: rgba(255, 255, 255, 0.1);
      color: #93c5fd;
      border-color: rgba(255, 255, 255, 0.15);
    }
    .form-control {
      background: rgba(255, 255, 255, 0.05);
      color: #fff;
      border-color: rgba(255, 255, 255, 0.15);
    }
    .form-control:focus {
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      border-color: #60a5fa;
      box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
    }
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.4);
    }
    /* Sinkronisasi warna border input group saat focus */
    .form-control:focus ~ .input-group-text,
    .input-group:focus-within .input-group-text {
      border-color: #60a5fa;
    }
    .btn-toggle-pw {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #93c5fd;
    }
    .btn-toggle-pw:hover {
      color: #fff;
      background: rgba(255, 255, 255, 0.15);
    }
    .dropdown-menu {
      background: #0a1e46;
      border: 1px solid #60a5fa;
    }
    .dropdown-item {
      color: #dbeafe;
    }
    .dropdown-item:hover, .dropdown-item.active {
      background: rgba(59, 130, 246, 0.25);
      color: #fff;
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center py-5">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-5">
        
        <div class="card login-card text-white rounded-4 shadow-lg p-3 p-sm-4">
          <div class="card-body">
            
            <div class="text-center mb-4">
              <h2 class="fw-bold lh-sm mb-1" id="cardTitle">Absenly</h2>
              <p class="text-uppercase tracking-wider small text-white-50 mb-0">Absensi Berbasis QR Code</p>
            </div>

            <div class="mb-4">
              <label class="form-label small fw-bold text-uppercase tracking-wide text-info">Masuk Sebagai</label>
              <div class="dropdown w-100" id="roleDropdown">
                <button class="btn btn-outline-light w-100 d-flex align-items-center justify-content-between py-2.5 px-3 dropdown-toggle" type="button" id="dropdownRoleButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <span><i class="fa-solid fa-user me-2 text-info"></i><span id="csText">Siswa</span></span>
                </button>
                <ul class="dropdown-menu w-100 shadow" aria-labelledby="dropdownRoleButton">
                  <li>
                    <a class="dropdown-item active py-2.5 px-3 d-flex justify-content-between align-items-center" href="#" id="opt-siswa" onclick="selectRole('Siswa')">
                      <div>
                        <div class="fw-semibold">Siswa</div>
                        <div class="small text-white-50">Login dengan username</div>
                      </div>
                      <i class="fa-solid fa-check check-icon"></i>
                    </a>
                  </li>
                  <li><hr class="dropdown-divider bg-light opacity-10 my-0"></li>
                  <li>
                    <a class="dropdown-item py-2.5 px-3 d-flex justify-content-between align-items-center" href="#" id="opt-guru" onclick="selectRole('Guru')">
                      <div>
                        <div class="fw-semibold">Guru</div>
                        <div class="small text-white-50">Login dengan username</div>
                      </div>
                      <i class="fa-solid fa-check check-icon d-none"></i>
                    </a>
                  </li>
                  <li><hr class="dropdown-divider bg-light opacity-10 my-0"></li>
                  <li>
                    <a class="dropdown-item py-2.5 px-3 d-flex justify-content-between align-items-center" href="#" id="opt-admin" onclick="selectRole('Admin Sekolah')">
                      <div>
                        <div class="fw-semibold">Admin Sekolah</div>
                        <div class="small text-white-50">Hak akses penuh sistem</div>
                      </div>
                      <i class="fa-solid fa-check check-icon d-none"></i>
                    </a>
                  </li>
                </ul>
              </div>
              
              <div class="mt-2.5">
                <span class="badge bg-primary bg-opacity-25 border border-primary text-info px-2.5 py-1.5" id="roleBadge">
                  <i class="fa-solid fa-graduation-cap me-1"></i> Mode Siswa Aktif
                </span>
              </div>
            </div>

            <hr class="bg-light opacity-15 my-4">

            <?php if (!empty($error)): ?>
              <div class="alert alert-danger d-flex align-items-center bg-danger bg-opacity-15 border-danger text-danger-emphasis py-2 px-3 mb-3 rounded-3" role="alert">
                <i class="fa-solid fa-circle-exclamation me-2 fs-6"></i>
                <div class="small"><?php echo htmlspecialchars($error); ?></div>
              </div>
            <?php endif; ?>

            <div class="alert alert-danger d-none align-items-center bg-danger bg-opacity-15 border-danger text-danger-emphasis py-2 px-3 mb-3 rounded-3" id="alert" role="alert">
              <i class="fa-solid fa-circle-exclamation me-2 fs-6"></i>
              <div class="small" id="alert-msg"></div>
            </div>

            <form id="loginForm" method="POST" action="<?php echo base_url('auth/login'); ?>" novalidate>
              <input type="hidden" name="role" id="roleHidden" value="Siswa">

              <div class="mb-3">
                <label for="username" class="form-label small fw-bold text-uppercase tracking-wide text-info">Username</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                  <input type="text" class="form-control py-2.5" id="username" name="username" placeholder="Masukkan username kamu" autocomplete="username" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label small fw-bold text-uppercase tracking-wide text-info">Kata Sandi</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                  <input type="password" class="form-control py-2.5" id="password" name="password" placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                  <button class="btn btn-toggle-pw" type="button" onclick="togglePw()" aria-label="Tampilkan kata sandi">
                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                  </button>
                </div>
              </div>

              <div class="d-flex align-items-center justify-content-between mb-4 mt-2">
                <div class="form-check m-0">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" style="cursor: pointer;">
                  <label class="form-check-label small text-white-50 user-select-none" for="remember" style="cursor: pointer;">
                    Ingat saya
                  </label>
                </div>
                <!-- <a href="#" class="small text-info text-decoration-none fw-medium link-light">Lupa sandi?</a> -->
              </div>

              <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold text-uppercase tracking-wide shadow-sm rounded-3" id="btnLogin">
                Masuk sebagai Siswa
              </button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    /* ── Select Role Engine ────────────────────────────── */
    function selectRole(role) {
      // Perbarui teks tombol trigger dropdown
      document.getElementById('csText').textContent = role;
      
      // Kelola kelas active & icon check list di item dropdown
      const roles = ['Siswa', 'Guru', 'Admin Sekolah'];
      const ids = {'Siswa': 'opt-siswa', 'Guru': 'opt-guru', 'Admin Sekolah': 'opt-admin'};
      
      roles.forEach(r => {
        const item = document.getElementById(ids[r]);
        const check = item.querySelector('.check-icon');
        if (r === role) {
          item.classList.add('active');
          check.classList.remove('d-none');
        } else {
          item.classList.remove('active');
          check.classList.add('d-none');
        }
      });

      switchRole(role);
    }

    function switchRole(role) {
      // Set value hidden input untuk backend
      document.getElementById('roleHidden').value = role;
      
      // Update Judul Kartu dan Button
      document.getElementById('btnLogin').textContent = 'Masuk sebagai ' + role;
      
      const btnLogin = document.getElementById('btnLogin');
      const badge = document.getElementById('roleBadge');
      const triggerBtn = document.getElementById('dropdownRoleButton');
      const iconTrigger = triggerBtn.querySelector('.fa-solid');

      // Reset skema warna bootstrap class
      btnLogin.className = "btn w-100 py-2.5 fw-bold text-uppercase tracking-wide shadow-sm rounded-3 ";
      badge.className = "badge px-2.5 py-1.5 border ";
      iconTrigger.className = "fa-solid me-2 ";

      if (role === 'Guru') {
        btnLogin.classList.add('btn-info', 'text-white');
        badge.classList.add('bg-info', 'bg-opacity-25', 'border-info', 'text-info');
        badge.innerHTML = `<i class="fa-solid fa-chalkboard-user me-1"></i> Mode Guru Aktif`;
        iconTrigger.classList.add('fa-chalkboard-user', 'text-info');
      } else if (role === 'Admin Sekolah') {
        btnLogin.classList.add('btn-warning');
        badge.classList.add('bg-warning', 'bg-opacity-25', 'border-warning', 'text-warning');
        badge.innerHTML = `<i class="fa-solid fa-user-shield me-1"></i> Mode Admin Aktif`;
        iconTrigger.classList.add('fa-user-shield', 'text-warning');
      } else {
        btnLogin.classList.add('btn-primary');
        badge.classList.add('bg-primary', 'bg-opacity-25', 'border-primary', 'text-info');
        badge.innerHTML = `<i class="fa-solid fa-graduation-cap me-1"></i> Mode Siswa Aktif`;
        iconTrigger.classList.add('fa-user', 'text-info');
      }
    }

    /* ── Toggle Password Visibility ─────────────────────── */
    function togglePw() {
      const pwInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      
      if (pwInput.type === 'password') {
        pwInput.type = 'text';
        eyeIcon.className = 'fa-solid fa-eye-slash';
      } else {
        pwInput.type = 'password';
        eyeIcon.className = 'fa-solid fa-eye';
      }
    }

    /* ── Front-end Validation ───────────────────────────── */
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      const username = document.getElementById('username').value.trim();
      const pw = document.getElementById('password').value;
      const alertEl = document.getElementById('alert');
      const msg = document.getElementById('alert-msg');

      alertEl.classList.add('d-none');
      alertEl.classList.remove('d-flex');

      if (!username || !pw) {
        e.preventDefault();
        msg.textContent = 'Username dan kata sandi wajib diisi.';
        alertEl.classList.remove('d-none');
        alertEl.classList.add('d-flex');
        return;
      }
      if (username.length < 3) {
        e.preventDefault();
        msg.textContent = 'Username minimal 3 karakter.';
        alertEl.classList.remove('d-none');
        alertEl.classList.add('d-flex');
        return;
      }
      if (pw.length < 6) {
        e.preventDefault();
        msg.textContent = 'Kata sandi minimal 6 karakter.';
        alertEl.classList.remove('d-none');
        alertEl.classList.add('d-flex');
      }
    });
  </script>
</body>
</html>