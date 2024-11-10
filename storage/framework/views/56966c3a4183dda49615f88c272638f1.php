<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg,  #2321210b, #1a191905), url('<?php echo e(asset('css/leave_report.png')); ?>');
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
                <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($leave->user_id == Auth::id()): ?>
                        <tr>
                            <td><?php echo e($leave->id); ?></td>
                            <td><?php echo e($leave->user->name); ?></td>
                            <td><?php echo e($leave->start_date); ?></td>
                            <td><?php echo e($leave->end_date); ?></td>
                            <td><?php echo e($leave->role); ?></td>
                            <td><?php echo e($leave->reason); ?></td>
                            <td><?php echo e($leave->status); ?>

                                <?php if($leave->status == 0): ?>
                                    - Pending
                                <?php elseif($leave->status == 1): ?>
                                    - Approved
                                <?php elseif($leave->status == 2): ?>
                                    - Declined
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($leave->leave_days); ?></td>
                        </tr>
                    <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/user/leave_report.blade.php ENDPATH**/ ?>