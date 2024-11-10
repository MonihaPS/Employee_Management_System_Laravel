<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg,  #2321210b, #1a191905), url('<?php echo e(asset('css/register1.jpg')); ?>');
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
            text-align: center;
            padding: 20px;
            background: #efeded;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-top: 30px;
            overflow-y: auto;
        }

        .container h1 {
            color: #0d0d0d;
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            text-align: left;
        }

        input[type="text"], input[type="email"], select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="<?php echo e(route('admin.users.update', $user->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required>

            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="1" <?php echo e(old('role', $user->role) == '1' ? 'selected' : ''); ?>>Admin</option>
                <option value="2" <?php echo e(old('role', $user->role) == '2' ? 'selected' : ''); ?>>User</option>
            </select>

            <label for="designation">Designation</label>
            <select id="designation" name="designation" required>
                <option value="Super Admin" <?php echo e(old('designation, $user->designation')== 'Super Admin' ? 'selected': ''); ?>>Super Admin</option> 
                <option value="Software Engineer" <?php echo e(old('designation', $user->designation) == 'Software Engineer' ? 'selected' : ''); ?>>Software Engineer</option>
                <option value="Senior Software Engineer" <?php echo e(old('designation', $user->designation) == 'Senior Software Engineer' ? 'selected' : ''); ?>>Senior Software Engineer</option>
                <option value="Lead Developer" <?php echo e(old('designation', $user->designation) == 'Lead Developer' ? 'selected' : ''); ?>>Lead Developer</option>
                <option value="Project Manager" <?php echo e(old('designation', $user->designation) == 'Project Manager' ? 'selected' : ''); ?>>Project Manager</option>
                <option value="Product Manager" <?php echo e(old('designation', $user->designation) == 'Product Manager' ? 'selected' : ''); ?>>Product Manager</option>
                <option value="QA Engineer" <?php echo e(old('designation', $user->designation) == 'QA Engineer' ? 'selected' : ''); ?>>QA Engineer</option>
                <option value="QA Lead" <?php echo e(old('designation', $user->designation) == 'QA Lead' ? 'selected' : ''); ?>>QA Lead</option>
                <option value="DevOps Engineer" <?php echo e(old('designation', $user->designation) == 'DevOps Engineer' ? 'selected' : ''); ?>>DevOps Engineer</option>
                <option value="System Administrator" <?php echo e(old('designation', $user->designation) == 'System Administrator' ? 'selected' : ''); ?>>System Administrator</option>
                <option value="Business Analyst" <?php echo e(old('designation', $user->designation) == 'Business Analyst' ? 'selected' : ''); ?>>Business Analyst</option>
                <option value="Technical Support Specialist" <?php echo e(old('designation', $user->designation) == 'Technical Support Specialist' ? 'selected' : ''); ?>>Technical Support Specialist</option>
                <option value="UX/UI Designer" <?php echo e(old('designation', $user->designation) == 'UX/UI Designer' ? 'selected' : ''); ?>>UX/UI Designer</option>
                <option value="Data Analyst" <?php echo e(old('designation', $user->designation) == 'Data Analyst' ? 'selected' : ''); ?>>Data Analyst</option>
                <option value="Data Scientist" <?php echo e(old('designation', $user->designation) == 'Data Scientist' ? 'selected' : ''); ?>>Data Scientist</option>
                <option value="Database Administrator" <?php echo e(old('designation', $user->designation) == 'Database Administrator' ? 'selected' : ''); ?>>Database Administrator</option>
                <option value="Network Engineer" <?php echo e(old('designation', $user->designation) == 'Network Engineer' ? 'selected' : ''); ?>>Network Engineer</option>
                <option value="IT Manager" <?php echo e(old('designation', $user->designation) == 'IT Manager' ? 'selected' : ''); ?>>IT Manager</option>
                <option value="HR Manager" <?php echo e(old('designation', $user->designation) == 'HR Manager' ? 'selected' : ''); ?>>HR Manager</option>
            </select>
            <label for="reporting_manager">Reporting Manager</label>
            <select id="reporting_manager" name="reporting_manager" required>
                <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($manager->id); ?>" <?php echo e(old('reporting_manager', $user->reporting_manager) == $manager->id ? 'selected' : ''); ?>><?php echo e($manager->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/admin/edit_user.blade.php ENDPATH**/ ?>