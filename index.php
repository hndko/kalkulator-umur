<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kalkulator Umur | Hitung Usia Kamu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --glass-bg: rgba(255, 255, 255, 0.15);
      --glass-border: rgba(255, 255, 255, 0.3);
      --text-primary: #ffffff;
      --text-secondary: rgba(255, 255, 255, 0.85);
      --card-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
      --transition: all 0.3s ease;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background: var(--primary-gradient);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
      position: relative;
      overflow-x: hidden;
    }

    /* Animated Background Circles */
    body::before,
    body::after {
      content: '';
      position: fixed;
      border-radius: 50%;
      filter: blur(80px);
      z-index: 0;
      animation: float 8s ease-in-out infinite;
    }

    body::before {
      width: 400px;
      height: 400px;
      background: rgba(240, 147, 251, 0.4);
      top: -100px;
      right: -100px;
    }

    body::after {
      width: 300px;
      height: 300px;
      background: rgba(102, 126, 234, 0.4);
      bottom: -50px;
      left: -50px;
      animation-delay: 2s;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0) scale(1);
      }

      50% {
        transform: translateY(-30px) scale(1.05);
      }
    }

    .container {
      width: 100%;
      max-width: 1000px;
      position: relative;
      z-index: 1;
    }

    /* Main Header */
    .main-header {
      text-align: center;
      margin-bottom: 30px;
      animation: slideDown 0.6s ease-out;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .main-header .header-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #f5af19 0%, #f12711 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      box-shadow: 0 10px 30px rgba(245, 87, 108, 0.4);
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.05);
      }
    }

    .main-header .header-icon i {
      font-size: 36px;
      color: white;
    }

    .main-header h1 {
      color: var(--text-primary);
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .main-header p {
      color: var(--text-secondary);
      font-size: 1rem;
      font-weight: 300;
    }

    /* Two Column Grid Layout */
    .grid-layout {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px;
      animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Glass Card */
    .glass-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-radius: 24px;
      border: 1px solid var(--glass-border);
      box-shadow: var(--card-shadow);
      padding: 35px;
      height: 100%;
    }

    .card-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-header .icon-box {
      width: 45px;
      height: 45px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      color: white;
    }

    .card-header .icon-box.form-icon {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .card-header .icon-box.result-icon {
      background: linear-gradient(135deg, #f5af19 0%, #f12711 100%);
    }

    .card-header h2 {
      color: var(--text-primary);
      font-size: 1.2rem;
      font-weight: 600;
      margin: 0;
    }

    /* Form Styles */
    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: flex;
      align-items: center;
      gap: 10px;
      color: var(--text-primary);
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 10px;
    }

    .form-label i {
      width: 20px;
      text-align: center;
      color: #f5af19;
    }

    .form-input {
      width: 100%;
      padding: 16px 20px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      color: var(--text-primary);
      font-family: 'Poppins', sans-serif;
      font-size: 1rem;
      transition: var(--transition);
      outline: none;
    }

    .form-input:focus {
      background: rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 255, 255, 0.5);
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
    }

    .form-input::-webkit-calendar-picker-indicator {
      filter: invert(1);
      cursor: pointer;
    }

    /* Submit Button */
    .btn-submit {
      width: 100%;
      padding: 16px 30px;
      background: linear-gradient(135deg, #f5af19 0%, #f12711 100%);
      border: none;
      border-radius: 12px;
      color: white;
      font-family: 'Poppins', sans-serif;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: var(--transition);
      box-shadow: 0 8px 25px rgba(241, 39, 17, 0.35);
      margin-top: 10px;
    }

    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(241, 39, 17, 0.45);
    }

    .btn-submit:active {
      transform: translateY(0);
    }

    /* Results Section */
    .results-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .result-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 20px 15px;
      text-align: center;
      transition: var(--transition);
      border: 1px solid transparent;
    }

    .result-card:hover {
      background: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.3);
      transform: translateY(-5px);
    }

    .result-card:last-child {
      grid-column: span 2;
    }

    .result-card .icon {
      width: 50px;
      height: 50px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 12px;
      font-size: 1.3rem;
    }

    .result-card.years .icon {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
    }

    .result-card.months .icon {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      color: white;
    }

    .result-card.days .icon {
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      color: white;
    }

    .result-card.hours .icon {
      background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
      color: white;
    }

    .result-card.minutes .icon {
      background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
      color: white;
    }

    .result-card .value {
      color: var(--text-primary);
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .result-card .label {
      color: var(--text-secondary);
      font-size: 0.85rem;
      font-weight: 400;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* Empty State */
    .empty-state {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      min-height: 280px;
      text-align: center;
      color: var(--text-secondary);
    }

    .empty-state i {
      font-size: 4rem;
      margin-bottom: 20px;
      opacity: 0.5;
    }

    .empty-state p {
      font-size: 1rem;
      max-width: 200px;
      line-height: 1.6;
    }

    /* Footer */
    .footer {
      text-align: center;
      margin-top: 30px;
      color: var(--text-secondary);
      font-size: 0.85rem;
      font-weight: 300;
    }

    .footer i.fa-heart {
      color: #f5576c;
      animation: heartbeat 1.5s ease-in-out infinite;
    }

    @keyframes heartbeat {

      0%,
      100% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.2);
      }
    }

    .footer a {
      color: var(--text-primary);
      text-decoration: none;
      font-weight: 500;
      transition: var(--transition);
    }

    .footer a:hover {
      color: #f5af19;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .grid-layout {
        grid-template-columns: 1fr;
      }

      .main-header h1 {
        font-size: 1.6rem;
      }

      .glass-card {
        padding: 25px;
      }

      .empty-state {
        min-height: 200px;
      }

      .empty-state i {
        font-size: 3rem;
      }
    }

    @media (max-width: 480px) {
      .results-grid {
        grid-template-columns: 1fr 1fr;
      }

      .result-card .value {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Main Header -->
    <div class="main-header">
      <div class="header-icon">
        <i class="fas fa-birthday-cake"></i>
      </div>
      <h1>Kalkulator Umur</h1>
      <p>Hitung usia kamu dengan tepat hingga menit!</p>
    </div>

    <!-- Two Column Grid -->
    <div class="grid-layout">
      <!-- Left Column: Form -->
      <div class="glass-card">
        <div class="card-header">
          <div class="icon-box form-icon">
            <i class="fas fa-edit"></i>
          </div>
          <h2>Masukkan Data</h2>
        </div>

        <form action="" method="POST">
          <div class="form-group">
            <label class="form-label" for="tanggal_lahir">
              <i class="fas fa-baby"></i>
              Tanggal Lahir
            </label>
            <input type="datetime-local" name="tanggal_lahir" id="tanggal_lahir" class="form-input" required />
          </div>

          <div class="form-group">
            <label class="form-label" for="tanggal_today">
              <i class="fas fa-calendar-day"></i>
              Tanggal Referensi
            </label>
            <input type="datetime-local" name="tanggal_today" id="tanggal_today" class="form-input" required />
          </div>

          <button type="submit" name="submit" class="btn-submit">
            <i class="fas fa-calculator"></i>
            Hitung Usia Saya
          </button>
        </form>
      </div>

      <!-- Right Column: Results -->
      <div class="glass-card">
        <div class="card-header">
          <div class="icon-box result-icon">
            <i class="fas fa-chart-pie"></i>
          </div>
          <h2>Hasil Perhitungan</h2>
        </div>

        <?php
        if (isset($_POST['submit'])) {
          $lahir = new DateTime($_POST['tanggal_lahir']);
          $today = new DateTime($_POST['tanggal_today']);
          $res = date_diff($lahir, $today);
        ?>
          <div class="results-grid">
            <div class="result-card years">
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <div class="value"><?= $res->y ?></div>
              <div class="label">Tahun</div>
            </div>

            <div class="result-card months">
              <div class="icon">
                <i class="fas fa-calendar-week"></i>
              </div>
              <div class="value"><?= $res->m ?></div>
              <div class="label">Bulan</div>
            </div>

            <div class="result-card days">
              <div class="icon">
                <i class="fas fa-calendar-day"></i>
              </div>
              <div class="value"><?= $res->d ?></div>
              <div class="label">Hari</div>
            </div>

            <div class="result-card hours">
              <div class="icon">
                <i class="fas fa-clock"></i>
              </div>
              <div class="value"><?= $res->h ?></div>
              <div class="label">Jam</div>
            </div>

            <div class="result-card minutes">
              <div class="icon">
                <i class="fas fa-hourglass-half"></i>
              </div>
              <div class="value"><?= $res->i ?></div>
              <div class="label">Menit</div>
            </div>
          </div>
        <?php } else { ?>
          <!-- Empty State -->
          <div class="empty-state">
            <i class="fas fa-hourglass-start"></i>
            <p>Masukkan tanggal lahir untuk melihat usia kamu</p>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      Made with <i class="fas fa-heart"></i> by <a href="#">Handoko x Mari Partner</a> &copy; <?= date("Y") ?>
    </footer>
  </div>

  <script>
    // Set default date to today
    document.addEventListener('DOMContentLoaded', function() {
      const now = new Date();
      const offset = now.getTimezoneOffset() * 60000;
      const localISOTime = new Date(now - offset).toISOString().slice(0, 16);
      document.getElementById('tanggal_today').value = localISOTime;
    });
  </script>
</body>

</html>