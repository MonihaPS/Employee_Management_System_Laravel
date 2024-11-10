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
            background-image: linear-gradient(135deg,  #2321210b, #1a191905), url('<?php echo e(asset('css/leave_report.png')); ?>');
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

        <?php if($leaves->isEmpty()): ?>
            <p>No leave applications found.</p>
        <?php else: ?>
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
                    <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($leave->id); ?></td>
                            <td><?php echo e($leave->name); ?></td>
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
                            <td><?php echo e($leave->updated_status); ?>

                                <form action="<?php echo e(route('update.leave.status', $leave->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="0" <?php echo e($leave->status == 0 ? 'selected' : ''); ?>>Pending</option>
                                        <option value="1" <?php echo e($leave->status == 1 ? 'selected' : ''); ?>>Approved</option>
                                        <option value="2" <?php echo e($leave->status == 2 ? 'selected' : ''); ?>>Declined</option>
                                    </select>
                                </form>
                            </td>
                            <td><?php echo e($leave->leave_days); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/leave_applications.blade.php ENDPATH**/ ?>