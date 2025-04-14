<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soalan Kajian - Alumni</title>
    
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

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            height: 150vh;
            width: 250px;
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            padding: 20px;
            color: white;
            width: 250px;
            text-align: center;
        }

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            margin-bottom: 10px;
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

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table td:nth-child(2) {
            text-align: left !important;
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
            <img src="{{ asset('storage/' . $alumni->profile_picture) }}" alt="Profile Picture">
            <h2>{{ $alumni->name }}</h2>   
            
            <a href="{{ route('alumni.dashboard') }}"><i class="fa-solid fa-user"></i> Profil</a>
            <a href="{{ route('alumni.survey') }}" class="active"><i class="fa-solid fa-file-lines"></i> Soalan Kajian</a>
        </nav>

        <div class="content">
    <h2>Soalan Kajian</h2>
    <div class="card">
        <form action="{{ route('alumni.survey.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="year" class="form-label">Tahun :</label>
                <select id="year" name="year" class="form-select" onchange="filterQuestions()">
                    <option value="">Pilih Tahun</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </div>

            <!-- Jadual ini akan disembunyikan pada awalnya -->
            <div id="question-container" style="display: none;">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Soalan</th>
                            <th>Ya</th>
                            <th>Tidak</th>
                        </tr>
                    </thead>
                    <tbody id="question-list">
                        <input type="hidden" name="alumni_id" value="{{ $alumni->id }}">
                        @foreach ($questions as $question)
                            @php
                                // Semak jika alumni sudah menjawab soalan ini
                                $existingAnswer = $surveyRecords->where('question_id', $question->id)->first();
                            @endphp
                            <tr data-year="{{ $question->year }}" style="display: none;">
                                <td class="question-number"></td>
                                <td>{{ $question->question_text }}</td>
                                <td>
                                    <input type="radio" name="answer[{{ $question->id }}]" value="yes" 
                                    {{ $existingAnswer && $existingAnswer->answer === 'yes' ? 'checked' : '' }} required>
                                </td>
                                <td>
                                    <input type="radio" name="answer[{{ $question->id }}]" value="no" 
                                    {{ $existingAnswer && $existingAnswer->answer === 'no' ? 'checked' : '' }} required>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
                <!-- Button ini akan disembunyikan pada awalnya -->
                <!-- <button type="submit" class="btn-submit" id="submit-btn" style="display: none;">Hantar</button> -->
                <input type="submit" value="Hantar" class="btn-submit" id="submit-btn" style="display: none;">
            
        </form>
    </div>
</div>

<script>
    function filterQuestions() {
    let selectedYear = document.getElementById("year").value;
    let rows = document.querySelectorAll("#question-list tr");
    let questionContainer = document.getElementById("question-container");
    let submitButton = document.getElementById("submit-btn");
    let questionCount = 1;
    let hasQuestions = false;

    rows.forEach(row => {
        let questionYear = row.getAttribute("data-year");
        let questionNumberCell = row.querySelector(".question-number");
        let inputs = row.querySelectorAll("input[type='radio']"); // Ambil input radio

        if (selectedYear === questionYear) {
            row.style.display = "table-row";
            questionNumberCell.textContent = questionCount++;
            hasQuestions = true;

            // Tambah atribut required untuk input yang kelihatan
            inputs.forEach(input => input.setAttribute("required", "required"));
        } else {
            row.style.display = "none";
            questionNumberCell.textContent = "";

            // Buang atribut required untuk input yang tersembunyi
            inputs.forEach(input => input.removeAttribute("required"));
        }
    });

    // Pastikan jadual dan butang dihantar dipaparkan jika ada soalan yang sesuai
    questionContainer.style.display = hasQuestions ? "block" : "none";
    submitButton.style.display = hasQuestions ? "block" : "none";
    submitButton.disabled = !hasQuestions;
}


</script>
