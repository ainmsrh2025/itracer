<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadangan Kerjaya - Admin</title>

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

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                padding: 10px;
                text-align: center;
            }

            .dashboard {
                flex-direction: column;
            }
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
                <button type="submit">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </nav>
    </header>

    <div class="dashboard">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h2><i class="fas fa-user-shield"></i> {{ auth()->check() ? auth()->user()->name : 'Admin' }}</h2>
            <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Analisis</a>
            <a href="{{ route('admin.career') }}" class="active"><i class="fa-solid fa-briefcase"></i> Cadangan Kerjaya</a>
            <a href="{{ route('admin.questions') }}"><i class="fa-solid fa-circle-question"></i> Soalan Kajian</a>
            <a href="{{ route('admin.records') }}"><i class="fa-solid fa-file-lines"></i> Rekod Kajian</a>
            <a href="{{ route('admin.user') }}"><i class="fa-solid fa-users"></i> Maklumat Pengguna</a>
        </nav>

    <!-- Bahagian Borang Cadangan Kerjaya -->
    <div class="content">
        <h2>Cadangan Kerjaya</h2>
        <div class="card">
            <h4 id="form-title">Masukkan Cadangan Kerjaya</h4>
            <form id="career-form" action="{{ route('admin.career.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="career-id" name="id">
                <div class="mb-3">
                    <label for="course_id" class="form-label">Pilih Kos:</label>
                    <select id="course_id" name="course_id" class="form-control" required>
                        <option value="all">-- Semua Kos --</option>
                        <option value="Perakaunan">Perakaunan</option>
                        <option value="Seni Kulinari">Seni Kulinari</option>
                        <option value="Seni Reka Fesyen">Seni Reka Fesyen</option>
                        <option value="Teknologi Automotif">Teknologi Automotif</option>
                        <option value="Teknologi Penyejukan dan Penyamanan Udara">Teknologi Penyejukan dan Penyamanan Udara</option>
                        <option value="Teknologi Maklumat">Teknologi Maklumat</option>
                        <option value="Teknologi Komputeran">Teknologi Komputeran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="job" class="form-label">Jawatan:</label>
                    <input type="text" id="job" name="job" class="form-control" placeholder="Masukkan jawatan" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nombor Telefon:</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Masukkan nombor telefon" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat:</label>
                    <textarea id="address" name="address" rows="4" class="form-control" placeholder="Masukkan alamat" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (Opsyenal):</label>
                    <input type="file" id="image" name="image" class="form-control">

                    <!-- Paparan gambar preview -->
                    <div class="mt-2">
                        <img id="image-preview" 
                            src="https://via.placeholder.com/150" 
                            width="150" height="150" class="rounded border">
                    </div>
                </div>

                <button type="submit" class="btn-submit">Hantar</button>
            </form>
        </div>


        <!-- Bahagian Senarai Cadangan Kerjaya -->
        <div class="mt-4">
            <h4>Senarai Cadangan Kerjaya</h4>
            <!-- <label for="filter-course" class="form-label">Pilih Kos:</label>
                <select id="filter-course" class="form-control">
                    <option value="all">-- Semua Kos --</option>
                    <option value="Perakaunan">Perakaunan</option>
                    <option value="Seni Kulinari">Seni Kulinari</option>
                    <option value="Seni Reka Fesyen">Seni Reka Fesyen</option>
                    <option value="Teknologi Automotif">Teknologi Automotif</option>
                    <option value="Teknologi Penyejukan dan Penyamanan Udara">Teknologi Penyejukan dan Penyamanan Udara</option>
                    <option value="Teknologi Maklumat">Teknologi Maklumat</option>
                    <option value="Teknologi Komputeran">Teknologi Komputeran</option>
                </select> -->
            
            <div class="list-group">
                @php
                    $careers = $careers ?? [];
                @endphp
                @foreach($careers as $career)
                <div class="list-group-item career-item d-flex justify-content-between align-items-center" 
                    data-course="{{ $career->course_id ?? 'none' }}">
                <!-- <span>{{ $career->course_id ?? 'Tiada Kos' }}</span> -->

                    <div class="d-flex align-items-center">
                        <img src="{{ $career->image ? asset('storage/'.$career->image) : 'https://via.placeholder.com/50' }}" 
                            alt="Job Image" class="rounded me-3" width="50" height="50">
                        <div>
                            <strong>{{ $career->job }}</strong>
                            <p class="mb-1">{{ $career->phone }}</p>
                            <p class="mb-0"><i class="fa-solid fa-location-dot"></i> {{ $career->address }}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.career.edit', $career->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <form action="{{ route('admin.career.destroy', $career->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Adakah anda pasti?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- <footer style="text-align: center; padding: 15px; background-color: #f4d6dc; color: #333; position: fixed; bottom: 0; width: 100%;">
        &copy; {{ date('Y') }} I-TRACER. Hakcipta Terpelihara.
    </footer> -->
</body>
</html>

<script>
    function editCareer(id, job, phone, address, image) {
        document.getElementById('career-id').value = id;
        document.getElementById('job').value = job;
        document.getElementById('phone').value = phone;
        document.getElementById('address').value = address;
        document.getElementById('form-title').innerText = 'Edit Cadangan Kerjaya';

        let form = document.getElementById('career-form');
        let updateUrl = @json(route('admin.career.update', 'ID')).replace('ID', id);
        form.action = updateUrl;

        let existingMethodField = document.querySelector("input[name='_method']");
        if (!existingMethodField) {
            let methodField = document.createElement('input');
            methodField.setAttribute('type', 'hidden');
            methodField.setAttribute('name', '_method');
            methodField.setAttribute('value', 'PUT');
            form.appendChild(methodField);
        } else {
            existingMethodField.value = 'PUT';
        }

        let imagePreview = document.getElementById('image-preview');
        imagePreview.src = image && image !== "null" ? "/storage/" + image : 'https://via.placeholder.com/150';
    }

    document.getElementById('image').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            document.getElementById('image-preview').src = reader.result;
        };
        if (event.target.files.length > 0) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });

    document.getElementById('filter-course').addEventListener('change', function() {
    let selectedCourse = this.value.trim(); // Gunakan nilai sebenar tanpa ubah huruf kecil
    let careerItems = document.querySelectorAll('.career-item');

    careerItems.forEach(item => {
        let course = (item.getAttribute('data-course') || 'none').trim(); // Ambil data-course

        if (selectedCourse === 'all' || course === selectedCourse) {
            item.style.display = 'flex'; // Tunjuk item jika padan
        } else {
            item.style.display = 'none'; // Sembunyikan item jika tidak padan
        }
    });
});

    document.getElementById('career-form').addEventListener('submit', function () {
        if (!document.getElementById('career-id').value) { 
            alert('Cadangan kerjaya telah dihantar!');
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
    const filterDropdown = document.getElementById("filter-course");
    const careerItems = document.querySelectorAll(".career-item");

    filterDropdown.addEventListener("change", function() {
        const selectedCourse = this.value.toLowerCase(); // Pilihan pengguna

        careerItems.forEach(item => {
            const itemCourse = item.getAttribute("data-course").toLowerCase(); 

            if (selectedCourse === "all" || itemCourse === selectedCourse) {
                item.style.display = "block"; // Tunjuk
            } else {
                item.style.display = "none"; // Sembunyikan
            }
        });
    });
});
</script>


