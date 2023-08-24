import axios from "axios";
import "./app";

$(() => {
    $(".btn.btn-info.btn-increment").each((index, item) => {
        $(item).on("click", function () {
            const itemId = $(item).data("id");
            const quantity = $(item).data("quantity");

            if (quantity > 0) {
                axios.get(`/catalog/calculateItem/${itemId}`)
                    .then((response) => {
                        document.cookie = `cart=${JSON.stringify(
                            response.data.items
                        )};expires=${new Date(Date.now() + 86400000).toUTCString()}`;
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        });
    });
});