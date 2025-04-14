<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login iTracer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8dcdc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .container {
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeInLogo 1s ease-in 0.5s forwards;
        }
        @keyframes fadeInLogo {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        .logo i {
            font-size: 3rem;
            color: #6c757d;
        }
        .card {
            border-radius: 15px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            padding: 25px;
            background: white;
            border: none;
            opacity: 0;
            animation: popUp 0.8s ease-in-out forwards;
        }
        @keyframes popUp {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        .card:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            z-index: 10;
            position: relative;
        }
        .btn-custom {
            background-color: #a05263;
            color: white;
            border-radius: 10px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #7a3c4b;
            transform: translateY(-3px);
        }
        .icon {
            font-size: 4rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <h2 class="fw-bold text-secondary">iTRACER</h2>
        </div>
        <h2 class="mb-4 fw-bold">Selamat Datang ke Portal Login I-Tracer</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-4 text-center" style="animation-delay: 0.2s;">
                    <i class="fas fa-user-shield icon text-danger"></i>
                    <h4 class="fw-bold">Login Admin</h4>
                    <a href="/admin/login" class="btn btn-custom w-100 mt-3">Masuk</a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-4 text-center" style="animation-delay: 0.4s;">
                    <i class="fas fa-graduation-cap icon text-primary"></i>
                    <h4 class="fw-bold">Login Alumni</h4>
                    <a href="/alumni/login" class="btn btn-custom w-100 mt-3">Masuk</a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-4 text-center" style="animation-delay: 0.6s;">
                    <i class="fas fa-chalkboard-teacher icon text-success"></i>
                    <h4 class="fw-bold">Login Pensyarah</h4>
                    <a href="/pensyarah/login" class="btn btn-custom w-100 mt-3">Masuk</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
