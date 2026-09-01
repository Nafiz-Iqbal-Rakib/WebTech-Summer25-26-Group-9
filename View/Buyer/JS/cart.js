function validateBuyerCart()
{
    let quantity =
        document.getElementById("quantity").value.trim();

    let city =
        document.getElementById("city").value.trim();

    let zip =
        document.getElementById("zip").value.trim();

    let valid = true;
    let message = "";


    if(quantity < 1)
    {
        message +=
            "Quantity Must be at least 1\n";

        valid = false;
    }


    if(city.length < 2)
    {
        message +=
            "City is required\n";

        valid = false;
    }


    if(zip.length < 4)
    {
        message +=
            "Zip Code Must be at least 4 Char";

        valid = false;
    }


    if(!valid)
    {
        alert(message);
    }


    return valid;
}



function updateBuyerCartTotal()
{
    let quantity =
        document.getElementById("quantity").value;

    let unitPrice =
        document.getElementById("unitPrice").value;


    if(quantity < 1)
    {
        quantity = 1;

        document.getElementById("quantity").value =
            1;
    }


    let productTotal =
        unitPrice *
        quantity;


    let finalTotal =
        productTotal +
        100;


    document.getElementById(
        "summaryProductPrice"
    ).innerHTML =
        productTotal +
        " TK";


    document.getElementById(
        "summaryTotal"
    ).innerHTML =
        finalTotal +
        " TK";
}
