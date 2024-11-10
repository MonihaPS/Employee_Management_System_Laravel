<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Applications</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg,  #2321210b, #1a191905), url('{{ asset('css/leave_report.png') }}');
            margin: 0;
            padding: 20px;
            display: flex;
            background-size: cover;
            background-repeat: no-repeat;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            text-align: center;
            max-width: 1000px;
            margin: auto;
            background-color: #10090932;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #0c0606;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #59baf7;
        }

        /* tr:nth-child(even) {
            background-color: #f9f9f932;
        } */

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Form Styles */
        form {
            display: inline;
        }

        select {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            transition: border-color 0.3s ease;
        }

        select:hover,
        select:focus {
            border-color: #aaa;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Leave Applications</h1>

        @if ($leaves->isEmpty())
            <p>No leave applications found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Role</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Updated Status</th>
                        <th>Leave Days</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaves as $leave)
                        <tr>
                            <td>{{ $leave->id }}</td>
                            <td>{{ $leave->name }}</td>
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
                            <td>{{ $leave->updated_status }}
                                <form action="{{ route('update.leave.status', $leave->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="0" {{ $leave->status == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ $leave->status == 1 ? 'selected' : '' }}>Approved</option>
                                        <option value="2" {{ $leave->status == 2 ? 'selected' : '' }}>Declined</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ $leave->leave_days }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
