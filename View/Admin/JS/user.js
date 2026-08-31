document.addEventListener("DOMContentLoaded", function () {


    // =========================
    // DELETE USER
    // =========================

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


    // =========================
    // UPDATE USER STATUS
    // =========================

    const statusSelects = document.querySelectorAll(".user-status");

    statusSelects.forEach(function (select) {

        select.addEventListener("change", function () {

            const userId = this.dataset.id;
            const newStatus = this.value;

            const confirmStatus = confirm(
                "Are you sure you want to change this user's status to " +
                newStatus.toUpperCase() +
                "?"
            );

            // Cancel করলে আগের status-এ ফিরে যাবে
            if (!confirmStatus) {

                location.reload();

                return;
            }


            fetch("../../../Controller/UserController.php", {

                method: "POST",

                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },

                body:
                    "update_status=1" +
                    "&user_id=" + encodeURIComponent(userId) +
                    "&status=" + encodeURIComponent(newStatus)

            })

            .then(response => response.json())

            .then(data => {

                if (data.success) {

                    alert(data.message);

                } else {

                    alert(data.message);

                    location.reload();

                }

            })

            .catch(error => {

                console.error(error);

                alert("Something went wrong.");

                location.reload();

            });

        });

    });

});