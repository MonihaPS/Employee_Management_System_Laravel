<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="{{ asset('css/your-style.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: linear-gradient(135deg, #0605051f, #07060627), url('{{ asset('css/register1.jpg') }}');
            background-size: cover; /* Ensures the background image covers the entire background */
            background-repeat: no-repeat; /* Prevents the background image from repeating */
            background-position: center center; /* Centers the background image */
            overflow: hidden;
        }

        .container {
            max-width: 900px;
            margin: 100px auto;
            background-color: #ffffffcb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .content {
            margin-top: 20px;
            padding: 20px;
            background-color: #0a0a0a5d;
            border-radius: 4px;
            color: #ffffff;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-group a, .btn-group button {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s;
            border: none;
        }
        .btn-group a:hover, .btn-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Dashboard</h1>
        @auth
        <div class="content">
            <p>Welcome, {{ auth()->user()->name }}</p>
            <p>Your email: {{ auth()->user()->email }}</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('user.profile.edit') }}">Edit Profile</a>
            <a href="{{ route('user.leave.form') }}">Apply for Leave</a>
            <a href="{{ route('user.leave.report') }}">Leave Report</a>
            <a href="{{ route('leave.applications') }}">Leave Applications</a>
            <a href="{{ route('user.attendance') }}">Attendance</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
        @else
        <p>You are not logged in.</p>
        @endauth
    </div>
</body>
</html>
