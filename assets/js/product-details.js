document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get("product");

    const productDetails = {
        1: { name: "Monte Carlo Shirt", price: "$49.99", img: "assets/images/monte-carlo.jpg" },
        2: { name: "USPA Shirt", price: "$59.99", img: "assets/images/uspa-shirt.jpg" },
        3: { name: "Denim Jeans", price: "$79.99", img: "assets/images/denim-jeans.jpg" },
        4: { name: "Cargo Shorts", price: "$45.99", img: "assets/images/cargo-shorts.jpg" },
        5: { name: "Nike Shoes", price: "$119.99", img: "assets/images/nike-shoes.jpg" },
        6: { name: "Adidas Shoes", price: "$109.99", img: "assets/images/adidas-shoes.jpg" },
        7: { name: "Adidas T-Shirt", price: "$39.99", img: "assets/images/adidas-tshirt.jpg" },
        8: { name: "Casual Shirt", price: "$34.99", img: "assets/images/casual-shirt.jpg" },
        9: { name: "Skinny Jeans", price: "$69.99", img: "assets/images/skinny-jeans.jpg" },
        10: { name: "Leggings", price: "$29.99", img: "assets/images/leggings.jpg" },
        11: { name: "Puma Sneakers", price: "$89.99", img: "assets/images/puma-sneakers.jpg" },
        12: { name: "Heels", price: "$79.99", img: "assets/images/heels.jpg" },
        13: { name: "Graphic T-Shirt", price: "$19.99", img: "assets/images/kids-tee.jpg" },
        14: { name: "Polo Shirt", price: "$24.99", img: "assets/images/kids-polo.jpg" },
        15: { name: "Joggers", price: "$29.99", img: "assets/images/kids-joggers.jpg" },
        16: { name: "Shorts", price: "$19.99", img: "assets/images/kids-shorts.jpg" },
        17: { name: "Velcro Sneakers", price: "$39.99", img: "assets/images/kids-sneakers.jpg" },
        18: { name: "Sandals", price: "$24.99", img: "assets/images/kids-sandals.jpg" }
    };

    const product = productDetails[productId];

    if (product) {
        document.getElementById("product-details").innerHTML = `
            <div class="text-center">
                <h2>${product.name}</h2>
                <img src="${product.img}" alt="${product.name}" class="img-fluid" style="max-width: 300px;">
                <p class="mt-3"><strong>Price:</strong> ${product.price}</p>
                <button class="btn btn-primary" onclick="addToCart(${productId})">Add to Cart</button>
            </div>
        `;
    } else {
        document.getElementById("product-details").innerHTML = `<p class="text-center">Product not found.</p>`;
    }
});

// Function to simulate adding a product to the cart
function addToCart(productId) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Fetch the product details using productId
    const productDetails = {
        1: { name: "Monte Carlo Shirt", price: 49.99 },
        2: { name: "USPA Shirt", price: 59.99 },
        3: { name: "Denim Jeans", price: 79.99 },
        4: { name: "Cargo Shorts", price: 45.99 },
        5: { name: "Nike Shoes", price: 119.99 },
        6: { name: "Adidas Shoes", price: 109.99 },
        7: { name: "Adidas T-Shirt", price: 39.99 },
        8: { name: "Casual Shirt", price: 34.99 },
        9: { name: "Skinny Jeans", price: 69.99 },
        10: { name: "Leggings", price: 29.99 },
        11: { name: "Puma Sneakers", price: 89.99 },
        12: { name: "Heels", price: 79.99 },
        13: { name: "Graphic T-Shirt", price: 19.99 },
        14: { name: "Polo Shirt", price: 24.99 },
        15: { name: "Joggers", price: 29.99 },
        16: { name: "Shorts", price: 19.99 },
        17: { name: "Velcro Sneakers", price: 39.99 },
        18: { name: "Sandals", price: 24.99 }
    };

    let product = productDetails[productId];

    if (product) {
        let existingProductIndex = cart.findIndex(item => item.id == productId);
        if (existingProductIndex > -1) {
            cart[existingProductIndex].quantity = (cart[existingProductIndex].quantity || 1) + 1;
        } else {
            cart.push({ 
                id: productId, 
                name: product.name, 
                price: product.price, 
                quantity: 1 
            });
        }
        
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartCount();
        alert(`${product.name} has been added to your cart!`);
    }
}

