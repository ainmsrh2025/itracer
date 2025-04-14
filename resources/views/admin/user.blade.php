<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna - Admin</title>
    
    <!-- Bootstrap CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #c86b85;
            --secondary-color: #f4d6dc;
            --background-color: #faf3f3;
            --hover-color: #a6536d;
            --text-dark: #333;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Poppins', sans-serif;
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            color: var(--primary-color);
            margin: 0;
            display: flex;
            align-items: center;
        }

        header h1 i {
            margin-right: 8px;
        }

        nav form button {
            background: white;
            border: 1px solid black;
            color: black;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        nav form button i {
            margin-right: 6px;
        }

        nav form button:hover {
            background: #212529;
            color: white;
        }

        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            padding: 20px;
            color: white;
            width: 250px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar h2 i {
            margin-right: 8px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px;
            margin: 8px 0;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
        }

        /* Content Layout */
        .dashboard {
            display: flex;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .content mt-4 {
            flex-grow: 1;
            padding: 20px;
        }

        .card {
            background-color: white;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: var(--secondary-color);
            color: var(--text-dark);
        }
    </style>
</head>
<body>
    <header>
        <h1><i class="fa-solid fa-shield-halved"></i> iTRACER</h1>
        <nav>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </nav>
    </header>

    <div class="dashboard">
        <nav class="sidebar">
            <h2><i class="fas fa-user-shield"></i> {{ auth()->check() ? auth()->user()->name : 'Admin' }}</h2>
            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-line"></i> Analisis</a>
            <a href="{{ route('admin.career') }}" class="nav-link"><i class="fas fa-briefcase"></i> Cadangan Kerjaya</a>
            <a href="{{ route('admin.questions') }}" class="nav-link"><i class="fas fa-question-circle"></i> Soalan Kajian</a>
            <a href="{{ route('admin.records') }}" class="nav-link"><i class="fas fa-file-alt"></i> Rekod Kajian</a>
            <a href="{{ route('admin.user') }}" class="nav-link active"><i class="fas fa-users"></i> Maklumat Pengguna</a>
        </nav>

        <!-- Content -->
        <div class="content">
            <h2 class="mb-3">Tambah Pengguna</h2>
            
            <a href="{{ route('admin.list_user') }}" class="btn btn-secondary">
                <i class="fas fa-list"></i> Lihat Senarai Alumni
            </a><br><br>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <form action="{{ route('admin.store_user') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kos" class="form-label">Kos:</label>
                        <select name="kos" class="form-control" required>
                            <option value="">-- Pilih Kos --</option>
                            <option value="Perakaunan" {{ old('kos') == 'Perakaunan' ? 'selected' : '' }}>Perakaunan</option>
                            <option value="Seni Kulinari" {{ old('kos') == 'Seni Kulinari' ? 'selected' : '' }}>Seni Kulinari</option>
                            <option value="Seni Reka Fesyen" {{ old('kos') == 'Seni Reka Fesyen' ? 'selected' : '' }}>Seni Reka Fesyen</option>
                            <option value="Teknologi Automotif" {{ old('kos') == 'Teknologi Automotif' ? 'selected' : '' }}>Teknologi Automotif</option>
                            <option value="Teknologi Penyejukan dan Penyamanan Udara" {{ old('kos') == 'Teknologi Penyejukan dan Penyamanan Udara' ? 'selected' : '' }}>Teknologi Penyejukan dan Penyamanan Udara</option>
                            <option value="Teknologi Maklumat" {{ old('kos') == 'Teknologi Maklumat' ? 'selected' : '' }}>Teknologi Maklumat</option>
                            <option value="Teknologi Komputeran" {{ old('kos') == 'Teknologi Komputeran' ? 'selected' : '' }}>Teknologi Komputeran</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>

        </div>
    </div>


    <footer>
        &copy; {{ date('Y') }} I-TRACER. Hakcipta Terpelihara.
    </footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#filterKos").change(function () {
            var selectedKos = $(this).val();
            
            if (selectedKos === "all") {
                $(".kos-section").show(); // Paparkan semua
            } else {
                $(".kos-section").hide(); // Sembunyikan semua dulu
                $(".kos-section[data-kos='" + selectedKos + "']").show(); // Paparkan yang dipilih
            }
        });
    });
</script>

</body>
</html>
