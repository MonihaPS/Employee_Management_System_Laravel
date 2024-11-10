<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg, #0605051f, #07060627), url('css/registered.png');
            background-size: contain; /* Ensures the image covers the entire background */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .message {
            background-color: #f9f6f65a;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(231, 16, 181, 0.21);
            width: 300px;
            max-width: 100%;
            text-align: center;
            transform: translateX(40%); /* Move 20% from the original position to the right */
            overflow-y: auto;
        }
        h1 {
            color: #1444f0;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="message">
        <h1>Registration Successful!</h1>
        <p>You have successfully registered.</p>
        <p><a href="<?php echo e(route(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard')); ?>">Go to Dashboard</a></p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/registration-success.blade.php ENDPATH**/ ?>