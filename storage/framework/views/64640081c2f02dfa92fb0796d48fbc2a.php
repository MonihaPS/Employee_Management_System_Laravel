<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="<?php echo e(asset('css/your-style.css')); ?>" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg, #0605051f, #07060627), url('<?php echo e(asset('css/admin.jpg')); ?>');
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .sidebar {
            width: 250px;
            background-color: #0e0d0e71;
            padding: 20px;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .content-container {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .content {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 4px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
        <a href="<?php echo e(route('admin.users.index')); ?>">Users</a>
        <a href="<?php echo e(route('user.profile.edit')); ?>">Profile</a>
        <a href="<?php echo e(route('admin.leave.report')); ?>">Leave Report</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </div>

    <div class="content-container">
        <div class="content">
            <h1>Admin Dashboard</h1>

            <?php if(Auth::check()): ?>
                <div class="content">
                    <p>Welcome, <?php echo e(Auth()->user()->name); ?></p>
                    <p>Your email: <?php echo e(Auth()->user()->email); ?></p>
                </div>
                <div class="btn-group">
                    <a href="<?php echo e(route('user.profile.edit')); ?>">Edit Profile</a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            <?php else: ?>
                <p>You are not logged in.</p>
            <?php endif; ?>

            <table id="example_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Designation</th>
                        <th>Reporting Manager</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item['id']); ?></td>
                            <td><?php echo e($item['name']); ?></td>
                            <td><?php echo e($item['email']); ?></td>
                            <td><?php echo e($item['role']); ?></td>
                            <td><?php echo e($item['designation']); ?></td>
                            <td><?php echo e($item['reporting_manager']); ?></td>
                            <td class="actions">
                                <a href="<?php echo e(route('admin.users.edit', $item['id'])); ?>" class="btn btn-primary">Edit</a>
                                <form action="<?php echo e(route('admin.users.destroy', $item['id'])); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include your JavaScript files here -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>