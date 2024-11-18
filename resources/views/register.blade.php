<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .bg-gradient {
            background: linear-gradient(135deg, #2c2c2c, #4f4f4f); /* Warna abu-abu */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            max-width: 400px;
            padding: 30px;
            background: #d9d9d9; /* Warna abu-abu terang */
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }
        .form-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .form-group label {
            margin-bottom: 5px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #555;
        }
        .form-group input {
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 5px;
            outline: none;
            background-color: white;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .form-group input:focus {
            background-color: #f0f0f0; /* Warna abu-abu terang saat input difokuskan */
            border-color: #999;
        }
        .btn-primary {
            background-color: #4f4f4f; /* Warna abu-abu gelap */
            color: white;
            border: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #6e6e6e; /* Warna abu-abu terang saat di-hover */
        }
        .link {
            color: #6e6e6e; /* Warna abu-abu untuk teks link */
            transition: color 0.3s;
            font-size: 0.9rem;
        }
        .link:hover {
            color: #8e8e8e; /* Warna abu-abu lebih terang saat di-hover */
        }
        .error-message {
            color: #ff5a5a;
            font-size: 0.85rem;
        }
    </style>
</head>
<body class="bg-gradient">
    <div class="form-container">
        <h2 class="form-title">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required class="form-control">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required class="form-control">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required class="form-control">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control">
            </div>

            <button type="submit" class="btn-primary">Register</button>

            <div class="mt-4 text-center">
                <p class="text-sm">Already have an account? <a href="{{ route('login') }}" class="link font-bold">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
