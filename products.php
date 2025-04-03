<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Shoplex</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Shoplex</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            🛒 Cart <span id="cart-count">(0)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Products Section -->
    <div class="container my-5">
        <h2 class="text-center" id="subcategory-title">Products</h2>
        <div class="row" id="products-container"></div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Shoplex. All Rights Reserved.</p>
    </footer>

    <!-- JavaScript Files -->
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/products.js"></script>

    <!-- Cart Alert -->
    <div id="cart-alert" class="alert alert-success text-center d-none" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1000;">
        Product added to cart!
    </div>

</body>
</html>
