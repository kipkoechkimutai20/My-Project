<?php
require_once 'includes/config.php';

// Get all courses
$sql = "SELECT c.*, u.full_name as instructor_name \n        FROM courses c \n        JOIN users u ON c.instructor_id = u.id \n        ORDER BY c.created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Courses - Neuron</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/courses.css">
</head>
<body>
    <!-- Navigation -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Courses Section -->
    <div class="container py-5">
        <h1 class="mb-2">Explore Courses</h1>
        <p class="lead text-muted">Browse the latest courses created by our instructors.</p>
        
        <div class="row g-4 mt-3">
            <?php if ($result->num_rows > 0): ?>
                <?php while($course = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <?php if ($course['thumbnail']): ?>
                                <img src="<?php echo $course['thumbnail']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($course['title'], ENT_QUOTES); ?>">
                            <?php else: ?>
                                <div class="card-img-top" style="background-image:url('assets/images/default-course.jpg'); background-size:cover; background-position:center;"></div>
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($course['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars(substr($course['description'], 0, 150)) . '...'; ?></p>
                                <p class="text-muted mb-2">Instructor: <?php echo htmlspecialchars($course['instructor_name']); ?></p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div class="course-price"><?php echo $course['price'] ? 'KSh '.htmlspecialchars($course['price']) : 'Free'; ?></div>
                                    <a href="course.php?id=<?php echo $course['id']; ?>" class="btn btn-primary">View Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        No courses available at the moment. Please check back later.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>