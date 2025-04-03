<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Shoplex</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shoplex</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" id="navbar-links">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart <span id="cart-count">(0)</span></a></li>
                    <!-- Checkout Link -->
                    <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                  
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="container my-5">
        <h2 class="text-center">Contact Us</h2>
        <p class="text-center text-muted">We'd love to hear from you!</p>

        <div class="row my-4">
            <div class="col-md-6">
                <h4>Get in Touch</h4>
                <p><strong>Email:</strong> support@shoplex.com</p>
                <p><strong>Phone:</strong> +1 (987) 999-7777</p>
                <p><strong>Address:</strong> 123 Fashion Street, Toronto, Canada</p>
            </div>

            <div class="col-md-6">
                <h4>Send a Message</h4>
                <form id="contact-form">
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Shoplex. All Rights Reserved.</p>
    </footer>

    <script src="assets/js/contact.js"></script>
</body>
</html>
