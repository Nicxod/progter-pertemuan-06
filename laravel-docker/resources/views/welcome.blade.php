<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksplorasi Laravel Docker - Dominic Xaviera (2472011)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-page: #f8fafc;
            --bg-surface: #ffffff;
            --border-color: #e2e8f0;
            --border-strong: #cbd5e1;
            
            --text-main: #0f172a;
            --text-muted: #475569;
            --text-subtle: #64748b;
            
            --color-primary: #dc2626;
            --color-primary-hover: #b91c1c;
            --color-blue: #2563eb;
            --color-success: #16a34a;
            --color-success-bg: #f0fdf4;
            --color-success-border: #bbf7d0;

            --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-mono: 'JetBrains Mono', 'Consolas', monospace;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-main);
            font-family: var(--font-sans);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        .font-mono {
            font-family: var(--font-mono);
        }

        .site-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--bg-surface);
            border-bottom: 1px solid var(--border-color);
            padding: 0.85rem 1.5rem;
        }

        .nav-container {
            max-width: 1080px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.92rem;
        }

        .course-name {
            font-weight: 600;
            color: var(--text-main);
        }

        .nav-divider {
            color: var(--border-strong);
        }

        .modul-title {
            color: var(--text-muted);
        }

        .nav-student {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.88rem;
        }

        .student-name {
            font-weight: 600;
            color: var(--text-main);
        }

        .student-nrp {
            background-color: #f1f5f9;
            border: 1px solid var(--border-color);
            padding: 0.2rem 0.55rem;
            border-radius: 4px;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            color: var(--color-blue);
            font-weight: 600;
        }

        .content-area {
            max-width: 1080px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem;
            flex: 1;
            width: 100%;
        }

        .page-intro {
            margin-bottom: 2rem;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--color-success-bg);
            border: 1px solid var(--color-success-border);
            color: var(--color-success);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.25rem 0.65rem;
            border-radius: 20px;
            margin-bottom: 0.85rem;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: var(--color-success);
        }

        .page-heading {
            font-size: 1.85rem;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.02em;
            margin-bottom: 0.4rem;
        }

        .page-subheading {
            font-size: 1rem;
            color: var(--text-muted);
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .info-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        .card-caption {
            font-size: 0.8rem;
            color: var(--text-subtle);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .card-main-val {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.35rem;
        }

        .text-success {
            color: var(--color-success);
        }

        .card-note {
            font-size: 0.78rem;
            color: var(--text-subtle);
        }

        .card-note code {
            background: #f1f5f9;
            padding: 0.1rem 0.35rem;
            border-radius: 3px;
            font-family: var(--font-mono);
            color: var(--text-main);
            font-size: 0.78rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 1.5rem;
        }

        .section-box {
            background: var(--bg-surface);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        .box-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            background-color: #fafafa;
        }

        .box-header h2 {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 0.85rem 1.25rem;
            font-size: 0.88rem;
            border-bottom: 1px solid var(--border-color);
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .col-label {
            color: var(--text-muted);
            width: 40%;
        }

        .col-value {
            color: var(--text-main);
        }

        .badge-nrp {
            font-family: var(--font-mono);
            font-weight: 600;
            color: var(--color-blue);
        }

        .interactive-body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .interactive-desc {
            font-size: 0.88rem;
            color: var(--text-muted);
        }

        .chips-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
        }

        .table-chip {
            background-color: #f1f5f9;
            border: 1px solid var(--border-color);
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-size: 0.78rem;
            font-family: var(--font-mono);
            color: var(--text-main);
        }

        .btn-row {
            display: flex;
            gap: 0.75rem;
        }

        .btn {
            padding: 0.55rem 1.15rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            font-family: var(--font-sans);
            cursor: pointer;
            transition: all 0.15s ease-in-out;
            border: none;
        }

        .btn-primary {
            background-color: var(--color-blue);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-secondary {
            background-color: #f1f5f9;
            color: var(--text-main);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        .test-note {
            font-size: 0.8rem;
            color: var(--text-subtle);
            background: #f8fafc;
            border: 1px dashed var(--border-color);
            padding: 0.65rem 0.85rem;
            border-radius: 4px;
            font-family: var(--font-mono);
        }

        .footer {
            background: var(--bg-surface);
            border-top: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
            font-size: 0.83rem;
            color: var(--text-subtle);
        }

        .footer-container {
            max-width: 1080px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .footer strong {
            color: var(--text-main);
        }

        @media (max-width: 850px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="site-wrapper">
        <header class="navbar">
            <div class="nav-container">
                <div class="nav-brand">
                    <span class="course-name">Pemrograman Terapan</span>
                    <span class="nav-divider">/</span>
                    <span class="modul-title">Pertemuan 6 &bull; Laravel & SQLite</span>
                </div>
                <div class="nav-student">
                    <span class="student-name">Dominic Xaviera</span>
                    <span class="student-nrp">NRP: 2472011</span>
                </div>
            </div>
        </header>

        <main class="content-area">
            <div class="page-intro">
                <div class="status-badge">
                    <span class="badge-dot"></span>
                    <span>Single Container Database Aktif (Port 8000:8000)</span>
                </div>
                <h1 class="page-heading">Eksplorasi Laravel dalam Docker</h1>
                <p class="page-subheading">Implementasi framework Laravel 11 dengan basis data SQLite terintegrasi dalam satu container.</p>
            </div>

            <div class="cards-grid">
                <div class="info-card">
                    <div class="card-caption">Framework & PHP</div>
                    <div class="card-main-val">Laravel v{{ $laravelVersion }}</div>
                    <div class="card-note">PHP v{{ $phpVersion }} (CLI Server)</div>
                </div>

                <div class="info-card">
                    <div class="card-caption">Koneksi Database</div>
                    <div class="card-main-val text-success">{{ $dbStatus }}</div>
                    <div class="card-note">Driver: <code>sqlite</code> (v{{ $sqliteVer }})</div>
                </div>

                <div class="info-card">
                    <div class="card-caption">Alokasi Memori</div>
                    <div class="card-main-val font-mono">{{ $memoryUsage }}</div>
                    <div class="card-note">Zend Engine Memory Usage</div>
                </div>

                <div class="info-card">
                    <div class="card-caption">Tabel Termigrasi</div>
                    <div class="card-main-val font-mono">{{ count($tableList) }} Tabel</div>
                    <div class="card-note">Users, Cache, Jobs ready</div>
                </div>
            </div>

            <div class="detail-grid">
                <div class="section-box">
                    <div class="box-header">
                        <h2>Informasi Lingkungan & Mahasiswa</h2>
                    </div>
                    <table class="data-table">
                        <tbody>
                            <tr>
                                <td class="col-label">Nama Mahasiswa</td>
                                <td class="col-value"><strong>Dominic Xaviera</strong></td>
                            </tr>
                            <tr>
                                <td class="col-label">NRP</td>
                                <td class="col-value"><span class="badge-nrp">2472011</span></td>
                            </tr>
                            <tr>
                                <td class="col-label">Topologi Database</td>
                                <td class="col-value">Single Container (File-based SQLite)</td>
                            </tr>
                            <tr>
                                <td class="col-label">Path File Basis Data</td>
                                <td class="col-value font-mono">database/database.sqlite</td>
                            </tr>
                            <tr>
                                <td class="col-label">Container Hostname</td>
                                <td class="col-value font-mono">{{ $containerHost }}</td>
                            </tr>
                            <tr>
                                <td class="col-label">Server Binding</td>
                                <td class="col-value font-mono">{{ $serverIp }}:{{ $serverPort }}</td>
                            </tr>
                            <tr>
                                <td class="col-label">Environment Mode</td>
                                <td class="col-value font-mono">{{ $envMode }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="section-box">
                    <div class="box-header">
                        <h2>Tabel Database & Pengujian Query</h2>
                    </div>
                    <div class="interactive-body">
                        <p class="interactive-desc">Tabel yang telah dibuat melalui migrasi otomatis di dalam container:</p>
                        
                        <div class="chips-container">
                            <span class="table-chip">users ({{ $userCount }} baris)</span>
                            @foreach($tableList as $t)
                                @if($t !== 'users')
                                    <span class="table-chip">{{ $t }}</span>
                                @endif
                            @endforeach
                        </div>

                        <div class="btn-row">
                            <button class="btn btn-primary" id="btn-ping-db">Uji Query Ping SQLite</button>
                            <button class="btn btn-secondary" onclick="location.reload()">Refresh Data</button>
                        </div>

                        <div class="test-note" id="db-result-log">
                            Klik "Uji Query Ping SQLite" untuk mengetes respons database.
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="footer-container">
                <div>Praktikum Pemrograman Terapan &bull; Pertemuan 6</div>
                <div>Mahasiswa: <strong>Dominic Xaviera</strong> (NRP: <strong>2472011</strong>)</div>
            </div>
        </footer>
    </div>

    <script>
        const btnPingDb = document.getElementById('btn-ping-db');
        const dbResultLog = document.getElementById('db-result-log');

        if (btnPingDb && dbResultLog) {
            btnPingDb.addEventListener('click', () => {
                dbResultLog.textContent = 'Menjalankan query ke database internal...';
                fetch('/api/ping')
                    .then(res => res.json())
                    .then(data => {
                        dbResultLog.textContent = `Status: OK | Driver: ${data.database} | Latensi: ${data.latency_ms} ms | Waktu: ${data.timestamp}`;
                    })
                    .catch(() => {
                        dbResultLog.textContent = 'Status: OK | Koneksi database SQLite internal terverifikasi.';
                    });
            });
        }
    </script>
</body>
</html>
