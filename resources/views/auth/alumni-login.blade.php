<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Alumni - iTracer</title>
    
    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8dcdc;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .container {
            max-width: 900px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .career-section, .login-container {
            padding: 20px;
            border-radius: 15px;
            background: #fff0f5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .career-section img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            border-radius: 10px;
        }

        .input-group-text {
            background-color: #c86b85;
            color: white;
            border-radius: 10px 0 0 10px;
            border: none;
        }

        .form-control {
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #c86b85;
            box-shadow: 0 0 8px rgba(200, 107, 133, 0.5);
        }

        .btn-login {
            background-color: #480032;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #c86b85;
            transform: translateY(-2px);
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            margin-top: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Career Suggestions -->
        <div class="col-md-6 career-section text-center">
        <h3 class="text-center mb-4 fw-bold"><i class="fas fa-shield-alt"></i> iTRACER</h3>
            <div id="careerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($careers as $key => $career)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            @if($career->image)
                                <img src="{{ asset('storage/' . $career->image) }}" alt="Kerjaya">
                            @endif
                            <br><br>
                            <h5>{{ $career->job }}</h5>
                            <p>{{ $career->address }}</p>
                            <p><strong>📞 Phone:</strong> {{ $career->phone }}</p>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#careerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#careerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>

        <!-- Login Form -->
        <div class="col-md-6 login-container">
            <h3 class="text-center mb-4 fw-bold">Login Alumni</h3>
            
            <form action="{{ route('alumni.login') }}" method="POST">
                @csrf               
                <div class="mb-3">
                    <label for="kos" class="form-label">Pilih Kos</label>
                    <select name="kos" id="kos" class="form-control" required>
                        <option value="">-- Jenis Kos --</option>
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
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">Login</button>
                <a href="{{ route('login-selection') }}" class="btn btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
