document.querySelectorAll(".buy-now-btn").forEach(button => {

    button.addEventListener("click", function () {

        let productId = this.dataset.id;

        window.location.href =
            `../../Buyer/Pages/Cart.php?product_id=${productId}`;

    });

});