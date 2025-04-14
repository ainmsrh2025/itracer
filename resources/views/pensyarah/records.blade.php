<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekod Kajian - Pensyarah</title>
    
    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #c86b85;
            --secondary-color: #f4d6dc;
            --background-color: #faf3f3;
            --hover-color: #a6536d;
            --text-dark: #333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            margin: 0;
        }

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

        .custom-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px; /* Kurangkan padding */
            font-size: 14px; /* Kecilkan teks */
            font-weight: bold;
            color: black;
            background: white;
            border: 1px solid black;
            border-radius: 6px; /* Sedikit lebih kecil */
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .custom-btn i {
            font-size: 14px; /* Kecilkan ikon */
        }

        .custom-btn:hover {
            background: black;
            color: white;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Container utama */
        .dashboard-container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        /* Tajuk */
        .dashboard-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar {
            position: fixed;
            height: 150vh;
            width: 250px;
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            padding: 20px;
            color: white;
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

        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: var(--secondary-color);
            color: var(--text-dark);
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1><i class="fa-solid fa-shield-halved"></i> iTRACER</h1>
        <nav>
            <form action="{{ route('pensyarah.logout') }}" method="POST">
                @csrf
                <button class="custom-btn">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </nav>
    </header>

    <div class="d-flex">
        <nav class="sidebar">
            <h2><i class="fa-solid fa-chalkboard-teacher"></i> {{ auth('pensyarah')->user()->name ?? 'Pengguna' }}</h2>
            <a href="{{ route('pensyarah.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Analisis</a>
            <a href="{{ route('pensyarah.records') }}" class="active"><i class="fa-solid fa-file-lines"></i> Rekod Kajian</a>
        </nav>

        
        <div class="content">
            <h2 class="mb-3">Rekod Kajian</h2>
            <div class="table-container">
                <label for="yearFilter">Pilih Tahun:</label>
                    <select id="yearFilter" class="form-select mb-3">
                        <option value="">Semua Tahun</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                    </select>

                    <script>
                        document.getElementById('yearFilter').addEventListener('change', function () {
                            let selectedYear = this.value;
                            let url = new URL(window.location.href);
                            if (selectedYear) {
                                url.searchParams.set('year', selectedYear);
                            } else {
                                url.searchParams.delete('year');
                            }
                            window.location.href = url.toString();
                        });
                    </script>


                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    @if ($records->isEmpty())
                        <div class="alert alert-warning">
                            Tiada rekod dijumpai untuk tahun {{ $selectedYear }}.
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Soalan</th>
                                <th>Ya</th>
                                <th>Tidak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ $record->id }}</td>
                                    <td>{{ optional($record->question)->question_text ?? 'Tiada data' }}</td>
                                    <td>{{ $record->ya_count }}</td>
                                    <td>{{ $record->tidak_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- <footer>
        &copy; {{ date('Y') }} I-TRACER. Hakcipta Terpelihara.
    </footer> -->
</body>
</html>
