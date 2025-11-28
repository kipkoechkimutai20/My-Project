<?php
// Ensure session is started and DB config is loaded (this also allows using $_SESSION in templates)
require_once __DIR__ . '/includes/config.php';

// Provide fallbacks for images if local files are missing
$logo_path = __DIR__ . '/assets/images/logo.png';
$hero_path = __DIR__ . '/assets/images/hero-image.jpg';
$logo = file_exists($logo_path) ? 'assets/images/logo.png' : 'https://via.placeholder.com/150x40?text=Neuron';
$hero = file_exists($hero_path) ? 'assets/images/hero-image.jpg' : 'https://images.unsplash.com/photo-1557800636-894a64c1696f?auto=format&fit=crop&w=1200&q=80';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neuron - Unlock Your Potential</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
                <a class="navbar-brand" href="index.php">
                <img src="<?php echo $logo; ?>" alt="Neuron" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Explore Courses</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="dashboard.php" class="btn btn-outline-primary me-2">Dashboard</a>
                        <a href="logout.php" class="btn btn-primary">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
                        <a href="register.php" class="btn btn-primary">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Unlock Your Potential</h1>
                    <h2>Free Online Learning</h2>
                    <p class="lead">Empower yourself with free, high-quality education from top instructors worldwide.</p>
                    <a href="courses.php" class="btn btn-primary btn-lg">Explore Courses</a>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo $hero; ?>" alt="Learning" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container">
            <h2 class="text-center mb-5">About the Platform</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3>Mission</h3>
                            <p>To provide accessible, quality education to learners worldwide through our innovative online platform.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3>Vision</h3>
                            <p>To become the leading global platform for online education, fostering a community of lifelong learners.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3>Values</h3>
                            <p>Excellence, Innovation, Accessibility, and Community-driven learning experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container">
            <p class="text-center mb-0">&copy; 2024 Neuron. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>