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
        <h2 class="text-center mb-4">Checkout</h2>
        
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Order Summary</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="checkout-items">
                                <!-- Items will be loaded here -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Grand Total:</strong></td>
                                    <td><strong>$<span id="checkout-total">0.00</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Payment Information</h4>
                    </div>
                    <div class="card-body">
                        <form id="payment-form">
                            <div class="mb-3">
                                <label for="card-name" class="form-label">Name on Card</label>
                                <input type="text" class="form-control" id="card-name" required>
                            </div>
                            <div class="mb-3">
                                <label for="card-number" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="card-number" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="card-expiry" class="form-label">Expiry Date</label>
                                    <input type="text" class="form-control" id="card-expiry" placeholder="MM/YY" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="card-cvc" class="form-label">CVC</label>
                                    <input type="text" class="form-control" id="card-cvc" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-end mt-4">
            <button class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
            <button class="btn btn-success ms-2" onclick="placeOrder()">Place Order</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            displayCheckout();
            updateCartCount();
        });

        function displayCheckout() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let checkoutItemsContainer = document.getElementById("checkout-items");
            let total = 0;
            checkoutItemsContainer.innerHTML = "";

            if (cart.length === 0) {
                checkoutItemsContainer.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center">Your cart is empty</td>
                    </tr>
                `;
                document.getElementById("checkout-total").textContent = "0.00";
                return;
            }

            cart.forEach(item => {
                let itemTotal = item.price * item.quantity;
                total += itemTotal;
                
                let row = `
                    <tr>
                        <td>${item.name}</td>
                        <td>$${item.price.toFixed(2)}</td>
                        <td>${item.quantity}</td>
                        <td>$${itemTotal.toFixed(2)}</td>
                    </tr>
                `;
                checkoutItemsContainer.innerHTML += row;
            });

            document.getElementById("checkout-total").textContent = total.toFixed(2);
        }

        function clearCart() {
            if (confirm("Are you sure you want to clear your cart?")) {
                localStorage.removeItem("cart");
                displayCheckout();
                updateCartCount();
                alert("Your cart has been cleared");
            }
        }

        function placeOrder() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart.length === 0) {
                alert("Your cart is empty!");
                return;
            }

            // Simple form validation
            const cardName = document.getElementById("card-name").value;
            const cardNumber = document.getElementById("card-number").value;
            const cardExpiry = document.getElementById("card-expiry").value;
            const cardCvc = document.getElementById("card-cvc").value;

            if (!cardName || !cardNumber || !cardExpiry || !cardCvc) {
                alert("Please fill in all payment details");
                return;
            }

            // In a real application, you would process payment here
            alert("Order placed successfully! Thank you for your purchase.");
            
            // Clear cart after successful order
            localStorage.removeItem("cart");
            displayCheckout();
            updateCartCount();
            
            // Redirect to home page after 2 seconds
            setTimeout(() => {
                window.location.href = "index.php";
            }, 2000);
        }

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById("cart-count").textContent = `(${totalItems})`;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>