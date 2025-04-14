<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemaskini Pengguna - Admin</title>

    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #faf3f3;
        }

        .container {
            margin-top: 50px;
            max-width: 650px; /* Hadkan lebar container */
            margin: 0 auto; /* Pusatkan container */
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            max-width: 600px; /* Hadkan lebar form */
            margin: 0 auto; /* Pusatkan form */
        }

        .btn-submit {
            background-color: #c86b85;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #a6536d;
        }

        .btn-back {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s ease;
        }

        .btn-back:hover {
            background-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <h2 class="text-center">Kemaskini Pengguna</h2>

        <div class="card">
            <!-- Butang Kembali di bahagian atas kanan -->
            <a href="{{ route('admin.list_user') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a><br>

            <form action="{{ route('admin.update_user', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="kos" class="form-label">Kos:</label>
                    <select name="kos" id="kos" class="form-control" required>
                        <option value="Perakaunan" {{ $user->kos == 'Perakaunan' ? 'selected' : '' }}>Perakaunan</option>
                        <option value="Seni Kulinari" {{ $user->kos == 'Seni Kulinari' ? 'selected' : '' }}>Seni Kulinari</option>
                        <option value="Seni Reka Fesyen" {{ $user->kos == 'Seni Reka Fesyen' ? 'selected' : '' }}>Seni Reka Fesyen</option>
                        <option value="Teknologi Automotif" {{ $user->kos == 'Teknologi Automotif' ? 'selected' : '' }}>Teknologi Automotif</option>
                        <option value="Teknologi Penyejukan dan Penyamanan Udara" {{ $user->kos == 'Teknologi Penyejukan dan Penyamanan Udara' ? 'selected' : '' }}>Teknologi Penyejukan dan Penyamanan Udara</option>
                        <option value="Teknologi Maklumat" {{ $user->kos == 'Teknologi Maklumat' ? 'selected' : '' }}>Teknologi Maklumat</option>
                        <option value="Teknologi Komputeran" {{ $user->kos == 'Teknologi Komputeran' ? 'selected' : '' }}>Teknologi Komputeran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <small>Biarkan kosong jika tidak mahu menukar kata laluan</small>
                </div>
                <button type="submit" class="btn-submit">Kemaskini</button>
            </form>

        </div>
    </div><br>

</body>
</html>
