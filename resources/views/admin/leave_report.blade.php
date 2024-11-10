<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg,  #2321210b, #1a191905), url('{{ asset('css/leave_report.png') }}');
            margin: 0;
            padding: 0;
            display: flex;
            background-size: cover;
            background-repeat: no-repeat;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            text-align: center;
            padding: 20px;
            background: #10090932;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #140f0f;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #59baf7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Leave Report</h1>

            <table class="table table-striped">
        
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Role</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Leave Days</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaves as $leave)
                        <tr>
                            <td>{{ $leave->id }}</td>
                            <td>{{ $leave->user->name }}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->end_date }}</td>
                            <td>{{ $leave->role }}</td>
                            <td>{{ $leave->reason }}</td>
                            <td>{{ $leave->status }}
                                @if ($leave->status == 0)
                                    - Pending
                                @elseif ($leave->status == 1)
                                    - Approved
                                @elseif ($leave->status == 2)
                                    - Declined
                                @endif
                            </td>
                            <td>{{ $leave->leave_days }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>
