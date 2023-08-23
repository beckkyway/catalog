import axios from "axios";
import "./app";

$(() => {
    $(".item__btn").each((index, item) => {
        $(item).on("click", function () {
            const itemId = $(item).attr("id");

            axios.get(`/catalog/add-item/${itemId}`)
                .then((response) => {
                    document.cookie = `cart=${JSON.stringify(
                        response.data.items
                    )};expires=${new Date(Date.now() + 86400000).toUTCString()}`;
                })
                .catch((error) => {
                    console.error(error);
                });
        });
    });
        
});
