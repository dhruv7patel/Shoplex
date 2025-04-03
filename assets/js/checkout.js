document.addEventListener("DOMContentLoaded", function () {
    displayCheckout();
});

function displayCheckout() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let checkoutContainer = document.getElementById("checkout-items");
    let totalElement = document.getElementById("checkout-total");

    checkoutContainer.innerHTML = "";
    let total = 0;

    if (cart.length === 0) {
        checkoutContainer.innerHTML = "<p>Your cart is empty.</p>";
        totalElement.textContent = "$0.00";
        return;
    }

    cart.forEach((item) => {
        let listItem = document.createElement("li");
        listItem.className = "list-group-item";
        listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
        checkoutContainer.appendChild(listItem);
        total += item.price;
    });

    totalElement.textContent = `$${total.toFixed(2)}`;
}

// Function to clear cart
function clearCart() {
    localStorage.removeItem("cart");
    displayCheckout();
    updateCartCount();
}
