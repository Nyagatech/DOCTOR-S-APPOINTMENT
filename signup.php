<?php
// Include database connection
include 'db.php'; // Make sure this file contains your database connection setup

// Initialize variables for feedback
$signup_error = '';
$signup_success = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted username, email, and password
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $cpassword = htmlspecialchars(trim($_POST["cpassword"]));

    // Simple validation
    if ($password !== $cpassword) {
        $signup_error = 'Passwords do not match.';
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to prevent SQL injection
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
     
        if ($stmt) {
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                $signup_success = 'Account created successfully! You can now log in.';
            } else {
                $signup_error = 'Database error: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            $signup_error = 'Failed to prepare SQL statement.';
        }
    }
}

$conn->close(); // Close the database connection
?>

<?= include'header.php'?>
    
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 m-auto" style="width: 400px;height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <p class="text-center mt-1 fw-bold">Create Account</p>
                    <p>Please fill in this form to create an account</p>

                    <!-- Display error or success message -->
                    <?php if ($signup_error): ?>
                        <div class="alert alert-danger" role="alert"><?php echo $signup_error; ?></div>
                    <?php elseif ($signup_success): ?>
                        <div class="alert alert-success" role="alert"><?php echo $signup_success; ?></div>
                    <?php endif; ?>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="mb-2">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        <div>
                            <p>Already have an account? <a href="login.php" class="text-decoration-none">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

     <?= include'footer.php'?>