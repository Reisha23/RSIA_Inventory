<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Custom Styles */
        .bg-gradient {
            background: linear-gradient(135deg, #6dd5ed, #2193b0);
        }
        .form-container {
            max-width: 400px;
            margin: 20px;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .form-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #333;
        }
        .btn-primary {
            background-color: #2193b0;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #186f8c;
        }
        .link {
            color: #2193b0;
            transition: color 0.3s;
        }
        .link:hover {
            color: #186f8c;
        }
    </style>
</head>
<body class="bg-gradient h-screen flex items-center justify-center">
    <div class="form-container">
        <h2 class="form-title text-center mb-5">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input id="name" type="text" name="name" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input id="email" type="email" name="email" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input id="password" type="password" name="password" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="btn-primary w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Register
                </button>
            </div>
            <div class="mt-4 text-center">
                <p class="text-sm">Already have an account? <a href="{{ route('login') }}" class="link font-bold">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
