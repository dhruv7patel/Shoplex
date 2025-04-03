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
        let row = `
            <tr>
                <td>${item.name}</td>
                <td>$${item.price.toFixed(2)}</td>
                <td><button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button></td>
            </tr>
        `;
        cartContainer.innerHTML += row;
        total += item.price;
    });

    totalElement.textContent = `$${total.toFixed(2)}`;
   
}

// Function to remove an item from the cart
function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));

    displayCart();
    updateCartCount();
}

// Function to update the cart count
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartCountElement = document.getElementById("cart-count");
    if (cartCountElement) {
        cartCountElement.textContent = `(${cart.length})`;
    }
}
