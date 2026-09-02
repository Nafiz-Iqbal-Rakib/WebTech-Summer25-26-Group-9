document.querySelectorAll(".delete-product-btn").forEach(function (button) {

    button.addEventListener("click", function () {

        const productId = this.dataset.id;

        if (!confirm("Are you sure you want to delete this product?")) {
            return;
        }

        fetch("../../../Controller/ProductController.php", {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify({
                action: "delete",
                id: productId
            })

        })

        .then(response => response.json())

        .then(data => {

            if (data.success) {

                this.closest("tr").remove();

            } else {

                alert("Failed to delete product.");

            }

        })

        .catch(error => {

            console.error("Error:", error);

            alert("Something went wrong.");

        });

    });

});