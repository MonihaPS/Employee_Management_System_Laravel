<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Attendance</title>
    <link href="{{ asset('css/your-style.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg, #0605051f, #07060627), url('{{ asset('css/attendance.jpeg') }}');
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .container {
            max-width: 1000px;
            width: 100%;
            margin: 20px;
            background-color: rgba(255, 255, 255, 0.626);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #007bff61;
            color: #0b0b0b;
        }

        .present {
            background-color: #d4eddac1;
            color: #155724;
        }

        .absent {
            background-color: #f8d7da7d;
            color: #721c2576;
        }

        .late {
            background-color: #fff3cd84;
            color: #85650477;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn-group a, .btn-group button {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 1rem;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-group a:hover, .btn-group button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Attendance</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                <tr class="{{ strtolower($attendance->status) }}">
                    <td>{{ $attendance->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($attendance->status) }}</td>
                    <td>{{ $attendance->check_in }}</td>
                    <td>{{ $attendance->check_out }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="btn-group">
            <form action="{{ route('user.attendance.check-in') }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit">Check In</button>
            </form>
            <form action="{{ route('user.attendance.check-out') }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit">Check Out</button>
            </form>
            <a href="{{ route('user.dashboard') }}">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
