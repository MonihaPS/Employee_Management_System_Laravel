<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Leave</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg,  #2321214e, #1a191947), url('<?php echo e(asset('css/leave1.jpg')); ?>');
            margin: 0;
            padding: 0;
            display: flex;
            background-size: cover;
            background-repeat: no-repeat;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            max-width: 500px;
            width: 100%;
            margin: 20px auto;
            background-color: #fefcfcbd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            overflow-y: auto;
        }
        h1 { text-align: center; color: #090909; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input, textarea, select { padding: 10px; margin-top: 5px; border-radius: 4px; border: 1px solid #cccccc; }
        button { margin-top: 20px; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Apply for Leave</h1>
        <form action="<?php echo e(route('user.leave.apply')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="role" value="user">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
            
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
            
            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>
            
            <label for="reporting_manager_id">Reporting Manager:</label>
            <select id="reporting_manager_id" name="reporting_manager_id" required>
                <?php $__currentLoopData = $reportingManagers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/user/leave_form.blade.php ENDPATH**/ ?>