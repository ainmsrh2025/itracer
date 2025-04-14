<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - iTracer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            background-color: #f8dcdc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .login-container {
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeIn 0.5s ease-out forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .left-section {
            background-color: #c86b85;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px;
            flex: 1;
            text-align: center;
        }
        .left-section h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 10px;
            opacity: 0;
            transform: scale(0.5);
            animation: zoomIn 0.5s ease-out forwards 0.3s;
        }
        @keyframes zoomIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .right-section {
            padding: 40px;
            flex: 1;
        }
        .form-control {
            border-radius: 10px;
        }
        .form-control:focus {
            border-color: #c86b85;
            box-shadow: 0 0 8px rgba(200, 107, 133, 0.5);
        }
        .input-group-text {
            background-color: #c86b85;
            color: white;
            border-radius: 10px 0 0 10px;
            border: none;
        }
        .btn-login {
            background-color: #480032;
            color: white;
            border-radius: 10px;
            padding: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #c86b85;
            transform: translateY(-2px);
            
        }
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
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
    <div class="login-container">
        <div class="col-md-6 left-section">
            <h2><i class="fas fa-shield-alt"></i> iTRACER</h2>
        </div>
        <div class="col-md-6 right-section">
            <h3 class="text-center mb-4 fw-bold">Login Admin</h3>
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                @if ($errors->has('login_error'))
                    <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
                @endif
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-login w-100">Login</button>
                <a href="{{ route('login-selection') }}" class="btn btn-back">Kembali</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
