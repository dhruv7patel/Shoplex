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
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="cart-items">
        <!-- Cart items will be displayed here -->
    </tbody>
</table>
        <div id="cart-items"></div>
        <h3>Total: <span id="total-price">$0.00</span></h3>

<button onclick="clearCart()"  class="btn btn-danger mt-3">Clear Cart</button>
<a href="checkout.php" class="btn btn-success mt-3">Proceed to Checkout</a>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        displayCart();
    });

    function displayCart() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let cartItemsContainer = document.getElementById("cart-items");
        let totalPrice = 0;
        cartItemsContainer.innerHTML = "";

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center">Your cart is empty</td>
                </tr>
            `;
            document.getElementById("total-price").textContent = "$0.00";
            updateCartCount();
            return;
        }

        cart.forEach((item, index) => {
            let itemTotal = item.price * item.quantity;
            totalPrice += itemTotal;
            
            let row = `
                <tr>
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${index}, -1)">-</button>
                        <span class="mx-2">${item.quantity}</span>
                        <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${index}, 1)">+</button>
                    </td>
                    <td>$${itemTotal.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button></td>
                </tr>
            `;
            cartItemsContainer.innerHTML += row;
        });

        document.getElementById("total-price").textContent = `$${totalPrice.toFixed(2)}`;
        updateCartCount();
    }

    function updateQuantity(index, change) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart[index].quantity += change;
        
        if (cart[index].quantity <= 0) {
            cart.splice(index, 1);
        }
        
        localStorage.setItem("cart", JSON.stringify(cart));
        displayCart();
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

    // Make this function available globally
    function updateCartCount() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        let cartCountElements = document.querySelectorAll("#cart-count");
        
        cartCountElements.forEach(element => {
            element.textContent = `(${totalItems})`;
        });
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
