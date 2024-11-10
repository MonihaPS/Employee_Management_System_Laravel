<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg, #2321210b, #1a191905), url('css/login.jpg');
            display: flex;
            background-size: cover;
            background-repeat: no-repeat;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            z-index: -1;
            overflow: hidden;
        }
        .form-container {
            background-image: linear-gradient(135deg, #fcf6f61f, #fafafa00), url('css/form.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(231, 16, 181, 0.1);
            width: 500px;
            text-align: left;
            overflow-y: auto;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            position: relative;
            margin-bottom: 15px;
            font-size: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #080808;
        }
        .form-group input {
            width: calc(100% - 40px);
            padding: 10px;
            padding-left: 40px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-group .fa {
            position: absolute;
            top: 35px;
            left: 10px;
            color: #aaa;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error, .status {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .switch {
            text-align: center;
            margin-top: 10px;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
        }
        .switch a {
            color: #d523ac;
            text-decoration: none;
        }
        .switch a:hover {
            text-decoration: underline;
        }
        .icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .icon i {
            font-size: 80px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <h2>Login</h2>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="login-email">Email</label>
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" id="login-email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="login-password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="switch">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>
</html>
