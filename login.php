<?php
// Start session to store user data if needed
session_start();

// Include database connection file
include 'db.php'; // Ensure this file connects to your database

// Initialize variables for login feedback
$login_error = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted username and password
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    // Prepare and execute a query to check if user exists
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1"; // Adjust the table name as needed
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if username exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password (assuming hashed passwords)
        if (password_verify($password, $row['password'])) { // Make sure the column name matches your DB
            // Store user data in session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $username;
            // Redirect to the appointments page or dashboard
            header("Location: appointment.php");
            exit();
        } else {
            $login_error = 'Invalid password. Please try again.';
        }
    } else {
        $login_error = 'No user found with that username.';
    }

    $stmt->close();
}

$conn->close(); // Close the database connection
?>

 <?= include'header.php'?>;
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-2 mb-5 text-center m-auto" style="width: 400px; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h2 class="mt-1 fw-bold">Login</h2>
                    <p>Please login to book an appointment</p>

                    <!-- Displaying error message if login fails -->
                    <?php if ($login_error): ?>
                        <div class="alert alert-danger" role="alert"><?php echo $login_error; ?></div>
                    <?php endif; ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                        </div>  
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <div>
                            <p class="mt-3">Don't have an account? <a href="signup.php" class="text-decoration-none">Signup</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?= include'footer.php'?>