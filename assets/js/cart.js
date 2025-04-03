document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();
    if (document.getElementById("cart-items")) {
        displayCart();
    }
});

function displayCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartContainer = document.getElementById("cart-items");
    let totalElement = document.getElementById("total-price");

    cartContainer.innerHTML = "";
    let total = 0;

    if (cart.length === 0) {
        cartContainer.innerHTML = "<tr><td colspan='3' class='text-center'>Your cart is empty.</td></tr>";
        totalElement.textContent = "$0.00";
        return;
    }

    cart.forEach((item, index) => {
        let itemTotal = item.price * item.quantity;
        let row = `
            <tr>
                <td>${item.name} <span class="text-muted">×${item.quantity}</span></td>
                <td>$${itemTotal.toFixed(2)}</td>
                <td>
                    <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity(${index}, -1)">-</button>
                    <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity(${index}, 1)">+</button>
                    <button class="btn btn-danger btn-sm ms-2" onclick="removeFromCart(${index})">Remove</button>
                </td>
            </tr>
        `;
        cartContainer.innerHTML += row;
        total += itemTotal;
    });

    totalElement.textContent = `$${total.toFixed(2)}`;
}

function changeQuantity(index, change) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart[index].quantity += change;
    
    // Remove item if quantity reaches 0
    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }
    
    localStorage.setItem("cart", JSON.stringify(cart));
    displayCart();
    updateCartCount();
}

function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    displayCart();
    updateCartCount();
}

function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    let cartCountElement = document.getElementById("cart-count");
    if (cartCountElement) {
        cartCountElement.textContent = `(${totalItems})`;
    }
}

function clearCart() {
    localStorage.removeItem("cart");
    displayCart();
    updateCartCount();
}