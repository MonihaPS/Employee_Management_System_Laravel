<!-- resources/views/components/menu.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Your App Name</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('user.profile.edit')); ?>">Profile</a>
            </li>
            <!-- Add more menu items as needed -->
        </ul>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\my_admin\resources\views/layout/app.blade.php ENDPATH**/ ?>