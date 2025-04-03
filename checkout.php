<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Shoplex</title>
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
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart <span id="cart-count">(0)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">Checkout</h2>
        <div id="checkout-summary">
            <h4>Your Items</h4>
            <ul id="checkout-items" class="list-group"></ul>
            <h4 class="mt-3">Total: $<span id="checkout-total">0.00</span></h4>
        </div>
        
        <button class="btn btn-danger mt-3" onclick="clearCart()">Clear Cart</button>
        <button class="btn btn-success mt-3" onclick="placeOrder()">Place Order</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            displayCheckout();
        });

        function displayCheckout() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let checkoutItemsContainer = document.getElementById("checkout-items");
            let total = 0;
            checkoutItemsContainer.innerHTML = "";

            cart.forEach(item => {
                let li = `<li class="list-group-item">${item.name} - $${item.price.toFixed(2)}</li>`;
                checkoutItemsContainer.innerHTML += li;
                total += item.price;
            });

            document.getElementById("checkout-total").textContent = total.toFixed(2);
            updateCartCount();
        }

        function clearCart() {
            localStorage.removeItem("cart");
            displayCheckout();
        }

        function placeOrder() {
            if (localStorage.getItem("cart")) {
                alert("Order placed successfully!");
                clearCart();
            } else {
                alert("Your cart is empty!");
            }
        }

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            document.getElementById("cart-count").textContent = `(${cart.length})`;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
