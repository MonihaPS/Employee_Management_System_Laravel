<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="<?php echo e(asset('css/your-style.css')); ?>" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg, #0605051f, #07060627), url('css/register.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            z-index: -1;
            overflow: hidden;
        }
        .main-container {
            text-align: center;
        }
        h1 {
            color: #f2f3f5;
            font-size: 50px;
            margin-bottom: 20px;
        }
        .form-container {
            background-image: linear-gradient(135deg, #fcf6f61f, #fafafa00), url('css/form.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(231, 16, 181, 0.1);
            width: 450px;
            text-align: left;
            margin: 20px auto;
            overflow-y: auto; /* Enable scrolling for content */
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            position: relative;
            margin-bottom: 15px;
            font-size: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #080808;
        }
        .form-group input {
            width: calc(100% - 40px);
            padding: 10px;
            padding-left: 40px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-group .fa {
            position: absolute;
            top: 35px;
            left: 10px;
            color: #aaa;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error, .status {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .switch {
            text-align: center;
            margin-top: 10px;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
        }
        .switch a {
            color: #d523ac;
            text-decoration: none;
        }
        .switch a:hover {
            text-decoration: underline;
        }
        .terms-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .terms-container input {
            margin-right: 10px;
        }
    </style>
    <script>
        function showLoginForm() {
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
        }

        function showRegisterForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="main-container">
        <h1>Welcome to our application</h1>

        <!-- Register Form -->
        <div class="form-container" id="register-form">
            <h2>Register</h2>
            <?php if($errors->any()): ?>
                <div class="error">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(session('status')): ?>
                <div class="status"><?php echo e(session('status')); ?></div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(url('/test_33')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <i class="fa fa-user"></i>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <div class="terms-container">
                    <input type="checkbox" name="terms" id="terms" required>
                    <label for="terms">Accept Terms and Conditions</label>
                </div>
                <button type="submit">Register</button>
            </form>
            <div class="switch">
                <p>Already have an account? <a href="javascript:void(0);" onclick="showLoginForm()">Login</a></p>
            </div>
        </div>

        <!-- Login Form -->
        <div class="form-container" id="login-form" style="display: none;">
            <h2>Login</h2>
            <?php if($errors->any()): ?>
                <div class="error">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(session('status')): ?>
                <div class="status"><?php echo e(session('status')); ?></div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" id="login-email" value="<?php echo e(old('email')); ?>" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" id="login-password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="switch">
                <p>Don't have an account? <a href="javascript:void(0);" onclick="showRegisterForm()">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/home.blade.php ENDPATH**/ ?>