<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Shoplex</title>
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

    <!-- About Section -->
    <section class="container my-5">
        <h2 class="text-center">About Shoplex</h2>
        <p class="text-center text-muted">Your one-stop fashion destination.</p>

        <div class="row my-4">
            <div class="col-md-6">
                <img src="assets/images/ab.jpg" class="img-fluid rounded shadow" alt="About Us">
            </div>
            <div class="col-md-6">
                <p>
                    Welcome to Shoplex, your trusted online clothing store. We offer a wide variety of stylish and high-quality clothes for men, women, and kids.
                </p>
                <p>
                    Our mission is to provide trendy yet affordable fashion to everyone. We source our materials responsibly and work with designers worldwide.
                </p>
                <p>
                    Explore our collections and discover your perfect style!
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Shoplex. All Rights Reserved.</p>
    </footer>

</body>
</html>
