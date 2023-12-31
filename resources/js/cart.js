import axios from "axios";
import "./app";

$(() => {
    $(".btn-increment").each((index, item) => {
        incrementVal(item);
    });
    $(".btn-decrement").each((index, item) => {
        decrementVal(item);
    });
});

const incrementVal = (btn) => {
    $(btn).on("click", function () {
        const itemId = $(btn).data("product_id");

        axios
            .patch(`/catalog/calculate-item/${itemId}/plus`)
            .then((response) => {
                document.cookie = `cart=${JSON.stringify(
                    response.data.items
                )};expires=${new Date(Date.now() + 86400000).toUTCString()}`;

                const elemCount = $(`#count${itemId}`);
                changeP(elemCount);
            })
            .catch((error) => {
                console.error(error);
            });
    });
};

const changeP = (oldP, operator = true) => {
    const id = $(oldP).attr("id");
    let newCount = 0;

    if (operator) {
        newCount = $(oldP).data("count") + 1;
    } else {
        newCount = $(oldP).data("count") - 1;
        if (newCount < 0) newCount = 0;
    }

    const newElem = $(
        `<p data-count="${newCount}" id="${id}">Количество: ${newCount}</p>`
    );
    $(oldP).before(newElem);
    $(oldP).remove();
};

const decrementVal = (btn) => {
    $(btn).on("click", function () {
        const itemId = $(btn).data("product_id");
        axios
            .patch(`/catalog/calculate-item/${itemId}/minus`)
            .then((response) => {
                document.cookie = `cart=${JSON.stringify(
                    response.data.items
                )};expires=${new Date(Date.now() + 86400000).toUTCString()}`;

                const elemCount = $(`#count${itemId}`);
                changeP(elemCount, false);
            })
            .catch((error) => {
                console.log(error);
            });
    });
};


