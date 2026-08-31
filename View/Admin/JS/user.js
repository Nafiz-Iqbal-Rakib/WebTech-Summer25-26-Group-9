document.addEventListener("DOMContentLoaded", function () {

    const deleteButtons = document.querySelectorAll(".delete-user-btn");

    deleteButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const userId = this.dataset.id;

            const confirmDelete = confirm(
                "Are you sure you want to delete this user?"
            );

            if (!confirmDelete) {
                return;
            }

            fetch("../../../Controller/UserController.php", {

                method: "POST",

                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },

                body: "delete_user=1&user_id=" + encodeURIComponent(userId)

            })

            .then(response => response.json())

            .then(data => {

                if (data.success) {

                    alert(data.message);

                    location.reload();

                } else {

                    alert(data.message);

                }

            })

            .catch(error => {

                console.error(error);

                alert("Something went wrong.");

            });

        });

    });

});