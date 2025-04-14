<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis - Pensyarah</title>
    
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
            height: 165vh; /* Sidebar sepanjang skrin */
            width: 250px; /* Lebar sidebar */
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            padding: 20px;
            color: white;
            width: 250px;
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
        }

        .status-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            font-size: 18px;
            color: white;
            min-width: 200px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }

        .status-card:hover {
            transform: scale(1.05);
        }

        .status-card i {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .status-card .text {
            font-size: 18px;
        }

        .status-card .number {
            font-size: 32px; /* Lebih besar & bold */
            font-weight: bold;
            margin-top: 5px;
        }

        /* Card */
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .status-buttons .card {
            flex: 1;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            color: white;
            min-width: 200px;
        }

        /* Ikon */
        .icon {
            font-size: 30px;
            margin-bottom: 10px;
            color: #ff4081;
        }

        .total-students { background-color: #6c757d; }
        .completed { background-color: #28a745; }
        .pending { background-color: #dc3545; }

        /* Seksyen Analisis */
        .analysis-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .number {
            font-size: 28px; /* Besarkan font nombor */
            font-weight: bold; /* Jadikan nombor lebih tebal */
        }

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

    <div class="dashboard">
        <nav class="sidebar">
            <h2><i class="fa-solid fa-chalkboard-teacher"></i> {{ auth('pensyarah')->user()->name ?? 'Pengguna' }}</h2>
            <a href="{{ route('pensyarah.dashboard') }}" class="active"><i class="fa-solid fa-chart-line"></i> Analisis</a>
            <a href="{{ route('pensyarah.records') }}"><i class="fa-solid fa-file-lines"></i> Rekod Pelajar</a>
        </nav>

        <div class="content">
            <h2>Hi, Selamat Datang ke Halaman {{ auth('pensyarah')->user()->name ?? 'Pengguna' }}!</h2><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-secondary text-white">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-users"></i>
                            <h5 class="card-title">Jumlah Alumni</h5>
                            <span id="total-alumni" class="number">{{ $totalAlumni }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-check-circle"></i>
                            <h5 class="card-title">Sudah Menjawab</h5>
                            <span id="answered" class="number">{{ $answeredAlumni }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-times-circle"></i>
                            <h5 class="card-title">Belum Menjawab</h5>
                            <span id="not-answered" class="number">{{ $unansweredAlumni }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="row mt-5">
                <div class="col-md-6">
                    <center><h4>📊 Statistik Jawapan</h4></cneter><br>
                    <canvas id="barChart"></canvas>
                </div>

                <div class="col-md-6">
                    <center><h4>📈 Peratusan Jawapan</h4></center><br>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                fetchStatistics();
                fetchQuestionData();
            });

            function fetchStatistics() {
                $.ajax({
                    url: "{{ route('admin.statistics') }}",
                    method: "GET",
                    success: function (data) {
                        $('#total-alumni').text(data.totalAlumni);
                        $('#answered').text(data.answeredAlumni);
                        $('#not-answered').text(data.unansweredAlumni);
                    },
                    error: function () {
                        console.log("Gagal mendapatkan statistik.");
                    }
                });
            }

            let questionChartInstance = null;
            function fetchQuestionData() {
                $.ajax({
                    url: "{{ route('admin.questionStatistics') }}",
                    method: "GET",
                    success: function (data) {
                        let labels = data.map(item => "Soalan " + item.question_number);
                        let yesData = data.map(item => item.yes_count);
                        let noData = data.map(item => item.no_count);
                        const ctx = document.getElementById('barChart').getContext('2d');
                        if (questionChartInstance) {
                            questionChartInstance.destroy();
                        }
                        questionChartInstance = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: 'Jawapan Ya',
                                        data: yesData,
                                        backgroundColor: '#28a745'
                                    },
                                    {
                                        label: 'Jawapan Tidak',
                                        data: noData,
                                        backgroundColor: '#dc3545'
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: { beginAtZero: true }
                                }
                            }
                        });
                    },
                    error: function () {
                        console.log("Gagal mendapatkan data soalan.");
                    }
                });
            }
        </script>



        <!-- <footer style="position: fixed; bottom: 0; width: 100%; text-align: center; background-color: var(--secondary-color); padding: 15px; color: var(--text-dark);">
            &copy; {{ date('Y') }} I-TRACER. Hakcipta Terpelihara.
        </footer> -->
</body>
</html>

<script>
    function fetchStatistics() {
        $.ajax({
            url: "{{ route('admin.statistics') }}",
            method: "GET",
            success: function (data) {
                $("#total-alumni").text(data.totalAlumni);
                $("#answered").text(data.answeredCount);
                $("#not-answered").text(data.notAnsweredCount);
            },
            error: function () {
                console.log("Gagal mendapatkan data statistik.");
            }
        });
    }
    
    // Panggil function setiap 5 saat
    fetchStatistics();
    setInterval(fetchStatistics, 5000);
</script>

<script>
    const totalAlumni = {{ $totalAlumni }};
        const answeredAlumni = {{ $answeredAlumni }};
        const unansweredAlumni = {{ $unansweredAlumni }};

        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Sudah Menjawab', 'Belum Menjawab'],
                datasets: [{
                    label: 'Jumlah',
                    data: [answeredAlumni, unansweredAlumni],
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderColor: ['#218838', '#c82333'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Pie Chart
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Sudah Menjawab', 'Belum Menjawab'],
                datasets: [{
                    data: [answeredAlumni, unansweredAlumni],
                    backgroundColor: ['#28a745', '#dc3545']
                }]
            },
            options: { responsive: true }
        });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

