<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Shoplex</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shoplex</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart <span id="cart-count">(0)</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">Your Shopping Cart</h2>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Cart items will be displayed here -->
            </tbody>
        </table>
        <div id="cart-items"></div>
        <h3>Total: <span id="total-price">$0.00</span></h3>

<button onclick="clearCart()">Clear Cart</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            displayCart();
        });

        function displayCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let cartItemsContainer = document.getElementById("cart-items");
            let totalPrice = 0;
            cartItemsContainer.innerHTML = "";

            cart.forEach((item, index) => {
                let row = `<tr>
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button></td>
                </tr>`;
                cartItemsContainer.innerHTML += row;
                totalPrice += item.price;
            });

            document.getElementById("total-price").textContent = totalPrice.toFixed(2);
            updateCartCount();
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            displayCart();
        }

        function clearCart() {
            localStorage.removeItem("cart");
            displayCart();
        }

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            document.getElementById("cart-count").textContent = `(${cart.length})`;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
