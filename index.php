<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoplex - Online Clothing Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="cart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Card flip effect */
        .category-card-wrapper {
            perspective: 1000px;
        }

        .category-card {
            position: relative;
            width: 100%;
            height: 300px; /* Ensures all content fits */
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .category-card:hover {
            transform: rotateY(180deg);
        }

        /* Front of the card (Category info) */
        .category-card .card-front {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .category-card .card-front img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-card .card-front .card-body {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .category-card .card-front .card-body .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .category-card .card-front .card-body .btn {
            font-size: 1rem;
            padding: 10px 20px;
        }

        /* Back of the card (Subcategories) */
        .category-card .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            transform: rotateY(180deg);
            background-color: darkkhaki;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            padding: 10px;
            overflow-y: auto; /* Allows scrolling */
        }

        /* Style for subcategories */
        .subcategory {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            height: 100%; /* Ensures content fills the back card */
            padding-top: 10px;
        }

        .subcategory .card {
            background-color: #444;
            border: none;
            height: 100px;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .subcategory .card .card-body {
            text-align: center;
            padding: 5px;
        }

        .subcategory .card .card-title {
            font-size: 1.1rem;
            color: #fff;
        }

        .subcategory .card .btn {
            background-color: #ff8c00;
            color: white;
            padding: 5px 10px;
            font-size: 0.9rem;
        }

        /* Fix for small screens */
        @media (max-width: 768px) {
            .category-card {
                height: auto; /* Allows content to expand */
            }

            .category-card .card-back {
                overflow-y: auto; /* Enables scrolling */
                max-height: 100%; /* Prevents cutoff */
            }
        }
    </style>
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
    <div id="cart-alert" class="alert alert-success text-center d-none" 
    style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1000;">=
</div>

    <!-- Hero Section -->
    <header class="hero-section text-center text-white">
        <div class="container">
            <h1>Welcome to Shoplex</h1>
            <p>Your one-stop shop for the latest fashion trends.</p>
           
        </div>
    </header>

    <!-- Categories Section -->
    <section class="container my-5">
        <h2 class="text-center">Shop by Category</h2>
        <div class="row">
            <!-- Men's Category -->
            <div class="col-md-4">
                <div class="category-card-wrapper">
                    <div class="category-card">
                        <div class="card-front">
                            <img src="assets/images/men.jpg" class="card-img-top" alt="Men's Fashion">
                            <div class="card-body text-center">
                                <a href="products.php?category=men" class="btn btn-dark">Shop Men's</a>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="subcategory">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Men's Shirt</h5>
                                        <a href="products.php?subcategory=mens-shirts" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Men's Bottoms</h5>
                                        <a href="products.php?subcategory=mens-bottoms" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Men's Footwear</h5>
                                        <a href="products.php?subcategory=mens-footwear" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Women's Category -->
            <div class="col-md-4">
                <div class="category-card-wrapper">
                    <div class="category-card">
                        <div class="card-front">
                            <img src="assets/images/women.jpg" class="card-img-top" alt="Women's Fashion">
                            <div class="card-body text-center">
                                <a href="products.php?category=women" class="btn btn-dark">Shop Women's</a>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="subcategory">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Women's Tops</h5>
                                        <a href="products.php?subcategory=women-tops" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Women's Bottoms</h5>
                                        <a href="products.php?subcategory=women-bottoms" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Women's Footwear</h5>
                                        <a href="products.php?subcategory=women-footwear" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kids' Category -->
            <div class="col-md-4">
                <div class="category-card-wrapper">
                    <div class="category-card">
                        <div class="card-front">
                            <img src="assets/images/kids.jpg" class="card-img-top" alt="Kids' Fashion">
                            <div class="card-body text-center">
                                <a href="products.php?category=kids" class="btn btn-dark">Shop Kids</a>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="subcategory">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kids' Shirts</h5>
                                        <a href="products.php?subcategory=kids-shirts" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kids' Bottoms</h5>
                                        <a href="products.php?subcategory=kids-bottoms" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kids' Footwear</h5>
                                        <a href="products.php?subcategory=kids-footwear" class="btn btn-dark">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            updateCartCount();

            // Adding products to the cart
            let addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
            addToCartBtns.forEach((btn) => {
                btn.addEventListener('click', function () {
                    let productName = this.getAttribute('data-product-name');
                    let productPrice = parseFloat(this.getAttribute('data-product-price'));
                    addToCart(productName, productPrice);
                });
            });
        });

        function addToCart(name, price) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let newItem = { name, price };
            cart.push(newItem);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartCount();
        }

        function updateCartCount() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        let cartCountElements = document.querySelectorAll("#cart-count");
        
        cartCountElements.forEach(element => {
            element.textContent = `(${totalItems})`;
        });
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Footer Section -->

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Shoplex. All Rights Reserved.</p>
    </footer>



</body>

</html>
