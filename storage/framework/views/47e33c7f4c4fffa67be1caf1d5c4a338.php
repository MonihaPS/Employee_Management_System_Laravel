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
            padding: 12px;
            border: 1px solid #060101;
            text-align: left;
        }
        th {
            background-color: #f4f4f4c5;
        }
        td{
            color: #070707;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            touch-action: manipulation;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            width: 80px;
            height: 40px;
            line-height: 40px;
            padding: 0;
        }
        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
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
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\my_admin\resources\views/layout/admin_header.blade.php ENDPATH**/ ?>