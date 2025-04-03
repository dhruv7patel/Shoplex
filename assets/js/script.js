function addToCart(productId) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const productDetails = {
        1: { name: "Monte Carlo Shirt", price: 49.99 },
        2: { name: "USPA Shirt", price: 59.99 },
        3: { name: "Denim Jeans", price: 79.99 },
        4: { name: "Cargo Shorts", price: 45.99 },
        5: { name: "Nike Shoes", price: 119.99 },
        6: { name: "Adidas Shoes", price: 109.99 }
    };

    let product = productDetails[productId];

    if (product) {
        cart.push(product);
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartCount();

        // Show alert
        showCartAlert(product.name);
    }
}

// Function to show Bootstrap-styled alert
function showCartAlert(productName) {
    let alertBox = document.getElementById("cart-alert");
    
    if (!alertBox) {
        console.error("Alert box not found!");
        return;
    }

    alertBox.textContent = `${productName} has been added to your cart!`;
    alertBox.classList.remove("d-none");

    setTimeout(() => {
        alertBox.classList.add("d-none");
    }, 2000);
}

// Update Cart Count in Navbar
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    document.getElementById("cart-count").textContent = cart.length;
}
