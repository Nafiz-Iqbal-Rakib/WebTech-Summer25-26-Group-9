function validateBuyerCart()
{
    let quantity = document.getElementById("quantity").value.trim();
    let city = document.getElementById("city").value.trim();
    let zip = document.getElementById("zip").value.trim();

    let valid = true;
    let message = "";

    if (quantity < 1) {
        message += "Quantity Must be at least 1\n";
        valid = false;
    }

    if (city.length < 2) {
        message += "City is required\n";
        valid = false;
    }

    if (zip.length < 4) {
        message += "Zip Code Must be at least 4 Char";
        valid = false;
    }

    if (!valid) {
        alert(message);
    }

    return valid;
}


function updateBuyerCartTotal()
{
    let quantityInput = document.getElementById("quantity");
    let productPriceText = document.getElementById("summaryProductPrice");
    let totalText = document.getElementById("summaryTotal");

    if (!quantityInput || !productPriceText || !totalText) {
        return;
    }

    let quantity = parseInt(quantityInput.value);
    let unitPrice = parseFloat(quantityInput.getAttribute("data-unit-price"));
    let maxStock = parseInt(quantityInput.max);
    let shipping = 100;

    if (isNaN(quantity) || quantity < 1) {
        quantity = 1;
    }

    if (!isNaN(maxStock) && quantity > maxStock) {
        quantity = maxStock;
        quantityInput.value = maxStock;
    }

    let productTotal = unitPrice * quantity;
    let finalTotal = productTotal + shipping;

    productPriceText.innerHTML = productTotal.toFixed(2) + " TK";
    totalText.innerHTML = finalTotal.toLocaleString("en-US", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }) + " TK";
}


let buyerQuantityInput = document.getElementById("quantity");

if (buyerQuantityInput) {
    buyerQuantityInput.addEventListener("input", updateBuyerCartTotal);
    buyerQuantityInput.addEventListener("change", updateBuyerCartTotal);
}
