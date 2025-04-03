document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const subcategory = urlParams.get("subcategory");

    const products = {
        "mens-shirts": [
            { name: "Monte Carlo Shirt", price: 49.99, img: "assets/images/monte-carlo.jpg", id: 1 },
            { name: "USPA Shirt", price: 59.99, img: "assets/images/uspa-shirt.jpg", id: 2 }
        ],
        "mens-bottoms": [
            { name: "Denim Jeans", price: 79.99, img: "assets/images/denim-jeans.jpg", id: 3 },
            { name: "Cargo Shorts", price: 45.99, img: "assets/images/cargo-shorts.jpg", id: 4 }
        ],
        "mens-footwear": [
            { name: "Nike Shoes", price: 119.99, img: "assets/images/nike-shoes.jpg", id: 5 },
            { name: "Adidas Shoes", price: 109.99, img: "assets/images/adidas-shoes.jpg", id: 6 }
        ],
        "women-tops": [
            { name: "Adidas T-Shirt", price: 39.99, img: "assets/images/adidas-tshirt.jpg", id: 7 },
            { name: "Casual Shirt", price: 34.99, img: "assets/images/casual-shirt.jpg", id: 8 }
        ],
        "women-bottoms": [
            { name: "Skinny Jeans", price: 69.99, img: "assets/images/skinny-jeans.jpg", id: 9 },
            { name: "Leggings", price: 29.99, img: "assets/images/leggings.jpg", id: 10 }
        ],
        "women-footwear": [
            { name: "Puma Sneakers", price: 89.99, img: "assets/images/puma-sneakers.jpg", id: 11 },
            { name: "Heels", price: 79.99, img: "assets/images/heels.jpg", id: 12 }
        ],
        "kids-shirts": [
            { name: "Graphic T-Shirt", price: 19.99, img: "assets/images/kids-tee.jpg", id: 13 },
            { name: "Polo Shirt", price: 24.99, img: "assets/images/kids-polo.jpg", id: 14 }
        ],
        "kids-bottoms": [
            { name: "Joggers", price: 29.99, img: "assets/images/kids-joggers.jpg", id: 15 },
            { name: "Shorts", price: 19.99, img: "assets/images/kids-shorts.jpg", id: 16 }
        ],
        "kids-footwear": [
            { name: "Velcro Sneakers", price: 39.99, img: "assets/images/kids-sneakers.jpg", id: 17 },
            { name: "Sandals", price: 24.99, img: "assets/images/kids-sandals.jpg", id: 18 }
        ]
    };

    document.getElementById("subcategory-title").innerText = subcategory.replace("-", " ").toUpperCase();

    const productContainer = document.getElementById("products-container");
    if (products[subcategory]) {
        products[subcategory].forEach(product => {
            const productCard = `
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="${product.img}" class="card-img-top" alt="${product.name}">
                        <div class="card-body text-center">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text">$${product.price.toFixed(2)}</p>
                            <button class="btn btn-success add-to-cart" 
                                    data-id="${product.id}" 
                                    data-name="${product.name}" 
                                    data-price="${product.price}">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            `;
            productContainer.innerHTML += productCard;
        });

        // Add event listeners for "Add to Cart" buttons
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                const productId = this.getAttribute("data-id");
                const productName = this.getAttribute("data-name");
                const productPrice = parseFloat(this.getAttribute("data-price"));

                addToCart(productId, productName, productPrice);
            });
        });
    } else {
        productContainer.innerHTML = `<p class="text-center">No products available.</p>`;
    }
});

// Function to handle adding products to cart
function addToCart(id, name, price) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Check if the product already exists in the cart
    let existingProductIndex = cart.findIndex(item => item.id == id);

    if (existingProductIndex > -1) {
        // If product exists, increment quantity
        cart[existingProductIndex].quantity += 1;
    } else {
        // If product does not exist, add new item
        cart.push({ id, name, price, quantity: 1 });
    }

    // Save the updated cart in local storage
    localStorage.setItem("cart", JSON.stringify(cart));

    // Update the cart count and show the success alert
    updateCartCount();
    showCartAlert();
}

// Function to update cart count in the navbar
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    document.getElementById("cart-count").innerText = `(${totalItems})`;
}

// Function to show cart alert
function showCartAlert() {
    const alertBox = document.getElementById("cart-alert");
    alertBox.classList.remove("d-none");
    setTimeout(() => {
        alertBox.classList.add("d-none");
    }, 1500);
}
