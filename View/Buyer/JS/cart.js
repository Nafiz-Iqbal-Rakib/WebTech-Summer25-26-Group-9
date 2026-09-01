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

function checkBuyerCoupon()
{
    let coupon = document.getElementById("coupon").value.trim();
    let responseText = document.getElementById("couponResponse");

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            responseText.innerHTML = data.message;
        }
    };

    xhttp.open(
        "POST",
        "/WebTech-Summer25-26-Group-9/Controller/BuyerController.php?action=coupon",
        true
    );

    xhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
    );

    xhttp.send("coupon=" + encodeURIComponent(coupon));
}
