<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - Alumni</title>
    
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
            font-size: 14px;
        }

        nav form button:hover {
            background: #212529;
            color: white;
        }

        /* Dashboard Layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            padding: 20px;
            color: white;
            width: 250px;
            text-align: center;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            margin-bottom: 10px;
        }

        .sidebar h2 {
            margin-bottom: 10px;
        }

        .sidebar p {
            margin: 5px 0;
            font-size: 14px;
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

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 3px solid white; /* Tambah border */
        }

        /* Content */
        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background-color: var(--hover-color);
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
            <form action="{{ route('alumni.logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </nav>
    </header>

    <div class="dashboard">
        <nav class="sidebar">
        <img src="{{ asset('storage/' . $alumni->profile_picture) }}" alt="Profile Picture" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
            <h2>{{ $alumni->name }}</h2>
            <a href="{{ route('alumni.dashboard') }}" class="active"><i class="fa-solid fa-user"></i> Profil</a>
            <a href="{{ route('alumni.survey') }}"><i class="fa-solid fa-file-lines"></i> Soalan Kajian</a>
        </nav>

        <div class="content">
            <h2>Hi, Selamat Datang {{ $alumni->name }}!</h2>
            
            <div class="card">
                <form action="{{ route('alumni.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3>Kemaskini Profil Anda</h3>

                    <div class="mb-3">
                        <label for="profile_picture" class="form-label d-block text-start">Gambar Profil :</label>
                        <div class="d-flex justify-content-center">
                            <img id="previewImage" 
                                src="{{ $alumni->image ? asset('storage/' . $alumni->image) : 'https://via.placeholder.com/120' }}" 
                                alt="" class="border"
                                style="width: 150px; height: 200px; object-fit: cover; border: 2px solid #ccc;">
                        </div><br>
                        <input type="file" id="profile_picture" name="profile_picture" class="form-control mt-2"
                            onchange="previewFile()">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama :</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $alumni->name) }}" 
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Emel :</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $alumni->email) }}" 
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status :</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="Bekerja" {{ old('status', $alumni->status) == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                            <option value="Tidak Bekerja" {{ old('status', $alumni->status) == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                            <option value="Belajar" {{ old('status', $alumni->status) == 'Belajar' ? 'selected' : '' }}>Belajar</option>
                            <option value="Lain-lain" {{ old('status', $alumni->status) == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit">Kemaskini</button>
                </form>
            </div>
        </div>

    </div>

    <footer>
        &copy; {{ date('Y') }} I-TRACER. Hakcipta Terpelihara.
    </footer>
</body>
</html>

<script>
    function previewFile() {
        const preview = document.getElementById('previewImage');
        const file = document.getElementById('profile_picture').files[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>