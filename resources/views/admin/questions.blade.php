<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soalan Kajian - Admin</title>

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
            width: 412px;
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
        <!-- Sidebar -->
        <nav class="sidebar">
            <h2><i class="fas fa-user-shield"></i> {{ auth()->check() ? auth()->user()->name : 'Admin' }}</h2>
            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-line"></i> Analisis</a>
            <a href="{{ route('admin.career') }}" class="nav-link"><i class="fas fa-briefcase"></i> Cadangan Kerjaya</a>
            <a href="{{ route('admin.questions') }}" class="nav-link active"><i class="fas fa-question-circle"></i> Soalan Kajian</a>
            <a href="{{ route('admin.records') }}" class="nav-link"><i class="fas fa-file-alt"></i> Rekod Kajian</a>
            <a href="{{ route('admin.user') }}" class="nav-link"><i class="fas fa-users"></i> Maklumat Pengguna</a>
        </nav>

        <!-- Content -->
        <div class="content">
            <h2 class="mb-3">Soalan Kajian</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Form Tambah Soalan -->
            <div class="card">
                <h4 class="mb-3">Tambah Soalan</h4>
                <form action="{{ route('admin.questions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="question_text" class="form-label">Soalan:</label>
                        <input type="text" name="question_text" id="question_text" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun:</label>
                        <input type="number" name="year" id="year" class="form-control" min="2000" max="{{ date('Y') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Soalan</button>
                </form>
            </div>

            <!-- Senarai Soalan -->
            <div class="card mt-4">
                <h4 class="mb-3">Senarai Soalan</h4>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Soalan</th>
                            <th>Tahun</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->question_text }}</td>
                            <td>{{ $question->year }}</td>
                            <td>
                                    <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                <form action="{{ route('admin.questions.delete', $question->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal Kemas Kini -->
    <div class="modal fade" id="updateQuestionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kemas Kini Soalan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="updateQuestionForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" id="edit_question_text" class="form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} I-TRACER. Hakcipta Terpelihara.
    </footer>

</body>
</html>


<script>
    function editQuestion(id, text, year) {
        document.getElementById('edit_question_text').value = text;
        document.getElementById('edit_year').value = year;
        document.getElementById('updateQuestionForm').action = '/admin/questions/update/' + id;
        var updateModal = new bootstrap.Modal(document.getElementById('updateQuestionModal'));
        updateModal.show();
    }
</script>
