<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Alumni - Admin</title>
    
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

        /* Header */
        .header-container {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-container h1 {
            color: var(--primary-color);
            margin: 0;
            display: flex;
            align-items: center;
        }

        .header-container h1 i {
            margin-right: 8px;
        }

        .button-group {
            display: flex;
            align-items: center; /* Pastikan butang sejajar */
            gap: 5px; /* Jarak antara butang */
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .btn-back i {
            margin-right: 6px;
        }

        .btn-back:hover {
            background-color:rgb(208, 210, 212);
            color: white;
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
        <div class="header-container">
            <h1><i class="fa-solid fa-shield-halved"></i> I-TRACER</h1>
            <div class="button-group">
                <a href="{{ route('admin.user') }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="content mt-4">
            <h2 class="mb-3">Senarai Alumni</h2>
                <!-- <div class="mb-3">
                    <label for="filterKos" class="form-label">Pilih Kos:</label>
                    <select id="filterKos" class="form-control">
                        <option value="all">-- Semua Kos --</option>
                        <option value="Perakaunan">Perakaunan</option>
                        <option value="Seni Kulinari">Seni Kulinari</option>
                        <option value="Seni Reka Fesyen">Seni Reka Fesyen</option>
                        <option value="Teknologi Automotif">Teknologi Automotif</option>
                        <option value="Teknologi Penyejukan dan Penyamanan Udara">Teknologi Penyejukan dan Penyamanan Udara</option>
                        <option value="Teknologi Maklumat">Teknologi Maklumat</option>
                        <option value="Teknologi Komputeran">Teknologi Komputeran</option>
                    </select>
                    <br> -->
            @foreach(['Perakaunan', 'Seni Kulinari', 'Seni Reka Fesyen', 'Teknologi Automotif', 'Teknologi Penyejukan dan Penyamanan Udara', 'Teknologi Maklumat', 'Teknologi Komputeran'] as $kos)
                <div class="card mb-4">
                    @php
                        $warna = match ($kos) {
                            'Perakaunan' => '#6610f2', // Biru 
                            'Seni Kulinari' => '#28a745', // Merah
                            'Seni Reka Fesyen' => '#e83e8c', // Pink
                            'Teknologi Automotif' => '#6c757d', // Hijau
                            'Teknologi Penyejukan dan Penyamanan Udara' => '#17a2b8', // Biru Cyan
                            'Teknologi Maklumat' => '#fd7e14', // Ungu 
                            'Teknologi Komputeran' => '#dc3545', // Oren 
                            default => '#007bff', // Kelabu (Default)
                        };
                    @endphp

                    <div class="card-header text-white" style="background-color: {{ $warna }}; padding: 10px;">
                        <h5 class="mb-0">{{ $kos }}</h5>
                    </div>

                    <div class="card-body">
                        @php
                            $alumnis = \App\Models\Alumni::where('kos', $kos)->get();
                        @endphp
                        @if($alumnis->isEmpty())
                            <p class="text-muted">Tiada alumni dalam kategori ini.</p>
                        @else
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alumnis as $alumni)
                                        <tr>
                                            <td>{{ $alumni->name }}</td>
                                            <td>{{ $alumni->username }}</td>
                                            <td>{{ $alumni->password }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit_user', $alumni->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                                <form action="{{ route('admin.destroy_user', $alumni->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda pasti mahu memadam alumni ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> 
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endforeach
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
