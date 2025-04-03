
<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('User already exists!');</script>";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Signup successful! Please login.'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script defer src="assets/js/validation.js"></script>
</head>
<body class="bg-dark text-white">
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-black text-white p-5 shadow"> <!-- Increased padding -->
                    <h2 class="text-center text-danger">Signup</h2>
                    <form id="signupForm" method="post">
                        <div class="mb-3">
                            <label for="newUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="newUsername" placeholder="Enter a username" name="username" required>
                            <div class="invalid-feedback">Username must be at least 4 characters</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                            <div class="invalid-feedback">Please enter a valid email</div>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Enter a strong password" name="password" required>
                            <div class="invalid-feedback">Password must be at least 6 characters</div>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Sign Up</button>
                        <div class="mt-3 text-center"> <!-- Now inside form border -->
                            <p>Already have an account? <a href="login.php" class="text-success">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>