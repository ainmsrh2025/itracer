<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemaskini Soalan Kajian - Admin</title>

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
            max-width: 650px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            max-width: 600px;
            margin: 0 auto;
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
        <br><br>
        <h2 class="text-center">Kemaskini Soalan</h2>
        <br>
        <div class="card">
             <!-- Butang Kembali -->
            <a href="{{ route('admin.questions') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a><br>

            <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="question_text" class="form-label">Soalan:</label>
                    <textarea id="question_text" name="question_text" rows="3" class="form-control" required>{{ $question->question_text }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Tahun:</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ $question->year }}" min="2000" max="{{ date('Y') }}" required>
                </div>
                <button type="submit" class="btn-submit">Kemaskini</button>
            </form>
        </div>
    </div><br>
</body>
</html>
