<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemaskini Cadangan Kerjaya - Admin</title>

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
        <h2 class="text-center">Kemaskini Cadangan Kerjaya</h2>

        <div class="card">
            <!-- Butang Kembali di bahagian atas kanan -->
            <a href="{{ route('admin.career') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a><br>

            <form action="{{ route('admin.career.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="course_id" class="form-label">Pilih Kos:</label>
                    <select id="course_id" name="course_id" class="form-control" required>
                        <option value="all" {{ $career->course_id == 'all' ? 'selected' : '' }}>-- Semua Kos --</option>
                        <option value="Perakaunan" {{ $career->course_id == 'Perakaunan' ? 'selected' : '' }}>Perakaunan</option>
                        <option value="Seni Kulinari" {{ $career->course_id == 'Seni Kulinari' ? 'selected' : '' }}>Seni Kulinari</option>
                        <option value="Seni Reka Fesyen" {{ $career->course_id == 'Seni Reka Fesyen' ? 'selected' : '' }}>Seni Reka Fesyen</option>
                        <option value="Teknologi Automotif" {{ $career->course_id == 'Teknologi Automotif' ? 'selected' : '' }}>Teknologi Automotif</option>
                        <option value="Teknologi Penyejukan dan Penyamanan Udara" {{ $career->course_id == 'Teknologi Penyejukan dan Penyamanan Udara' ? 'selected' : '' }}>Teknologi Penyejukan dan Penyamanan Udara</option>
                        <option value="Teknologi Maklumat" {{ $career->course_id == 'Teknologi Maklumat' ? 'selected' : '' }}>Teknologi Maklumat</option>
                        <option value="Teknologi Komputeran" {{ $career->course_id == 'Teknologi Komputeran' ? 'selected' : '' }}>Teknologi Komputeran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="job" class="form-label">Jawatan:</label>
                    <input type="text" id="job" name="job" class="form-control" value="{{ $career->job }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nombor Telefon:</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $career->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat:</label>
                    <textarea id="address" name="address" rows="4" class="form-control" required>{{ $career->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (Opsyenal):</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <div class="mt-2">
                        <img id="image-preview" src="{{ $career->image ? asset('storage/'.$career->image) : 'https://via.placeholder.com/150' }}" width="150" height="150" class="rounded">
                    </div>
                </div>
                <button type="submit" class="btn-submit">Kemaskini</button>
            </form>
        </div>
    </div><br>

    <script>
        // Preview gambar yang dipilih sebelum upload
        document.getElementById('image').addEventListener('change', function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                document.getElementById('image-preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</body>
</html>
