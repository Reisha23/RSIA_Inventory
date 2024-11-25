<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #2c2c2c, #4f4f4f); /* Latar belakang abu-abu */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            max-width: 400px;
            padding: 30px;
            background: #d9d9d9; /* Warna abu-abu terang untuk form */
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
            font-size: 0.95rem;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 5px;
            background-color: white;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .form-group input:focus {
            background-color: #f0f0f0;
            border-color: #999;
        }
        .btn-primary {
            background-color: #4f4f4f; /* Warna abu-abu gelap untuk tombol */
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
        .text-center {
            text-align: center;
        }
        .text-description {
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Forgot Password</h2>
        <p class="text-description">
            Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
        </p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">
                Email Password Reset Link
            </button>
        </form>
    </div>
</body>
</html>
